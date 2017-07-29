<?php
session_start();
$aname='';
$con = mysqli_connect("localhost","root","","social");
$che=0;
$new='';

$comm="Donot have Id?...Wanna Start?";
if(isset($_POST['login'])){

	$aemail = $_POST['email'];
	$pass = $_POST['pass'];

	$ddf = mysqli_query($con, "SELECT  ID,user_pass,user_nicename FROM s_users  WHERE user_email='$aemail' ");
		{
		//if($ddf) echo "yes"; else echo "no";
		while($r = mysqli_fetch_array($ddf)){
			$aid=$r['ID'];
			echo $aid;
			 $_SESSION['user'] = $aid;
            echo $aid;
			echo $_SESSION['user'];


			header('Location: index.php');
		$apassword = $r['user_pass'];
		$aname = $r['user_nicename'];

		}

	}
}
$dd='';
//signup............................................
if(isset($_POST['Logout'])){
	$ar=0;
	$aid=$_SESSION['user'];
	 $sql = mysqli_query($con,"UPDATE s_users SET activity='$ar',login_at='0-0-0 0:0:0' WHERE ID='$aid'");
	session_destroy();
header('Location: login2.php');}

$n = '<table align="center"  style="font-size:20px; margin-top:40px; padding:0px 10px; height:500px; width:450px;  " cellspacing="0">
	<tr><th>s.no</th><th>email</th><th>pass</th><th>name</th</tr>';

$con = mysqli_connect("localhost","root","","social");
//f($con) echo "oh yeah!";


if(isset($_POST['go'])){
	$pass1 = $_POST['pass1'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$name = $_POST['name'];
	$about = $_POST['about'];
	$comm="Enter your ";
	if(!$pass)$comm.=" Password... ";if(!$name)$comm.="  Name...";if(!$email)$comm.=" Username...";if($pass!=$pass1)$comm.=" Password Not Matched...";
	$dr = mysqli_query($con, "SELECT user_nicename FROM s_users  WHERE user_email='$email' ");
		{
		while($rt = mysqli_fetch_array($dr)){$comm= "Already exists";$che=1;}}
		if($che==0&&$pass&&$name&&$email&&($pass==$pass1))
		{
	$sql = mysqli_query($con,"insert into s_users values('','$email','$pass','$name','$about')");

	$ddf = mysqli_query($con, "SELECT  ID FROM s_users WHERE user_email='$email'");
		{
		while($r = mysqli_fetch_array($ddf)){
		$aid=$r['ID'];}}
		$a=1;
	$sql = mysqli_query($con,"insert into s_friends values('','$aid','$aid')");
	$sql = mysqli_query($con,"insert into post_add values('','$aid','$a')");
$comm= "You have just Signed Up...Login In to continue..";
}
$comm.="!!!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hello-buddy</title>
<style>
*{
	margin: 0px;
	width: 100%;
}
html, body {
    height: 100%; /* IMPORTANT!!! stretches viewport to 100% */
}
.headingi{
	z-index: 1000;
	float: left;
	width: 96%;
	padding: 2%;
	background-color: #2471A3;
	color: white;
	font-family: 'Kaushan Script', cursive;
}
.head1{
	z-index: 1000;
}
.conatiner{
	width: 100%;
	float: left;
	min-height: 100%;
}
.heading2{
	width: 100%;
	height: 30px;
	background-color: #2C3E50;
	float: left;
}
.lefting{
	width: 20%;
	float: left;
	height: 80vh;
}
.righting{
	width: 40%;
	float: left;
	background-color:#CACFD2;
	position: absolute;
	margin-left: 30%;
	margin-top: 200px;
	opacity: 0.9;
	border-radius:3% 3% 3% 3%;
}

#new{
	padding: 10px;
	float: left;
	width: 100px;
	height: 40px;
	color: green;
	background-color: #85929E;
	outline: none;
	border: none;
	border-radius:12% 12% 0% 0%;
}
#already{
	padding: 10px;
	width: 250px;
	float: left;
	height: 40px;
	color: green;
	background-color:  #BDC3C7;
	outline: none;
	border: none;
	border-radius:12% 12% 0% 0%;
}
#new:hover{
	cursor: pointer;
	background-color: #45B39D;
	color: white;
}
#already:hover{
	cursor: pointer;
	background-color: #45B39D;
	color: white;
}
.loginform{
	text-align: center;
	float: left;
	margin: 4%;
	padding: 14%;
	width: 60%;
}
.signform{
	text-align: center;
	float: left;
	padding: 2%;
	width: 96%;
}
input{
	text-align: center;
	font-size: 13px;
}
input[type="submit"]{
	background-color: #16A085;
	border-radius: 3%;

	color: white;
}
input[type="submit"]:hover{
	background-color: #117A65;
	cursor: pointer;
}
</style>
<script type="text/javascript" src="testscript.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	$(function(){
		$('.signform').hide();
		$('#new').click(function(){
			$('#new').css({'background-color':'#BDC3C7'});
			$('#already').css({'background-color':'#85929E'});
			$('.signform').show();
			$('.loginform').hide();
		});
		$('#already').click(function(){
			$('#already').css({'background-color':'#BDC3C7'});
			$('#new').css({'background-color':'#85929E'});
			$('.signform').hide();
			$('.loginform').show();
		});
	});
