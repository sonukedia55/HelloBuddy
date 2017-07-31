<?php
 $con = mysqli_connect("localhost","root","","social");
$keyward=$_POST['keyword'];
$df = mysqli_query($con, "SELECT ID,user_email,user_nicename,about FROM s_users WHERE ID='$keyward'");{
		while($ri = mysqli_fetch_array($df)){

			$ag=0;
			 if (file_exists("uploads/".$keyward.".jpg") ){$ag=$keyward;}
			// add new option
			echo '<br>
      <div id="drpl"  style="width:100%;text-align:left;background-color:aliceblue;border-radius:3%;opacity:0.9;border:solid 2px grey;position:absolute;">
      <div style="background-color:aquamarine;width:98%;padding:1%;font-size:10px;border-radius:3% 3% 0 0;">
          <img   src="uploads/'.$ag.'.JPG" style="height:40px;width:40px;border-radius:5%;"/>
        </div>
        <h4 style=" color:darkblue;margin:4px;">'.$ri['user_nicename'].'</b></h4>
        <h6 align="left" style="color:black;margin:4px;">'.$ri['about'].'</h6>
      </div>';}}

?>
