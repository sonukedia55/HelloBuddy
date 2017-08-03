<?php
include "session.php";

$con = mysqli_connect("localhost","root","","social");
if(!$_SESSION['user']){
	header('Location:login2.php');
}
$frid='';
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	$ddf = mysqli_query($con, "SELECT  user_email,user_pass,user_nicename FROM s_users  WHERE ID='$aid' ");
		{
		while($r = mysqli_fetch_array($ddf)){

			$aemail = $r['user_email'];
			$apassword = $r['user_pass'];

			$aname = $r['user_nicename'];
		}
}
}

//signin............................................................................................................
$aname='';

if(isset($_POST['go'])){

	$aemail=$_POST['email'];

	$ddf = mysqli_query($con, "SELECT  ID,user_email,user_pass,user_nicename FROM s_users  WHERE user_email='$aemail' ");
		{
		//if($ddf) echo "yes"; else echo "no";
		while($r = mysqli_fetch_array($ddf)){
			$aid=$r['ID'];

			$aemail = $r['user_email'];
		$apassword = $r['user_pass'];
		$aname = $r['user_nicename'];
		$_SESSION['user']=$aname;
			echo $aid;
			echo "fuck";echo $_SESSION['user'];
		}

	}
}
//msg-count............................
$msg_count=0;
	$d1f = mysqli_query($con, "SELECT msg_old,msg_new FROM check_type WHERE user_id=$aid");{
							while($rit = mysqli_fetch_array($d1f)){
								$mold=$rit['msg_old'];
								$mnew=$rit['msg_new'];
								$msg_count=$mnew-$mold;
	}}

//msg-count..........................

//signin...............................................................................................................................

//friend_list...............................................................................................


$p='';

$df = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id=$aid");{
							while($ri = mysqli_fetch_array($df)){
							$tid=$ri['friend_id'];
							$dff = mysqli_query($con, "SELECT user_nicename,activity FROM s_users WHERE ID=$tid");{
										while($r3 = mysqli_fetch_array($dff)){
										$tname=$r3['user_nicename'];
										$aad=$r3['activity'];
										if($tid!=$aid){
												$p.='<p   class="goti" value="'.$tname.'"  style="font-size:12px;color:white;margin:3px;cursor:pointer;"><a id="'.$tid.'" onclick="set_item(\''.str_replace("'", "\'", $tname).'\',\''.str_replace("'", "\'", $tid).'\')" onmouseover="hellog(this);" onmouseleave="mmc(this);" style="padding:5px;" >'.$tname.'</a>';

											if($aad!=0){
												$p.='<img src="pic.jpg" style="margin:2px 0px 0px 4px;height:6px; width:6px;border-radius:50%;"/>';
											}
												$p.='</p><br><ul onmoveover="giveit()" class="profilecard" id="'.$tid.'a" style="display:none;position:absolute;width:200px;list-style:none;margin:0px;padding:0px;"></ul>';

										}
									}
							}}
}
//friendlist...............................................................................................

//feedpost...................................................................................................


$e='';

$df = mysqli_query($con, "SELECT user_nicename,user_pass,user_email,about FROM s_users WHERE ID='$aid'");{
							while($ri = mysqli_fetch_array($df)){
							$aname=$ri['user_nicename'];
							$aemail=$ri['user_email'];
							$aabout=$ri['about'];
							$apass=$ri['user_pass'];
							}

				}
	$dllf = mysqli_query($con, "SELECT address FROM post_add WHERE user_id='$aid'");{
			 while($ri = mysqli_fetch_array($dllf)){
				$aro=$ri['address'];
				$ano=$aid."_".$aro;
				$aro+=1;

			}

	}


	// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$stat=$_POST['status'];
	$target_dir = "status/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

		if($_FILES["fileToUpload"]["name"]){
			echo 1;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }

			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
				if($stat){
					}
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"status/".$ano.".jpg")) {
						$sql = mysqli_query($con,"UPDATE post_add SET address='$aro' WHERE user_id='$aid'");

						$date=date('Y-m-d');
						$add= basename( $_FILES["fileToUpload"]["name"]);
						echo $aid,$date,$stat,$add;
						$sql = mysqli_query($con,"insert into s_status values('','$aid','$date','$stat','$ano','')");
					}
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    }
		}else{
			$date=date('Y-m-d');
			$sql = mysqli_query($con,"insert into s_status values('','$aid','$date','$stat','','','')");
		}

		//header('Location:index.php');

}
//feedpost........................................................................................
//feedview...............................................................................................


