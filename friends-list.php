<?php
	$con = mysqli_connect("localhost","root","","social");
//f($con) echo "oh yeah!";
$p='';
$ddf = mysqli_query($con, "SELECT user_id FROM active ");
		{
				//if($ddf) echo "yes"; else echo "no";
				while($r = mysqli_fetch_array($ddf)){
				$aid=$r['user_id'];}
				echo $aid;
		}
$df = mysqli_query($con, "SELECT friend_id FROM s_friends WHERE user_id=$aid");{
							while($ri = mysqli_fetch_array($df)){
							$tid=$ri['friend_id'];
							$dff = mysqli_query($con, "SELECT user_nicename FROM s_users WHERE ID=$tid");{
										while($r3 = mysqli_fetch_array($dff)){
										$tname=$r3['user_nicename'];
										$p.=$tname.'<br>';}
							
							}}
}
?>
<!doctype html>
<html>
	<head>
		<title>Friends List</title>
		<link rel="stylesheet" href="style.css" />
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
					<li><a href="login.php">sign-up</a></li>
				</ul>
		</div><br><div style="clear:both"></div>
		<h1 align="center">Friends List</h1>
		<div class="content" style="text-align:center; font-size:30px; background-color:orange;"> 
			<?php echo $p;?>
		</div>
	</body>
</html>