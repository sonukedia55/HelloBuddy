<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hello-buddy</title>
<style>
.input_container {
	height: 30px;
	float: left;
}
.input_container input {
	height: 20px;
	width: 200px;
	padding: 3px;
	border: 1px solid #cccccc;
	border-radius: 0;
}
.input_container ul {
	padding:0px 0px;
	border: 1px solid #eaeaea;
	position: absolute;
	z-index: 9;
	background: grey;
	list-style: none;
	margin-left:23px;
	margin-top:-5px;
}
.input_container ul li {
	padding: 2px;
	color:black;
}
.input_container ul li:hover {
	background: #eaeaea;
}
#friend_list_id {
	display: none;
}</style>
<script type="text/javascript" src="testscript.js"></script>
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div class="input_container">
										<input type="hidden" id="get_id"  value="" name="rcivrid" style="height:30px; width:230px;">
										<textarea  id="friend_id" placeholder="Enter Name" onkeyup="autocomplet()" style="height:30px; width:230px;"></textarea><br>
										<ul id="friend_list_id" ></ul>
									
</div></body>
</html>

