<?php
session_start();
$con = mysqli_connect("localhost","root","","social");
$aid=0;
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
}

if(isset($_POST['login'])){
	
	$aemail = $_POST['email'];
	$pass = $_POST['pass'];

	$ddf = mysqli_query($con, "SELECT  ID FROM s_users  WHERE user_email='$aemail' ");
		{
		//if($ddf) echo "yes"; else echo "no";
		while($r = mysqli_fetch_array($ddf)){
			$aid = $r['ID'];
			 $_SESSION['user'] = $r['ID'];

			 $date=date('y-m-d H:i:s');
			 $sql = mysqli_query($con,"UPDATE s_users SET activity='$aid',login_at='$date' WHERE ID='$aid'");
			 
			header('Location: index.php');
		$apassword = $r['user_pass'];
		$aname = $r['user_nicename'];
		
		}
		
	}
}
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
}
	
if(isset($_POST['Logout'])){
	session_destroy();
	header('Location: login2.php');}
	
 $date=date('y-m-d H:i:s');
$sql = mysqli_query($con,"UPDATE s_users SET activity='$aid',login_at='$date' WHERE ID='$aid'");


$ddf = mysqli_query($con, "SELECT  ID,login_at,activity FROM s_users ");
		{
		while($r = mysqli_fetch_array($ddf)){
				$add1=$r['ID'];
				$date11=$r['login_at'];
				$acti=$r['activity'];
				$d2=date('y-m-d H:i:s');
				$diffi= strtotime($d2)-strtotime($date11);
				if($diffi>120){
						$ar=0;
						$sql = mysqli_query($con,"UPDATE s_users SET activity='$ar',login_at='0-0-0 0:0:0' WHERE ID='$add1'");
				}
		}
		}

?>