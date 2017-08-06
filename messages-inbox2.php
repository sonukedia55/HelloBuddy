<?php
include "session.php";
$p='';
$get=array(10);
$le=0;
$q='';
$d='';
$select=100;
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

	$sql = mysqli_query($con,"update  check_type set msg_new=0 where user_id='$aid' ");
$ddf2 = mysqli_query($con, "SELECT  user_id,typing_at FROM check_type");
		{
		while($r9 = mysqli_fetch_array($ddf2)){
				$add12=$r9['user_id'];
				$date111=$r9['typing_at'];
				$d2=date('y-m-d H:i:s');
				$diffii= strtotime($d2)-strtotime($date111);
				if($diffii>10){
						$ar=0;
						$sql = mysqli_query($con,"UPDATE check_type SET typing_to='$ar',typing_at='0-0-0 0:0:0' WHERE user_id='$add12'");
				}
		}
		}
if(isset($_POST['send'])){

	$tm = $_POST['time'];
	$mes = $_POST['mes'];
	$rcivrid = $_POST['rcivrid'];
	$sub = "a";
	$dftf = mysqli_query($con, "SELECT msg_new FROM check_type WHERE user_id=$rcivrid ");{
												while($r45 = mysqli_fetch_array($dftf)){ $mmg=0;$mmg=$r45['msg_new']; $mmg=$mmg+1;}}
	$sql = mysqli_query($con,"update  check_type set msg_new='$mmg' where user_id='$rcivrid' ");
	$sql = mysqli_query($con,"insert into s_messages values('','$tm','$aid','$rcivrid','$sub','$mes')");}

	if(isset($_POST['messg'])){

		$tm = time();
	$mes = $_POST['messag'];
	$senderid = $_POST['sender'];
	$rcivrid = $_POST['reciv'];
	$sub = 'a';
	$mmg=0;
	$dftf = mysqli_query($con, "SELECT msg_new FROM check_type WHERE user_id=$rcivrid ");{
												while($r45 = mysqli_fetch_array($dftf)){
													 $mmg=0;$mmg=$r45['msg_new']; $mmg=$mmg+1;
												 }}
	$sql = mysqli_query($con,"update  check_type set msg_new='$mmg' where user_id='$rcivrid' ");
	$sql = mysqli_query($con,"insert into s_messages values('','$tm','$senderid','$rcivrid','$sub','$mes')");
	$med=$rcivrid;
	$_SESSION['messs']=$med;
	$select=$med;

			$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$med ");{
												while($r4 = mysqli_fetch_array($dff)){
											$sname=$r4['user_nicename'];}}
											$d.='<hr style="width:60%;"><br><div style="width:80%;float:left;"><u><li style="background-color:blue;color:white;text-align:center">'.$sname.'</li></u><br><li style="color:white;text-align:center"><form action="messages-inbox2.php" method="post" ><input type="hidden" name="sender" value="'.$aid.'"/><input id="typingto" type="hidden" name="reciv" value="'.$med.'"/><textarea onkeyup="typingtest()"  id="reeply" style="height:40px; width:60%;" name="messag" placeholder="reply...." ></textarea><input type="submit" name="messg" name="mess" value="Reply" style="height:45px; width:20%;float:right;"/><br></form></li></div><br><br><br><Br>';



	}
//f($con) echo "oh yeah!";

