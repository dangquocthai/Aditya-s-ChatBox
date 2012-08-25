// If page is loaded let's load our functions
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
$(function(){

// If submit button has been clicked
$("#submitbutton").click(function(){
//$('#chatscreen').scrollTop($('#chatscreen')[0].scrollHeight);
$("#chatscreen").animate({ scrollTop: $('#chatscreen')[0].scrollHeight}, 1000);

// Let's get what user has entered to the text field
var message = $("#text").val();
var afterspace = ""

// Now let's post this text
$.post("includes/actions.php?act=post", {

text: message

});


// When user's text is posted
// Remove it from the text field        
$("#text").attr("value", "");

return false;

});

// Now let's load our messages
function load_messages(){

// Let's use AJAX to get them from our actions file
$.ajax({

url: "includes/actions.php?act=getmessages",
cache: false,
success: function(html){

// Let's get old posts from there
// Where user's posts are shown
$("#chatscreen").html(html); 

// Now let's get this area's height where
// All posts are displayed and then let's animate
// It little bit so the scrollbar is always 
// Scrolled down so you can see the new posts   
$('#chatscreen').scrollTop($('#chatscreen')[0].scrollHeight);


},

});

}

// Now let's load chatroom's active users       
function load_users(){

// Let's use AJAX also to get chatroom's users
$.ajax({

url: "includes/actions.php?act=getusers",
cache: false    

});

}

// Now let's set the time when we will
// Check for new messages and new users
// First, we set the time of our posts
// setInterval(load_messages, 500) loads our posts every 0.5 seconds
// setInterval(load_users, 5000) loads our posts every 5 seconds
setInterval(load_messages, 500);
setInterval(load_users, 5000);  

});
