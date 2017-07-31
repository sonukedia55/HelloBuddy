<?php
include "session.php";
$q='';
$ghg='';
$select=100;
	if(isset($_SESSION['user'])){
	$aid=$_SESSION['user'];
	$med=$_SESSION['messs'];
	
}
	
		if($select==100){
			$ghg='';
			$dfrf = mysqli_query($con, "SELECT user_id FROM check_type WHERE typing_to=$aid ");{
					while($r44 = mysqli_fetch_array($dfrf)){
											$se=$r44['user_id'];
											if($se==$med) $ghg=1;else $ghg=0;
											}
					}
					if($ghg==1)$q.='<a style="background-color:green;color:white;">typing....</a>';
			
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

