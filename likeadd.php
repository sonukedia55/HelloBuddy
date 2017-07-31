<?php
$con = mysqli_connect("localhost","root","","social");
include "session.php";
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	}
	
$do=1;

$status=$_POST['keyword'];


$dff = mysqli_query($con, "SELECT  likes,count_likes FROM s_status  WHERE ID='$status' ");
	{
		while($r33 = mysqli_fetch_array($dff)){
			
			$tempp = $r33['likes'];
			$ctempp=$r33['count_likes'];
			
		}
	}
$ff=10;
$df2 = mysqli_query($con, "UPDATE active SET user_id='$tempp' WHERE user_id=$ff");
$myArray=explode(',',$tempp);
$back=$ctempp;
$chckr=0;
while($ctempp!=0){
	if($myArray[$ctempp-1]==$aid){$do=0;$chckr=$ctempp;}
	$ctempp=$ctempp-1;
}

if($do==1){$myArray[$back]=$aid;}
if($do==0){$myArray[$chckr-1]=0;$back-=2;}
$finalArray=implode(',',$myArray);
$back+=1;
$df = mysqli_query($con, "UPDATE s_status SET likes='$finalArray',count_likes='$back' WHERE ID='$status'");

?>