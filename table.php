<?php

require "connect.php";

$sqlCommand = "Create TABLE user(
id int(11) NOT NULL auto_increment,
username varchar(255) NOT NULL,
first_name varchar(255) NOT NULL,
last_name varchar(255) NOT NULL,
email varchar(255) NOT NULL,
password varchar(32) NOT NULL,
sign_up_date date NOT NULL,
activated enum('0','1') NOT NULL,
bio text NOT NULL,
profile_pic text NOT NULL,
friend_array text NOT NULL,
PRIMARY KEY(id),
Unique KEY username(username))";

if(mysqli_query($con,$sqlCommand)){
	echo "Your table has been created!";
} else{
	echo "Error in creation!";
}

?>

