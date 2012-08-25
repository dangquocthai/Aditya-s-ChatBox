<?php
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
<link rel="stylesheet" href="includes/style.css">
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
			add("<u>"+itext+"</u>");
	}
}
function bold(){
	var itext = prompt("Bold text:");
	if (itext!=null){
		add("<b>"+itext+"</b>");
	}	
}
function bolditalic() {
	var itext = prompt("Bold and italic text:");
	if (itext!=null){
		add("<i><b>"+itext+"</b></i>");
	}	
}
function italic(){
	var itext = prompt("Italic text:");
	if (itext!=null){
		add("<i>"+itext+"</i>");
	}
}
</script>
</head>

<body onload="$('#chatscreen').scrollTop($('#chatscreen')[0].scrollHeight);il();">

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
while($row = Cutend(mysql_fetch_array($query),50,'last')){

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
echo "<i><big>Logged in as: </big></i> ".get_username()." (".get_link().") <hr/><br/>"; 
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
<input type="button" value="I" id="it" />
<input type="button" value="B" id="bo" />
<input type="button" value="B+I" id="bi" />
<input type="button" value="U" id="ul" />
</div>
<br/>
<input type="text" size="109" id="text" class="in" name="chattxt" /> <input type="submit" class="button" id="submitbutton" value="=>" />
</form>
</div>
<?php

}

?>

</body>
</html>
