<?php
include "session.php"; 

$con = mysqli_connect("localhost","root","","social");
if(!$_SESSION['user']){
	header('Location:login2.php');
}
$frid='';
if(isset($_SESSION['user'])){
$aid=$_SESSION['user'];}
$msg_count=0;
	$d1f = mysqli_query($con, "SELECT msg_old,msg_new FROM check_type WHERE user_id=$aid");{
							while($rit = mysqli_fetch_array($d1f)){
								$mold=$rit['msg_old'];
								$mnew=$rit['msg_new'];
								$msg_count=$mnew-$mold;
								 echo '<a style="color:white;text-decoration:none" href="messages-inbox2.php">'.$msg_count.'</a><input type="hidden" value="'.$msg_count.'" id="msg_but" />';
	}}

//msg-count..........................
?>