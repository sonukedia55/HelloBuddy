<?php
include "session.php";
$con = mysqli_connect("localhost","root","","social");
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	$ddf = mysqli_query($con, "SELECT  user_email,user_pass,user_nicename FROM s_users  WHERE ID='$aid' ");
		{
		while($r = mysqli_fetch_array($ddf)){
			$aemail = $r['user_email'];
			$apassword = $r['user_pass'];
			$aname = $r['user_nicename'];
		}
}}

$n = '<table align="center"  style="width:70%;text-align:center;font-size:25px; padding:20px 50px;margin-top:20px;" cellspacing="0">
	';

$nf = '<table align="center"  style="width:70%;text-align:center;font-size:15px; padding:60px 50px;margin-top:20px;" cellspacing="0">
	';


$e='';
$tf='';

$df = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$aid");{
							while($ri = mysqli_fetch_array($df)){
							$aname=$ri['user_nicename'];}

				}
	if(isset($_POST['addy'])){
	$fid = $_POST['add'];

	$sql = mysqli_query($con,"insert into s_friends values('','$aid','$fid')");

	}
	if(isset($_POST['remy'])){
		$ab=1;
	$fidy = $_POST['add'];

	$sql = mysqli_query($con,"DELETE FROM s_friends WHERE user_id='$aid' AND friend_id='$fidy'");}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon"
     type="image/jpg"
     href="pic.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hello-buddy</title>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<style>
*{margin:0px;}
#rem{background-color:red;}
#rem:hover{background-color:maroon;}
#add{background-color:limegreen;}
#add:hover{background-color:green;}
.input_container {
	height: 30px;
	float: left;
	text-align:center;
}
.input_container input {
	height: 40px;
	width: 200px;
	border: 1px solid #cccccc;
	border-radius: 0;
	text-align:center;
	color:white;
}
.input_container ul {
	padding:0px 0px;
	position: absolute;
	z-index: 9;
	list-style: none;
	margin-left:50px;
	margin-top:-5px;
	width:300px;
	height:40px;


}
.input_container ul li {
	padding: 50px;
	margin-left:20px;
	height:40px;
	background-color:grey;
	width:250px;

}

#friend_list_id {
	display: none;
}
td{
	font-size: 12px;
}
hr{
	margin-top: 10px;
	margin-bottom: 10px;
}
#logoutbu{
	background-color:maroon;
	border-radius:0% 0% 0% 14%;
	color:white;padding:5px;
	float:right;
	width:80px;
	border:solid 1px maroon;
	outline:none;
	cursor: pointer;
	border-left: solid 1px white;
	border-bottom: solid 1px white;
}


</style>
<script type="text/javascript" src="testscript.js"></script>
<script  type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

