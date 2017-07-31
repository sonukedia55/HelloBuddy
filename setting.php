<?php
include "session.php";
	$con = mysqli_connect("localhost","root","","social");
	if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	$e='';
	$g='';

$df = mysqli_query($con, "SELECT user_nicename,user_pass,user_email,about FROM s_users WHERE ID='$aid'");{
							while($ri = mysqli_fetch_array($df)){
							$aname=$ri['user_nicename'];
							$aemail=$ri['user_email'];
							$aabout=$ri['about'];
							$apass=$ri['user_pass'];
							}

	}}


$e='';

	if(isset($_POST['up'])){
	$veri = $_POST['veri'];
	$nam1 = $_POST['name1'];
	$pass1 = $_POST['pass1'];
		$email1 = $_POST['email1'];
	$about1 = $_POST['about1'];

	if($veri==$apass){
		if($pass1=='')$pass1=$veri;
	$sql = mysqli_query($con,"UPDATE s_users SET user_email='$email1',user_pass='$pass1',user_nicename='$nam1',about='$about1' WHERE ID='$aid'");header('Location: setting.php');}else $g="Wrong password!!!";
	}
	// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"uploads/".$aid.'.'.$imageFileType)) {
		if (file_exists($aid.".jpg")) {unlink($aid.".jpg");}
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";


if (file_exists("uploads/".$aid.".jpg")) { list($width_orig,$height_orig)=getimagesize("uploads/".$aid.".jpg");
				echo $width_orig,$height_orig;
		$dst_width=110;
		$dst_height=($dst_width/$width_orig)*$height_orig;
		$im=imagecreatetruecolor($dst_width,$dst_height);$image=imagecreatefromjpeg("uploads/".$aid.".jpg");
		imagecopyresampled($im,$image,0,0,0,0,$dst_width,$dst_height,$width_orig,$height_orig);
		imagejpeg($im,$target_dir."".$aid.'.jpg');}
if (file_exists("uploads/".$aid.".png")) { list($width_orig,$height_orig)=getimagesize("uploads/".$aid.".png");
				echo $width_orig,$height_orig;
		$dst_width=110;
		$dst_height=($dst_width/$width_orig)*$height_orig;
		$im=imagecreatetruecolor($dst_width,$dst_height);$image=imagecreatefrompng("uploads/".$aid.".png");
		imagecopyresampled($im,$image,0,0,0,0,$dst_width,$dst_height,$width_orig,$height_orig);
		imagepng($im,$target_dir."".$aid.'.png');}

imagedestroy($im);
header('Location: setting.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
}}

}

?>

<!doctype html>
<html>
<head>
<title>hello-buddy</title>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
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
<style>
*{
	margin: 0px;
	width: 100%;
}
td{
	color: #117A65;
	font-size: 12px;
	font-family: cursive;
}
input[type="text"],input[type="password"],textarea{
	border:solid 1px #95A5A6;
	border-radius: 5%;
	color: #3498DB;
	text-align: center;
	font-size: 13px;

}
input[type="text"]:hover,input[type="password"]:hover,textarea:hover{
	border:solid 1px #616A6B;
}
textarea:focus,input:focus{
	border:solid 1px green;
	background-color: #D7DBDD;
	color: #5D6D7E;
}
.left3 input[type="submit"]:hover{

	background-color: #52BE80;
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

<link rel="stylesheet" href="hellostyle.css" />

</head>
<body bgcolor="#34495E" id="container">
		<div id="msg_show"  style="position:fixed;height:30px;width:30px;border:solid 2px white;display:none;z-index:6;text-align:center;margin-top:100px;margin-left:93%;font-size:20px;"><?php echo '<a style="color:white;text-decoration:none" href="messages-inbox2.php">'.$msg_count.'</a><input type="hidden" value="'.$msg_count.'" id="msg_but" />';?></div>
		<div id="mennu" style="position:absolute;margin-top:50px;width:50%;display:none;">
			<ul >
				<li><a href="messages-inbox2.php" style="color:white;text-decoration:none;border:none;">Messages</a></li>
				<li ><a href="directory2.php" style="color:white;text-decoration:none;">Directory</a></li>
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
				<a href="directory2.php">Directory</a>

			</div>


				<form method="post" align="right" action="login2.php" style="position:fixed;z-index:40;"><input type="submit"  id="logoutbu" name="Logout" value="Logout"/></form>


	<div class="total" style="float:left; width:100%;">

		<div class="left1">

					<img id="ppic"  src="uploads/<?php $ag=0;
			 if (file_exists("uploads/".$aid.".jpg") ){$ag=$aid;}echo $ag;?>.JPG"/><br><h1 align="center" style="color:#D4E6F1;"><?php echo $aname;?></h1>
			 <br><br>

		</div>

		<div class="filling" >
			<form action="setting.php" method="post" enctype="multipart/form-data" align="center">
			<?php if($g){echo '<script>alert("'.$g.'");</script>';}?>
			<h5 align="center" >Change Photo</h5><br>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input align="center" type="submit" value="Upload Image" name="submit" style="height:40px; width:100px;">
		</form><br><hr color="#707B7C"/><br>
		<div class="left3" style="width:100%; float:left;padding-left:1%;font-size:25px;">

				<form align="center" style="text-align:center;"action="setting.php" method="post">

										<table align="center" style="text-align:center;">
												<tr><td>Name:<td><input type="text" style="height:30px; width:150px;" name="name1" value="<?php echo $aname;?>"/></tr>
												<tr><td>Password:<td><input type="password" style="height:30px; width:150px;" name="pass1" placeholder="Enter New password"/></tr>
												<tr><td>Username:<td><input type="text" style="height:30px; width:150x;" name="email1" value="<?php echo $aemail;?>"/></tr>
												<tr><td>About:<td><textarea style="height:60px; width:150px;" name="about1" ><?php echo $aabout;?></textarea></tr><tr><td><br><td><br></tr>
											  <tr><td><input type="password" style="height:30px; width:150px;" placeholder="Enter current Password" name="veri" style="" required/><td>

												<input type="submit" style="height:40px; width:100px;" name="up"value="Update"/></tr>

										</table>
										</form></div>
		</div>


	</div>


</body>

</html>
