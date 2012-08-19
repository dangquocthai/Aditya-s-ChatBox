<html>
<body>
<?php
# Check if config file exists, and if it does, don't run for security reasons.
# Although the install form has this already, a cracker could create his own
$filename = 'includes/config.db.php';
if (file_exists($filename)) {
    die("The installer is locked. Please delete the file \"".$filename."\" to rerun the installer.");
}
# Get the MySQL connection details from $_POST
$mysql_host = $_POST['dbhost'];
$title = $_POST['cn'];
$mysql_database = $_POST['dbname'];
$mysql_user = $_POST['dbusername'];
$mysql_password = $_POST['dbpasswd'];
# A quick notification for the user
echo "Connecting to database...";
# Try to connect...
$mysql_con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
# Check for errors
if(!$mysql_con){
# If they exist, echo them out and kill the process

echo '<a href="install.php">Go back</a><br/>Fail!';
die(mysql_error());

}
# Select database
$mysql_db = mysql_select_db($mysql_database, $mysql_con);
# Error-checking again

if(!$mysql_con){

echo '<a href="install.php">Go back</a><br/>Fail!';
die(mysql_error());

}
# Issue a sucess message
echo "Success<br/>";
# Send status update
echo "Creating tables...";
# Start the table-building, most is self-explanatory, so I will skip the comments
$q1 = mysql_query("CREATE TABLE IF NOT EXISTS `auth` (`user` varchar(30) NOT NULL,`session` varchar(50) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
if (!$q1) {
	echo "<a href=\"install.php\">Go back</a><br/>Fail!";
	die("");
}
$q2 = mysql_query("CREATE TABLE IF NOT EXISTS `chat` (`time` varchar(30) NOT NULL,`user` varchar(30) NOT NULL,`text` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1");
if (!$q2) {
	echo "<a href=\"install.php\">Go back</a><br/>Fail!";
	die("");
}
echo "Success<br/>";
# Status update again
echo "Writing config...";
# Open config file
$file = fopen("includes/config.db.php", "w");
# Set file contents
$config = "<?php 
\$title = \"".$title."\"; 
\$mysql_host = \"".$mysql_host."\"; 
\$mysql_database = \"".$mysql_database."\"; 
\$mysql_user = \"".$mysql_user."\"; 
\$mysql_password = \"".$mysql_password."\"; 
?>";
# Write config
fwrite($file, $config);
# Close config
fclose($file);
echo "Success <br/>";
# Echo out the finished message
echo 'Finished!<br/> <a href="index.php">Click here to visit the new chat room</a>. For further customization, feel free to mess around with the PHP files. Note: The login screen can be tweaked in the includes/actions.php file, not index.php. Also, there is a file called index-small.php (with corresponding includes/actions-small.php and includes/small.css, which will provide a small version of the site appropriate for embeding in a wordpress widget (Hint: use the "Text" widget and set the html to and iframe pointing to the chat script.) As a final note, many webhosts don\'t appreciate chat scripts, so be sure to check (I\'ve wiped my site clean about three times because of this). <br/>

Happy hacking,<br/>
Aditya';
?>
</body>
</html>