$("document").ready(function(){
	var chhk=0;
	$("#mennu").hide(00);
	$("#menuicon").click(function(){
	if(chhk==0) {
		$("#mennu").show(00); chhk=1;}
	else {
		$("#mennu").hide(00); chhk=0;}
			});
});
</script>
<link rel="stylesheet" href="hellostyle.css" />
</head>
<body bgcolor="#34495E" id="container">
		<div id="msg_show"  style="position:fixed;height:30px;width:30px;border:solid 2px white;display:none;z-index:6;text-align:center;margin-top:100px;margin-left:93%;font-size:20px;"><?php echo '<a style="color:white;text-decoration:none" href="messages-inbox2.php">'.$msg_count.'</a><input type="hidden" value="'.$msg_count.'" id="msg_but" />';?></div>
		<div id="mennu" style="position:absolute;margin-top:50px;width:50%;display:none;">
			<ul >

				<li ><a href="index.php" style="color:white;text-decoration:none;">Home</a></li>
				<li><a href="messages-inbox2.php" style="color:white;text-decoration:none;border:none;">Messages</a></li>
				<li><a href="setting.php" style="color:white;text-decoration:none;">Setting</a></li>
				<li style="padding:0px"><form method="post" align="center" action="login2.php"><input type="submit"  name="Logout" value="Logout"/></form></li>
			</ul>
		</div>


			<div class="headingi">
						<h1 >Hello Buddy</h1>
			</div>
			<div class="heading2">
				<a href="index.php">Home</a>
				<a href="messages-inbox2.php">Messages</a>
				<a href="setting.php">Setting</a>

			</div>


				<form method="post" align="right" action="login2.php" style="position:fixed;z-index:40;width:100%;text-align:right;"><input type="submit"  id="logoutbu" name="Logout" value="Logout"/></form>


	<div class="total" style="float:left; width:100%;">

		<div class="left1">

					<img id="ppic"  src="uploads/<?php $ag=0;
			 if (file_exists("uploads/".$aid.".jpg") ){$ag=$aid;}echo $ag;?>.JPG"/><br><h1 align="center" style="color:#D4E6F1;"><?php echo $aname;?></h1>
			 <br><br>

		</div>

			<div class="filling" align="center" style="padding-top:20px;">
				<h4 style="color:#5d6d7e;">Hello Buddy's Directory</h4>
								<?php		$ddf = mysqli_query($con, "SELECT ID,user_email,user_nicename FROM s_users ");
						{

						while($r = mysqli_fetch_array($ddf)){
							$ab=0;
							$no=$r['ID'];
							$d = $r['user_email'];
							$dll = $r['user_nicename'];
							$ag=0;
							 if (file_exists("uploads/".$no.".jpg") ){$ag=$no;}
							if($no!=$aid){
							$e .= '<tr><td><hr><td><hr></tr><tr><td><img style="width:30px; height:30px;" src="uploads/'.$ag.'.JPG"/><td>'.$dll.'<br>';}

							$def = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id='$aid' AND friend_id='$no'");
								{

								while($rp = mysqli_fetch_array($def)){
									$ab=1;
								}
							}
								if($no!=$aid){
									if($ab==0){
									$e.='<form  action="directory2.php" method="post">
										<input type="text" style="opacity:0; width:30px; " value="'.$no.'" name="add" />
										<input type="submit" id="add"  value="Follow" style="width:80px;height:20px;color:white;border:none;outline:none;"  name="addy"/></form></td></tr>';}
									if($ab==1) {
										$e.='<form  action="directory2.php" method="post"><input type="text" type="hidden" style="width:120px;opacity:0; width:20px;" value="'.$no.'" name="add" />
												<input id="rem" type="submit"  style="width:80px;height:20px;color:white;border:none;outline:none;"  value="Unfollow" name="remy"/></form></td></tr>';

									}}
						}}
						$e = $n." ".$e; ?>
								<?php echo $e.'<tr><td><hr><td><hr></tr></table>'; ?>


			</div>
			<div class="content" align="center" >
				<div class="input_container" align="center" style="width:100%;"><br><br>
											<input type="hidden" id="get_id"  value="" name="rcivrid" style="height:30px; width:230px;">
											<textarea  id="friend_id" placeholder="Search" onkeyup="completes()" style="height:30px; width:230px;margin-left:20px;"></textarea><br>
											<ul id="friend_list_id" style="width:230px;margin-left:30px;padding:0px;list-style:none;" ></ul>
				</div>
			</div>





			<div class="filling2"align="center" style="display:none;"><br><br><br>
										<?php		$ddf = mysqli_query($con, "SELECT ID,user_email,user_nicename FROM s_users ");
								{

								while($r = mysqli_fetch_array($ddf)){
									$ab=0;
									$no=$r['ID'];
									$d = $r['user_email'];
									$dll = $r['user_nicename'];
									$ag=0;
									 if (file_exists("uploads/".$no.".jpg") ){$ag=$no;}


									$def = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id='$aid' AND friend_id='$no'");
										{

										while($rp = mysqli_fetch_array($def)){
											$ab=1;
										}}
										if($no!=$aid){
										if($ab==2){
										$tf.='<form  action="directory2.php" method="post"><input type="text" style="opacity:0; width:20px; " value="'.$no.'" name="add" /><input type="submit" id="add"  value="Follow" style="width:80px;height:20px;color:white;"  name="addy"/></form></td></tr>';}
										if($ab==1) {
											if($no!=$aid){
									$tf .= '<tr><td><hr><td><hr></tr><tr><td><img style="width:35px; height:35px;" src="uploads/'.$ag.'.JPG"/></td><td style="color:black;"><h3 style="color:black;">'.$dll.'</h3>';}
											$tf.='<form  action="directory2.php" method="post"><input type="text" type="hidden" style="width:80px;opacity:0; width:10px;" value="'.$no.'" name="add" /><input id="rem" type="submit"  style="width:80px;height:20px;color:white;"  value="Unfollow" name="remy"/></form></td></tr>';

										}}
								}}
								$e = $nf." ".$tf; ?>
										<?php echo $tf.'<tr><td><hr><td><hr></tr></table>'; ?>


					</div>
</div>
</body>

</html>
