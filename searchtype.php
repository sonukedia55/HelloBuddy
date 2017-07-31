<?php
include "session.php";
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	}
$keyword = '%'.$_POST['keyword'].'%';
$keyward=$_POST['keyword'];
$datey=date('y-m-d H:i:s');
$df = mysqli_query($con, "UPDATE check_type SET typing_to='$keyward',typing_at='$datey' WHERE user_id='$aid'");


?>