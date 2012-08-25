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
