<?php
$filename = 'db.erase';
if (file_exists($filename)) {
# Get config
include("includes/config.php");
# TRUNCATE the tables
$q1 = mysql_query("TRUNCATE TABLE auth;");
$q2 = mysql_query("TRUNCATE TABLE chat;");
# Send the user off to the login screen
header("Location: index.php");
unlink("db.erase");
}else{
die("Access Blocked");
}
?>
