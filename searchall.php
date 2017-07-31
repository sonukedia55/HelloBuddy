
<?php
// PDO connect *********
include "session.php";
$con = mysqli_connect("localhost","root","","social");
if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	}
function connect() {
    return new PDO('mysql:host=localhost;dbname=social', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
 $con = mysqli_connect("localhost","root","","social");
$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT ID,user_nicename FROM s_users WHERE user_nicename LIKE (:keyword) ORDER BY ID ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {

	$ab=0;
			$no=$rs['ID'];
			$dll = $rs['user_nicename'];
			$ag=0;
			$gh='<table style="width:100%;text-align:center;font-size:10px; background-color:#ccd1d1;color:#34495e;" cellspacing="0">
	';
			 if (file_exists("uploads/".$no.".jpg") ){$ag=$no;}
			if($no!=$aid){
			 $gh .= '<tr><td><hr><img style="width:30px; height:30px;" src="uploads/'.$ag.'.JPG"/></td><td><hr>'.$dll.'<br>';}

			$def = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id='$aid' AND friend_id='$no'");
				{

				while($rp = mysqli_fetch_array($def)){
					$ab=1;
				}}
				if($no!=$aid){
				if($ab==0){
				$gh.='<form  action="directory2.php" method="post"><input type="hidden" style="opacity:0; width:20px; " value="'.$no.'" name="add" /><input type="submit" id="add"  value="Follow" style="width:120px;height:20px;"  name="addy"/></form></td></tr></table>';}
				if($ab==1) {$gh.='<form  action="directory2.php" method="post"><input type="hidden" style="width:120px;opacity:0; width:20px;" value="'.$no.'" name="add" /><input id="rem" type="submit"  style="width:120px;height:20px;"  value="Unfollow" name="remy"/></form></td></tr></table>';

				}}
	echo $gh;


}
?>
