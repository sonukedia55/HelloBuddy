<?php
 $con = mysqli_connect("localhost","root","","social");
$keyword = '%'.$_POST['keyword'].'%';
$keyward=$_POST['keyword'];
$df = mysqli_query($con, "SELECT ID,user_email FROM s_users WHERE user_email='$keyward'");{
		while($ri = mysqli_fetch_array($df)){

			$p1="already exits";
			// add new option
			echo '<a style="text-decoration:none;list-style:none;decoration:none;margin:0px;padding:none;color:red;padding:5px;">!!!!......'.$p1.'........!!!!</a>';}}	

?>
