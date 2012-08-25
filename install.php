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
# Check if config file exists, and if it does, don't run for security reasons.
$filename = 'includes/config.db.php';
if (file_exists($filename)) {
    die("The installer is locked. Please delete the file \"".$filename."\" to rerun the installer.");
}

echo '
<html>
<head>
<title>Install Aditya\'s ChatBox</title>
</head>
<body>
<center>
<h1>Install Aditya\'s ChatBox</h1>
<form action="install2.php" method="post">
<div class="row requiredRow">
<label for="cn" id="cn-ariaLabel">Chat name i.e Page Title</label>
<input id="cn" name="cn" type="text" aria-labelledby="cn-ariaLabel" class="required" title="Chat title, i.e page title:. This is a required field"><br/>
<label for="dbname" id="dbname-ariaLabel">Database Name:</label>
<input id="dbname" name="dbname" type="text" aria-labelledby="dbname-ariaLabel" class="required" title="Database Name:. This is a required field">
</div>
<div class="row requiredRow">
<label for="dbhost" id="dbhost-ariaLabel">Database Host:</label>
<input id="dbhost" name="dbhost" type="text" aria-labelledby="dbhost-ariaLabel" class="required" title="Database Host:. This is a required field">
</div>
<div class="row requiredRow">
<label for="dbusername" id="dbusername-ariaLabel">Database Username:</label>
<input id="dbusername" name="dbusername" type="text" aria-labelledby="dbusername-ariaLabel" class="required" title="Database Username:. This is a required field">
</div>
<div class="row requiredRow">
<label for="dbpasswd" id="dbpasswd-ariaLabel">Database Password:</label>
<input id="dbpasswd" name="dbpasswd" type="password" aria-labelledby="dbpasswd-ariaLabel" class="required" title="Database Password:. This is a required field">
</div>
<div class="row">
<input type="submit" value="Go!">
</div>
</form>
</center>
</body>
</html>';
?>
