<?php
include "session.php";
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	}
$keyword = '%'.$_POST['keyword'].'%';
$keyward=$_POST['keyword'];

$df = mysqli_query($con, "UPDATE check_type SET typing_to=0,typing_at='0-0-0 0:0:0' WHERE user_id='$aid'");


?>