</script>
</head>
<body bgcolor="#34495E"><?php
if(isset($_SESSION['user'])){echo '';}else{
echo
'

		<div class="head1">
			<div class="headingi">
						<h1 >Hello Buddy</h1>
			</div>
			<div class="heading2">
						<h1>.</h1>
			</div>

			<div class="container">

			<div class="lefting" style="background-color:#34495E;">
				.
			</div>
			<div class="lefting"  style="background-color:#16A085;">
				.
			</div>
			<div class="lefting" style="background-color:#C0392B;">
				.
			</div>
			<div class="lefting" style="background-color:#CA6F1E;">
				.
			</div>
			<div class="lefting" style="background-color:#6C3483;">
				.
			</div>

				<div class="righting">
					<div class="buttons" style="background-color:white;width:100%;float:left;border-radius:15% 10% 0% 0%;">

						<button id="already">Already hava An account?</button>
						<button id="new" >New User?</button>
					</div>
					<div class="loginform">
						<form  action="session.php" method="post" autocomplete="off" >

												<input type="text" style="height:30px; width:230px;" name="email" placeholder="Username" required /><br></br>
												<input type="password" style="height:30px; width:230px;" name="pass" placeholder="password" required/><br><br>
												<hr>
												</br>

												<input type="submit" style="height:40px; width:100%;font-size:20px;" name="login" value="login"/><bR>


								</form>
						</div>


						<div class="signform">
							<form  id="forrm1" "  align="center" action="login2.php" method="post" autocomplete="off">

									<div class="input_container"><br>
												<input type="hidden" id="get_id"  value="" name="rcivrid" style="height:20px; width:230px;margin-top:10px;">
												<textarea required  id="friend_id" name="email" placeholder="Enter username" onkeyup="autocomplet()" style="height:30px; width:230px;font-size:15px;text-align:center;"></textarea><br>
												<ul style="width:100%;text-align:center;padding:0px;list-style:none;" id="friend_list_id" ></ul>
									</div>
										<br>
										<input required type="password" id="passa" style="height:20px; width:230px;" name="pass" placeholder="Enter password"/>
										</br><br>
										<input required type="password" style="height:20px; width:230px;" name="pass1" placeholder="Enter password Again"/><br>
										</br>
										<input required type="text" style="height:20px; width:230px;" name="name" placeholder="Enter Name"/><br></br>
										<textarea required style="height:40px; width:230px;text-align:center;" name="about" placeholder="Enter About yourself"></textarea><br></br><hr><br>
										<input type="submit" style="height:40px; width:100%;font-size:22px;" name="go" value="sign-up"/><br><hr>

								</form>
							</div>

						</div>
			</div>';}?>
</body> </html>
