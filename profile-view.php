<?php
$con = mysqli_connect("localhost","root","","social");

$e='';
$ddf = mysqli_query($con, "SELECT user_id FROM active ");
		{
				//if($ddf) echo "yes"; else echo "no";
				while($r = mysqli_fetch_array($ddf)){
				$aid=$r['user_id'];}
				echo $aid;
		}
$df = mysqli_query($con, "SELECT user_nicename,user_email,about FROM s_users WHERE ID='$aid'");{
							while($ri = mysqli_fetch_array($df)){
							$aname=$ri['user_nicename'];
							$aemail=$ri['user_email'];
							$aabout=$ri['about'];
							}
						
				}
	$dif = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id='$aid'");{
							while($ri = mysqli_fetch_array($dif)){
							$fiid=$ri['friend_id'];
							$df = mysqli_query($con, "SELECT user_nicename,user_email,about FROM s_users WHERE ID='$fiid'");{
							while($ri1 = mysqli_fetch_array($df)){
							$fname=$ri1['user_nicename'];
							$femail=$ri1['user_email'];
							$fabout=$ri1['about'];
							$temp=0;
							if (file_exists("uploads/".$fiid.".jpg") ){
							$temp=$fiid;}
							 else {};
							$e.='<div class="content" style=""><div class="content" style="margin-up:10px; padding:20px; background-color:orange;float:left;width:45%;text-align:center;"><img style="width:180px; height:180px;" src="uploads/'.$temp.'.jpg"/></div>
							<div class="content" style="padding:20px;float:left;width:45%; background-color:orange;min-height:150px;"><h2>Name: '.$fname.'<br/>Email: '.$femail.'<br/> About: '.$fabout.'</h2></div><div style="clear:both"></div>';
							
							}
						
				}
							}
						
				}		
?>

<!doctype html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="css/style.css"/>
<style>li{font-size:22px; border:solid 2px black;padding:9px; float:left; decoration:none; color:white; background-color:blue;}
	a{color:white;}</style>	</head>
	<body>
		<div id="navigation"> 
		<ul>
					<li><a href="signin.php">Logout</a></li>
					<li><a href="profile-view.php">View profile</a></li>
					<li><a href="profile-edit.php">edit profile</a></li>
					<li><a href="directory.php">Member Directory</a></li>
					<li><a href="friends-list.php">Friends List</a></li>
					<li><a href="feed-view.php">View feed</a></li>
					<li><a href="feed-post.php">post status</a></li>
					<li><a href="messages-inbox.php">Inbox</a></li>
					<li><a href="messages_compose.php">compose</a></li>
					<li><a href="login.php">Sign-up</a></li>
				</ul>
		</div><br></br><div style="clear:both"></div>
		<h1 align="center">Profile</h1>
				<div class="content" style=""><div class="content" style=" padding:20px; background-color:orange;float:left;width:45%;text-align:center;">
				<?php if (file_exists("uploads/".$aid.".jpg") ){
				$temp2=$aid;}
							 else {$temp2=0;};
							 
							 echo '<img style="width:230px; height:230px;" src="uploads/'.$temp2.'.jpg"/>';?></div>
				<div class="content" style="padding:20px;float:left;width:45%; background-color:orange;min-height:230px;"><h2>Name: <?php echo $aname;?><br><br/>Email:<?php echo $aemail;?><br><br/>About:<?php echo $aabout;?></h2></div>

	</div>		<div style="clear:both"></div><hr><hr><h3 align="center">......YOur Friends......</h3><br>
			<?php echo $e;?>
</body>
</html>
						