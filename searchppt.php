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

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT ID,user_nicename FROM s_users WHERE user_nicename LIKE (:keyword) ORDER BY ID ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();


				$count=0;			


foreach ($list as $rs) {
	$tid=$rs['ID'];
	$df = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id='$aid' and friend_id='$tid'");{
		while($ri = mysqli_fetch_array($df)){
			$tid=$ri['friend_id'];
			
	// put in bold the written text
				$user_nicename = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['user_nicename']);
				// add new option
					echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['user_nicename']).'\',\''.str_replace("'", "\'", $rs['ID']).'\')">'.$user_nicename.'<br><hr style="width:220px;"></li><br>';$count+=1;}
					}
}
?>