//f($con) echo "oh yeah!";
$f='';


		$dffl = mysqli_query($con, "SELECT ID,user_id,status_time,status_content,pic_add FROM s_status ORDER BY ID DESC");{

										while($r3 = mysqli_fetch_array($dffl)){

											$sid=$r3['user_id'];
											$st=$r3['status_time'];
											$sc=$r3['status_content'];
											if($sc)
											$sc = '  "'.$sc.'"';
											$pad=$r3['pic_add'];
											$ssid=$r3['ID'];

											$dff = mysqli_query($con, "SELECT user_id,friend_id FROM s_friends");{

															while($r2 = mysqli_fetch_array($dff)){

														$fiid=$r2['friend_id'];
														$ussd=$r2['user_id'];

													if($fiid==$sid&&$ussd==$aid){

														$dfr = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$sid");{
															while($r2 = mysqli_fetch_array($dfr)){
																$sname=$r2['user_nicename'];
																$f.='<div class="contenet" style=" border-bottom:solid 3px blue;font-size:15px;padding-bottom:5px;margin-bottom:5px;"><h3 style="color:#212F3D;"><u>'.$sname.'</u></h3><br><h12 style="color:#212F3D;font-size:12px;float:left;width:86%;">&nbsp;'.$sc.'</h12><h12 style="font-size:12px;text-align:right;"><b>'.$st.'</b></h12>';
																if (file_exists("status/".$pad.".jpg") ){
																$f.='<p style="border:solid 2px #5D6D7E; border-radius:3%;"><img style="margin:2%;text-align:center;border-radius:3%;width:96%;height:auto;max-height:400px;"src="status/'.$pad.'.JPG"/><br>';}else{$f.='<br>';

																}$f.=
																//'<input type="button" id="'.$ssid.'" class="gotii" value="like" onclick="liking(this);" style="font-size:25px;color:black; padding-left:20px;"/>
																'<br></div>';



													}
												}}}

											}
		}}
//feedview................................................................................................


//profile............................................................
$df = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID='$aid'");{
							while($ri = mysqli_fetch_array($df)){
							$aname=$ri['user_nicename'];

}}
//compose..................................................................................



$e='';

	if(isset($_POST['send'])){

	$tm = $_POST['time'];
	$mes = $_POST['mes'];
	$rcivrid = $_POST['rcivrid'];
	$sub = "a";
	$sql = mysqli_query($con,"insert into s_messages values('','$tm','$aid','$rcivrid','$sub','$mes')");}
	//compose...............................................................................

?>

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hello Buddy</title>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<style>
*{
	margin: 0px;
	width: 100%;
}
html,body{
	width: 100%;
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
.gotii{background-color:green;
	cursor:pointer;
}
.gotii:hover{background-color:white;
	cursor:pointer;
}

#msg_show{background-image:url('msg.jpg');background-size:100% 100%;}

#messagenow2{

	margin-bottom: 50px;

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
::-webkit-scrollbar {
		width: 8px;
		opacity: 0.9;
		background:#d6dbdf;
		height: 100px;
}
::-webkit-scrollbar-thumb {
	width:7px;
	background:  #196f3d;
	border-radius:4%;
}
</style>
<link rel="stylesheet" href="hellostyle.css"/>
<script type="text/javascript" src="testscript.js"></script>
<script type="text/javascript" src="likescript.js"></script>
<script type="text/javascript" src="scriptstay.js"></script>
<script  type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	$(function(){
		$('#messagenow2').hide();
		$('.goti').click(function(){
			$('#messagenow2').show("slide");
		});
		$('#hidemess').click(function(){
			$('#messagenow2').hide("slide");
		});


var auto_refresh = setInterval(
function()
{
$('#msg_show').load('msg_ref.php');
return false;}, 2000);
});
$("document").ready(function(){
	var chhhk=$('#msg_but').val();
	if(chhhk!=0){$("#msg_show").show(00); }
	if(chhhk==0){$("#msg_show").hide(00); }
	var chhk=0;
	$("#mennu").hide(00);
	$("#menuicon").click(function(){
	if(chhk==0) {
		$("#mennu").show(00); chhk=1;}
	else {
		$("#mennu").hide(00); chhk=0;}
			});
});
function mmc(evt) {
	 var keyword=evt.id;
	$('#'+keyword+'a').fadeOut(200);

	}
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

					<img id="ppic"  src="uploads/<?php $ag=0;
			 if (file_exists("uploads/".$aid.".jpg") ){$ag=$aid;}echo $ag;?>.JPG"/><br><h1 align="center" style="color:#D4E6F1;"><?php echo $aname;?></h1>
			 <br><br>

		</div>

		<div class="filling" >
						<form action="index.php" method="post" enctype="multipart/form-data" style="background-color:#808B96;padding:10px;border-radius:3%;">
							<textarea placeholder="Something in Your mind , Share here.......!!!" style="width:95%; height:100px;margin:10px;" name="status"></textarea><br><h6>Attach a photo:
								<input type="file" name="fileToUpload" id="fileToUpload"><input type="submit" value="POST" name="submit" align="center"style="width:40%;margin-left:30%;color:white;"><br><br></h6>
						</form><br><hr><hr><br>
						<?php echo $f;?>
		</div>

		<div class="content">
						<div id="messagenow2">
								<form method="post" align="center" action="index.php" >
									<input name="time" type="hidden" value="<?php echo time(); ?>" />


										<div class="give_container" style="width:100%;">
											<input type="hidden" id="get_id"  value="" name="rcivrid" style="height:30px; width:80%;">
											<input autocomplete="off"  id="friend_list" placeholder="Enter Name" onkeyup="tocomplet()" style="height:20px; width:70%;"/><br>
											<ul id="friend_list_list" style="background-color:grey;width:80%;color:white;" ></ul>


											<textarea style="height:70px; width:70%;" name="mes"></textarea><br>


											<input type="submit" value="send" name="send" style="height:20px; width:70%;"/>
											</form><br>
										</div>
									</div>

									<div style="text-align:center;color:#D4EFDF;font-size:15px;line-height:12px;">
										<h3 id="hidemess" style="cursor:pointer;">Friends</h3><br><hr><br>
										<p style="text-align:center;"><br><?php echo $p;?>

									</div>
								</div>
	</div>
</div>

</body>

</html>
