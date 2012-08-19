<?php
# If mannually editing, rename to config.php
# Let's connect to our database
# Usually your host is 'localhost'
# But sometimes it might be different so ask your host
# About your database server address
include ("config.db.php");
$mysql_con = mysql_connect($mysql_host, $mysql_user, $mysql_password);

# Now let's check if everything is good
# If there's something wrong.. let's display an error
if(!$mysql_con){
# And provide a link to the installer
echo 'Please <a href = "install.php">set up Aditya\'s ChatBox</a>: ';
die("Config file unreachable or contains errors");

}

# Let's select our database
$mysql_db = mysql_select_db($mysql_database, $mysql_con);

# Let's check here also is everything is okay
# If there's something wrong, let's display an error
if(!$mysql_con){

die(mysql_error());

}

?>
