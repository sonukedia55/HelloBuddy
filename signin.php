<?php
$aname='';
$con = mysqli_connect("localhost","root","","social");
if(isset($_POST['go'])){
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$ddf = mysqli_query($con, "SELECT  ID,user_email,user_pass,user_nicename FROM s_users  WHERE user_email='$email' ");
		{
		//if($ddf) echo "yes"; else echo "no";
		while($r = mysqli_fetch_array($ddf)){
			$aid=$r['ID'];
			$aemail = $r['user_email'];
		$apassword = $r['user_pass'];
		$aname = $r['user_nicename'];
		$sql = mysqli_query($con,"delete from active");
		$sql = mysqli_query($con,"insert into active values('$aid')");
		}
		
	}
}
?>
<!doctype html><html>
<head><title>sign-in</title><link href="style.css"  rel="stylesheet"/><style>li{font-size:22px; border:solid 2px black;padding:9px; float:left; decoration:none; color:white; background-color:blue;}
	a{color:white;}</style></head>
<body>
<h2>Already have an account??</h2>
<br>

<div id="navigation">
				<ul>
					<li><a href="signin.php">Home</a></li>
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
			</div><br></br><div style="clear:both"></div>
<h2 align="center">Login</h2> <h3 align="center"><?php echo "Hello...,";echo $aname; ?></h3>
<br><hr>
<div class="left1" style="padding-left:400px;  padding-top:40px;width:99.7%; background-color:orange; min-height:420px;">
	<form  style="border:solid black 1px;"align="center" action="hello.php" method="post"></br>
								<input type="text" style="height:30px; width:230px;" name="email" placeholder="email"/>&nbsp;&nbsp;<br></br>
								<input type="text" style="height:30px; width:230px;" name="pass" placeholder="password"/>
								</br>	<hr>
								</br>
							
								<input type="submit" style="height:40px; width:100px;" name="go"value="login"/>
								
								
								</form></div></body></html>