if(isset($_POST['mess'])){
			$med=$_POST['reciv'];
			$_SESSION['messs']=$med;
			$select=$med;

			$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$med ");{
												while($r4 = mysqli_fetch_array($dff)){
											$sname=$r4['user_nicename'];}}
											$d.='<hr style="width:60%;"><br><div style="width:80%;float:left;"><u><li style="background-color:blue;color:white;text-align:center">'.$sname.'</li></u><br><li style="color:white;text-align:center"><form action="messages-inbox2.php" method="post" ><input type="hidden" name="sender" value="'.$aid.'"/><input  id="typingto" type="hidden" name="reciv" value="'.$med.'"/><textarea onkeyup="typingtest()"  id="reeply" style="height:40px; width:60%;" name="messag" placeholder="Reply...." ></textarea><input type="submit" name="messg" name="mess" value="Reply" style="height:45px; width:20%;float:right;"/><br></form></li></div><br><br><br><Br>';


		}
		$mysend='<table style="text-align:left;">';
		$dfffl = mysqli_query($con, "SELECT message_recipient_id,message_content FROM s_messages WHERE message_sender_id='$aid'  ORDER BY ID DESC");{
							while($r32 = mysqli_fetch_array($dfffl)){
									$ddd='';
										$ridd=$r32['message_recipient_id'];
										$mees=$r32['message_content'];
										$dfffg = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID='$ridd' ORDER BY ID DESC");{
										while($r333 = mysqli_fetch_array($dfffg)){ $nnname=$r333['user_nicename'];}}


										$dfffi = mysqli_query($con, "SELECT ID FROM s_messages WHERE message_sender_id='$ridd' and message_recipient_id='$aid'  ORDER BY ID DESC");{
												while($r33 = mysqli_fetch_array($dfffi)){ $ddd=$r33['ID'];}
										if($ddd){$mysend.='';}else{$mysend.='<tr><td style="width:40%;"><a style="background-color:#2980b9;text-align:left;color:#34495e;">'.$nnname.'</a></td><td style=""><a style="color:white;text-align:left;">'.$mees.'</a></td></tr>';}}
							}
		}


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
														$p.='<br><div id="sider" style="width:200px;float:left;">
																				<form action="messages-inbox2.php" method="post">
																				<input type="hidden" name="reciv" value="'.$mid.'"/>
																				<input class="mesbox" type="submit" style="border:none;font-size:20px;height:40px;width:120px;"  name="mess" value="'.$sname.'"/></form>
																			</div><br>';
												$dffg = mysqli_query($con, "SELECT message_recipient_id,message_sender_id,message_content FROM s_messages WHERE message_recipient_id='$aid' and message_sender_id='$mid' or message_recipient_id='$mid' and message_sender_id='$aid' ORDER BY ID DESC LIMIT 1");{
													while($r7 = mysqli_fetch_array($dffg)){
														$mess=$r7['message_content'];
														$mid=$r7['message_sender_id'];
														$ssid=$r7['message_recipient_id'];

														$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$mid ");{
															while($r4 = mysqli_fetch_array($dff)){
															$sname=$r4['user_nicename'];

															if($mid==$aid){
																if(($select==$mid)||($select==$ssid)){
																		$p.='<div class="contentn" ><h3 align="right" ></h3><p class="containng" ><b>you:</b>  '.$mess.'</p></div>';
															}else
																{
																	$p.='<div class="contentn" "><h3 align="right" ></h3><p class="containng" ><b>you:</b>  '.$mess.'</p></div>';}
															}else{
															$p.='<div class="contentn" ><h3 ></u></h3><p class="containng" >'.$mess.'</p></div>';}
															}
																}
																}

							}$p.='<hr style="width:50%;">';
				}}
		}
		if($select==100){
			$med=$get[0];
			$_SESSION['messs']=$med;


$sname='';
			$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$med ");{
												while($r4 = mysqli_fetch_array($dff)){
											$sname=$r4['user_nicename'];
										}
									}
											$d.='<hr style="width:60%;"><br><div style="width:80%;float:left;"><u><li style="background-color:blue;color:white;text-align:center">'.$sname.'</li></u><br><li style="color:white;text-align:center"><form action="messages-inbox2.php" method="post" ><input type="hidden" name="sender" value="'.$aid.'"/><input  id="typingto" type="hidden" name="reciv" value="'.$med.'"/><textarea id="reeply" onkeyup="typingtest()" style="height:40px; width:60%;" name="messag" placeholder="Reply...." ></textarea><input type="submit" name="messg" name="mess" value="Reply" style="height:45px; width:20%;float:right;"/><br></form></li></div><br><br><br><Br>';

		}



?>
<!doctype html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Inbox</title>
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
		<style>
		*{
			margin: 0px;
			width: 100%;
		}
		html,body{
			width: 100%;
		}
				.give_container {
					height: 30px;
					float: left;
				}
				.give_container input {
					height: 20px;
					width: 200px;
					padding: 3px;
					border: 1px solid #cccccc;
					border-radius: 0;
				}
				.give_container ul {
					padding:0px 0px;
					border: 1px solid #eaeaea;
					position: absolute;
					z-index: 9;
					background: grey;
					list-style: none;
					margin-left:23px;
					margin-top:-5px;
				}
				.give_container ul li {
					padding: 2px;
					color:black;
				}
				.give_container ul li:hover {
					background: #eaeaea;
				}
				#friend_list_list {
					display: none;
				}
				#friending_list_list {
					display: none;
				}
				.goti:hover{
					cursor:pointer;
				}
				.mesbox{background-color:grey;}
				.mesbox:hover{background-color:green;}

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
				.left4{width:50%; min-height:380px;position:absolute;solute;float:left;font-size:14px;margin-left:30%;}
				.left3{width:42%; min-height:380px; background-color:lightblue;float:left;font-size:14px;padding:5%;margin-top:5%;}
				.helli{display:none;}
				.top1{
				width:100%;height:80px; background-color:black;float:left;text-align:right;padding-top:10px;}
				.header{display:none;}
				#mennu{display:none;}
				.containng{color:white;background-color:black;border:solid 2px red;padding:10px;width:190px;}
				.contentmy{margin-left:200px;width:220px;}
				#conmy{background-color:orange;border:solid 2px red;padding:10px;width:190px;border-radius: 10px;}
				.contentm{margin-left:0px;width:220px;}
				#conm{background-color:lightgreen;border:solid 2px red;padding:10px;border-radius: 10px;}

				::-webkit-scrollbar {
						width: 8px;
						opacity: 0.9;
						background:#d6dbdf;
				}
				::-webkit-scrollbar-thumb {
					width:7px;
					background:  #196f3d;
					border-radius:4%;
				}
				</style>
		<link rel="stylesheet" href="hellostyle.css"/>

		<script  type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="testscript.js"></script>
		<script type="text/javascript" src="scriptstay.js"></script>
		<script type="text/javascript">
				$(function(){
				var auto_refresh = setInterval(
				function()
				{
				$('#left3').load('mess.php');
				return false;}, 2000);
				});
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

