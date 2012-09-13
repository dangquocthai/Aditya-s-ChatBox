<?php
//		This file is part of Aditya's ChatBox
// 	Aditya's ChatBox is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.

//    You should have received a copy of the GNU General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.
// Let's start our session
session_start();

// Include the config.php because we are
// Going to start work with our database
include("config-m.php");
include("emoticons.php");

// First let's make a login form
// Here user sets his/her username that
// He/she will use in this chatroom
function login_form(){
echo "<br /><br />";
echo "<table width='500' border='0' id='maintable' style='background-color: transparent;' align='center'>"
."<tr>"
."<td align='center'><font style='font-size: 20px' color=\"#FFFFFF\">Welcome</font></td>"
."</tr>"
."<tr>"
."<td align='center'>";
echo "<form action='index.php?act=login' method='post'>"
."<font style='font-size: 15px' color=\"#FFFFFF\">Your Name :</font> <input type='text' name='username' /> <input type='submit' class='button'id='button' value='Login' /><br /><br />"
."</form>";     
echo "</td>"
."</tr>"
."</table>";

}

// Now let's log that user in
function process_login(){

// Let's get user's username
$username = $_REQUEST['username'];
if (strlen(trim($username)) == 0){
$username = "Guest".time();
}
// Now let's find if there are records about him/her in database
$sql = "SELECT * FROM auth WHERE user='".mysql_real_escape_string($username)."'";
$query = mysql_query($sql);

// If there are any records, delete them
if(mysql_num_rows($query)!=0){

header("Location: index.php?taken=true");
die();

}

// Now let's set session with user's name
// And insert it into database so we know that
// He/she is logged in
$_SESSION['user'] = $username;
$sql = "INSERT INTO auth (user, session) VALUES ('".mysql_real_escape_string($username)."', '".session_id()."')";
$query = mysql_query($sql);

// Check that all things went well
// If something was wrong, display an error
// But if evetrything is good, redirect him/her 
// To the chatroom
if(!$query){

echo "Can not insert info into database!<br />". mysql_error();

}else{

header("Location: index.php");

}

}

// Now let's make a function that logs users our
function logout(){

// This will delete any traces of him/her
// From database so it will be a clean sheet
// When he/she comes back
$sql = "DELETE FROM auth WHERE session='".mysql_real_escape_string(session_id()). "'";
$query = mysql_query($sql);

// Little error checking again
if(!$query){

echo "Can not delete info from database!";

}else{

// If everything went well, let's destroy
// Session and redirect to main page also
// Where login form waits him/her
session_destroy();
header("Location: index.php");

}

}

// Now we want to show user's username
// In "Welcome [user]" area
function get_username(){

// Let's get all info abour our current session from database
$sql = "SELECT * FROM auth WHERE session='".mysql_real_escape_string(session_id()). "'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

// If there aren't any records
// Let's set our user's name to "Guest"
// If there are records let's get the real username
if(mysql_num_rows($query) == "0"){

$username = "Guest";

}else{

$username = $row['user'];

}

return $username;

}

// Now we want to display "Log In" or "Log Out"
// Link after greeting
function get_link(){

// Again we check for records from database
$sql = "SELECT * FROM auth WHERE session='".mysql_real_escape_string(session_id()). "'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

// If there are no records about our user
// Let's display "Log In" link
// But if there are records about our user
// Display a "Log Out" link
if(mysql_num_rows($query) == "0"){

$link = "<a href='index.php?act=login'>Log In</a>";

}else{

$link = "<a href='index.php?act=logout'>Log out</a>";

}

return $link;   

}

// This is the function that posts
// User messages to database
function post_message(){

// Let's clean our text that user entered
$text = addslashes($_REQUEST['text']);
# Comment out the next two lines to disable emoticons
$tmpstr = emot($text);
$text = $tmpstr;
// Now let's insert it into database
$sql = "INSERT INTO chat (time, user, text) VALUES ('".date("H:i")."', '".get_username()."', '".$text."')";
$query = mysql_query($sql);

// Little error checking and we are done
if(!$query){

die(mysql_error());

}

}

// Now we have to get messages
// From database to see what other users are writing
function get_messages(){

// Now let's get all info from "chat" table
$sql = "SELECT * FROM chat";
$query = mysql_query($sql);

// Some error checking
if(!$query){

echo "Can not get messages from database.";

}else{

// If everything is fine let's display our messages
// First to come is time, it will look like this (12:34)
// Second is user's name and after that comes the text
// For example: (13:54) Jaan: Hey there!
while($row = mysql_fetch_array($query)){

echo "<div align='left'><button class=\"un\">"."<b>".$row['user']."</b></button>  ".$row['text']."</div><hr/>";

}

}       

}

// Now let's get users that are using this
// Chatroom, so people can see who they are talking
function get_users(){

// Let's get all info from "auth" table
$sql = "SELECT * FROM auth";
$query = mysql_query($sql);

// Check that everything is fine
if(!$query){

echo "Can not get users from database.";

}else{

// If everything is fine, let's display all users
while($row = mysql_fetch_array($query)){

echo "<div class='user'>".$row['user']."</div>";

}

}

}

// Here's the engine that puts everything to work
// All functions are triggered when they are wanted
// For example we want to log our user out
// We put this link to our page: <a href='index.php?act=logout'>Log out</a>
// And as you see when "act" isn't empty and "act" is "logout"
// Let's trigger logout() function that logs our user out
// Everything works the same with other functions

$act = addslashes(htmlentities(htmlspecialchars($_GET['act'])));

if($act != "" && $act == "logout"){

logout();

}elseif($act != "" && $act == "login"){

process_login();

}elseif($act != "" && $act == "post"){

post_message();

}elseif($act != "" && $act == "getmessages"){

get_messages();
exit;

}elseif($act != "" && $act == "getusers"){

get_users();
exit;

}

?>
