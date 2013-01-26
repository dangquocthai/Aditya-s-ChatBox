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
# Let's start session and let's include our files
session_start();
include("includes/config.php"); 
include("includes/actions.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title><?php echo $title ?></title>
<script src="includes/jquery.js" type="text/javascript"></script>
<script src="includes/process.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
<script type="text/javascript" >
function il()
 {
 var i = document.getElementById("it");
 i.onclick = italic;
 var b = document.getElementById("bo");
 b.onclick = bold;
 var bi = document.getElementById("bi");
 bi.onclick = bolditalic;
 var u = document.getElementById("ul");
 u.onclick = underline;
 };
function add(text){
    var TheTextBox = document.getElementById("text");
    TheTextBox.value = TheTextBox.value + text;
}
function underline(){
		var itext = prompt("Underlined text:");
		if (itext!=null){
			add("[U]"+itext+"[/U]");
	}
}
function bold(){
	var itext = prompt("Bold text:");
	if (itext!=null){
		add("[B]"+itext+"[/B]");
	}	
}
function bolditalic() {
	var itext = prompt("Bold and italic text:");
	if (itext!=null){
		add("[I][B]"+itext+"[/B][/I]");
	}	
}
function italic(){
	var itext = prompt("Italic text:");
	if (itext!=null){
		add("[I]"+itext+"[/I]");
	}
}
</script>
</head>

<body onload="$('#chatscreen').scrollTop($('#chatscreen')[0].scrollHeight);il();">
<div id='table'>
      <div id='cell'>
        <div class='modal-dialog'>
<?php

# Now if our username is "Guest"
# Let's display the login form
if(get_username() == "Guest"){
if ($_REQUEST['taken'] == "true") { echo "<center><div id='tk'>That username is taken!</div></center>"; }
echo "<td>"
.login_form()
."</td>";

# If it isn't let's display the chatroom       
}else{

?>

<table border="0" cellpadding="1" cellspacing="0" align="center" id="maintable">
<tr>

</tr>
<tr>
<td align="center" class="tablebottom">
<div id="chatscreen" class="cs">
<?php

# Now here is the same thing that is in actions file
# Let's select all info from "chat" table
$sql = "SELECT * FROM chat";
$query = mysql_query($sql);

# Little error checking again
if(!$query){

echo "Can not get messages from database.";

}else{

# If everything is good let's display
# User's messages
while($row = mysql_fetch_array($query)){

echo "<div align='left'><button class=\"un\">"."<b>".$row['user']."</b></button>  ".$row['text']."</div><hr/>";

}

}       

?>
</div>
</td>
<td width=10>
</td>
<td class="middlebox" id="usersbox" rowspan="2">
<div id="onlineusers">
<?php
echo "<i><big>Logged in as: </big></i> ".get_username()." <button class='button'>".get_link()."</button> <hr/><br/>"; 
?>
<?php
# Let's say greetings to the user and display the "Log out link"
echo 'Online users:';
# This is also like in actions file
# Get all info from "auth" table
$sql = "SELECT * FROM auth";
$query = mysql_query($sql);

# Check for errors
if(!$query){

echo "Can not get users from database. ".mysql_error();

}else{

# If everything is fine
# Let's display active users
while($row = mysql_fetch_array($query)){

echo "<div class='user'>".$row['user']."</div>";

}

}

?>

</div>
</td>
</tr>

<tr>

</tr>
</table>
<br/>
<div align=center >
<form action="" autocomplete="off">
<div id="tb" align="center">
<input type="button" value="I" id="it" class="for button" />
<input type="button" value="B" id="bo" class="for button" />
<input type="button" value="B+I" id="bi" class="for button" />
<input type="button" value="U" id="ul" class="for button" />
</div>
<br/>
<input type="text" size="70" id="text" class="in" name="chattxt" /> <input type="submit" class="button" id="submitbutton" value="=>" />
</form>
</div>
<?php

}

?>
</div>
      </div>
    </div>
</body>
</html>
