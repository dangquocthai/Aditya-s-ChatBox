<?php
ini_set('display_errors', 'Off');
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
