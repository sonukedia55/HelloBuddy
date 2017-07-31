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
	
	if(isset($_POST['messg'])){
		$tm = time();
	$mes = $_POST['messag'];
	$senderid = $_POST['sender'];
	$rcivrid = $_POST['reciv'];
	$sub = 'a';
	$sql = mysqli_query($con,"insert into s_messages values('','$tm','$senderid','$rcivrid','$sub','$mes')");
	}
//f($con) echo "oh yeah!";
$p='';
$get=array(10);
$le=0;

		

		
		$dffl = mysqli_query($con, "SELECT message_sender_id FROM s_messages WHERE message_recipient_id='$aid'  ORDER BY ID DESC");{
							while($r3 = mysqli_fetch_array($dffl)){
											$mid=$r3['message_sender_id'];
											$do=1;
											$check=0;
											for($x=0;$x<$le;$x++){
												if($get[$x]){
											if($get[$x]==$mid){$check+=1;};}
												if($check!=0){$do=0;
											$check=0;};}
												
											if($do==1){
											$le+=1;
											$get[$x]=$mid;
											$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$mid ");{
												while($r4 = mysqli_fetch_array($dff)){
											$sname=$r4['user_nicename'];}}
											$p.='<hr style="width:50%;"><br><div style="width:200px;float:left;"><h1>'.$sname.'</h1></div><div style="float:left;"><form action="messages-inbox.php" method="post" style="margin-left:-200px;"><input type="hidden" name="sender" value="'.$aid.'"/><input type="hidden" name="reciv" value="'.$mid.'"/><input type="text" style="height:40px; width:200px;margin-left:200px;" name="messag" placeholder="Replay...." ><input type="submit" name="messg" value="Send"style="height:40px; width:50px;"/><br></form></div><br><br><Br>';
									$dffg = mysqli_query($con, "SELECT message_sender_id,message_content FROM s_messages WHERE message_recipient_id='$aid' and message_sender_id='$mid' or message_recipient_id='$mid' and message_sender_id='$aid' ORDER BY ID DESC LIMIT 3");{
										while($r7 = mysqli_fetch_array($dffg)){
											$mess=$r7['message_content'];
											$mid=$r7['message_sender_id'];
											
											$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$mid ");{
												while($r4 = mysqli_fetch_array($dff)){
												$sname=$r4['user_nicename'];
												
												if($mid==$aid){
													$p.='<br><div class="content" style="margin-left:150px;width:220px;"><h3 align="right" ></h3><p style="background-color:lightblue;border:solid 2px red;padding:10px;width:190px;">'.$mess.'</h5><br></div>';
												}else{
												$p.='<br><div class="content" style="margin-left:0px;width:200px;"><h3 ></u></h3><p style="background-color:lightgreen;border:solid 2px red;padding:10px;margin-left:10px;">'.$mess.'</h5><br></div>';}
												}
													}
													}
											
				}$p.='<br><hr style="width:50%;"><hr style="width:50%;"><br>';
				}}
		}
							

?>
<!doctype html>
<html>
	<head>
		<title>Friends List</title>
		<link rel="stylesheet" href="style.css" />
		<style>li{font-size:22px; border:solid 2px black;padding:9px; float:left; decoration:none; color:white; background-color:blue;}
	a{color:white;}</style>
	</head>
	<body>
		<div id="navigation">
		<ul>
					<li><a href="login2.php">Logout</a></li>
					<li><a href="profile-view.php">View profile</a></li>
					<li><a href="profile-edit.php">edit profile</a></li>
					<li><a href="directory.php">Member Directory</a></li>
					<li><a href="friends-list.php">Friends List</a></li>
					<li><a href="feed-view.php">View feed</a></li>
					<li><a href="feed-post.php">post status</a></li>
					<li><a href="messages-inbox.php">Inbox</a></li>
					<li><a href="messages_compose.php">compose</a></li>
					<li><a href="login.php">sign-up</a></li>
				</ul>
		</div><br><div style="clear:both"></div>
		<h1 align="center">INbox</h1>
		<div class="content" style="width:100%; background-color:orange;">
		<div class="content" style="padding:20px;font-size:15px;padding-up:40px;"> 
			<?php echo $p;?>
		</div></div>
	</body>
</html>