</head>


<body bgcolor="#34495E" id="container">
		<div id="msg_show"  style="position:fixed;height:30px;width:30px;border:solid 2px white;display:none;z-index:6;text-align:center;margin-top:100px;margin-left:93%;font-size:20px;"><?php echo '<a style="color:white;text-decoration:none" href="messages-inbox2.php">'.$msg_count.'</a><input type="hidden" value="'.$msg_count.'" id="msg_but" />';?></div>
		<div id="mennu" style="position:absolute;margin-top:50px;width:50%;display:none;">
			<ul >
				<li><a href="messages-inbox2.php" style="color:white;text-decoration:none;border:none;">Messages</a></li>
				<li ><a href="directory2.php" style="color:white;text-decoration:none;">Directory</a></li>
				<li><a href="setting.php" style="color:white;text-decoration:none;">Setting</a></li>
				<li style="padding:0px"><form method="post" align="center" action="login2.php"><input type="submit" style="width:100%;height:70px;background-color:black;color:white;font-size:20px;"name="Logout" value="Logout"/></form></li>
			</ul>
		</div>


			<div class="headingi">
						<h1 >Hello Buddy</h1>
			</div>
			<div class="heading2">
				<a href="messages-inbox2.php">Messages</a>
				<a href="directory2.php">Directory</a>
				<a href="setting.php">Setting</a>
			</div>


							<form method="post" align="right" action="login2.php" style="position:fixed;z-index:40;"><input type="submit"  id="logoutbu" name="Logout" value="Logout"/></form>


	<div class="total" style="float:left; width:100%;">

		<div class="left1">

			<div class="hell" style="padding-left:20px;"><?php echo $p;?></div>


		</div>

		<div class="filling" >
			<?php
				$q='';
				$select=100;


						if($select==100){




							$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$med ");{
																while($r4 = mysqli_fetch_array($dff)){
															$sname=$r4['user_nicename'];}}


						$dffg = mysqli_query($con, "SELECT message_sender_id,message_content FROM s_messages WHERE message_recipient_id='$aid' and message_sender_id='$med' or message_recipient_id='$med' and message_sender_id='$aid' ORDER BY ID DESC LIMIT 5");{
														while($r7 = mysqli_fetch_array($dffg)){
															$mess=$r7['message_content'];
															$med=$r7['message_sender_id'];

															$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$med ");{
																while($r4 = mysqli_fetch_array($dff)){
																$sname=$r4['user_nicename'];

																if($med==$aid){
																	$q.='<div class="contentmy" style="margin-left:150px;width:220px;"><h3 align="right" ></h3><p id="conmy" ><b>you:</b>  '.$mess.'</p><br></div>';
																}else{
																$q.='<div class="contentm" style="margin-left:0px;width:220px;"><h3 ></u></h3><p id="conm" >'.$mess.'</p><br></div>';}
																}
																	}
																	}

								}$q.='<hr style="width:60%;">';
						}


				echo '<br><br>'; echo $q;
				?>


		</div>

		<div class="content">
			<p>
					<form method="post" align="center" action="messages-inbox2.php" >
						<input name="time" type="hidden" value="<?php echo time(); ?>" />

						<li style="background-color:#2874a6;text-decoration:none;list-style:none;color:white;">COMPOSE</li><br>
							<div class="give_container">
							<input type="hidden" id="get_id"  value="" name="rcivrid" style="height:30px; width:230px;">
							<textarea  id="friend_list" placeholder="Enter Name" onkeyup="tocomplet()" style="height:30px; width:230px;"></textarea><br>
							<ul id="friend_list_list" style="background-color:grey;width:200px;color:white;" ></ul>


						</p>
						<p>

							<textarea style="height:90px; width:230px;" placeholder="Write Messages.." name="mes"></textarea><br>
						</p>
						<p>

							<input type="submit" value="send"style="background-color:blue;color:white;cursor:pointer" name="send"/>
						</p><br>

					</form>

					<br>
					<h3>Messages-Request</h3><hr><br><?php echo $mysend;?>
</div>
		</div>
	</div>
</div>

</body>

</html>
