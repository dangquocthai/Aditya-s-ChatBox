# Aditya's ChatBox: The super-light chat room.
## Minimum requirements:
PHP 5+

MySQL 5+

There are two ways to install Aditya's ChatBox: Mannual and Web-based.

##Web-Based:
1) Upload the chat folder to your web server. In this example, it's accesssible via http://aditya.s.chatbox.com/chat/

2) Go to http://aditya.s.chatbox.com/chat/, or wherever you uploaded it.

3) You will see a link to set up chat. Click it.

4) Create a mysql database and fill in the form.

5) You will see a progress screen. If you filled in the correct details, you can now visit the chat.

##Mannual (Advanced) :
1) Rename includes/config.db.sample.php to includes/config.db.php

2) Edit the config.db.php file to suit your needs

3) Import db.sql into the mysql database you mentioned in the config.db.php file

Note: There is a script called erase.php that erases the database of users and posts. This script will only run if there is a file called 'db.erase' in the root directory of the chat script i.e the directory in which this file is. After execution, the script deletes the db.erase script
