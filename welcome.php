<?php
if(isset($_COOKIE["user_name"]))
	echo 'Welcome ' . $_COOKIE["user_name"];
else echo 'Please <a href="/dashboard">login</a>';