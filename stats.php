<?php
session_start();
?>
<html>
<head>
	<style>
		body{
			background:url("Rose Water.jpg");
			background-size:cover;
			background-repeat: no-repeat;
		}
		img{
			margin:50px;
		}

div.topnav{
	background-color:#0a566d;
	background-size:cover;
	overflow:hidden;
}
.topnav a{
	/*display:inline-block;*/
	float:left;
	/*position:relative;*/
	color:rgb(255,255,255);
	text-align: center;
	text-decoration:none;
	font-size:30px;
	margin:10px 60px 10px;
}
.topnav a:hover {
	/*background-color:rgb(65, 202, 244);*/
	color:#d0d6d8;
}
.dropdown .dropdown_button{
	/*float:left;
	color:rgb(255,255,255);
	text-align: center;
	text-decoration:none;
	font-size:30px;
	background-color:inherit;
	border:none;
	outline:none;
	margin:10px 100px 10px;*/
	background-color: #0a566d;
    color: white;
    padding: 16px;
    font-size: 25px;
    border: none;
    cursor: pointer;
}
.dropdown{
	float:left;
	background-color:#A9A9A9;
	/*overflow:hidden;*/
	display:inline-block;
	position:relative;
}
.dropdown_content{
	background-color:#A9A9A9;
	display:none;
	position:fixed;
	z-index: 2;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown_content a{
	/*float:none;*/
	color:white;
	padding:2px;
	display:block;
	text-align:left;
	text-decoration: none;
	/*padding:10px 16px;*/
}
.dropdown:hover .dropdown_content{
	display:block;
}
	</style>
</head>
<body>
<!--<iframe width="500" height="400" frameborder="0" scrolling="no" src="//plot.ly/~tej_prash/4.embed"></iframe>
<iframe width="500" height="400" frameborder="0" scrolling="no" src="//plot.ly/~tej_prash/6.embed"></iframe>-->
<div class="topnav">
			<a href="lesson_plan.php" target="_self"> Learn </a>
			<a href="stats.php"> Stats </a> 
			<div class="dropdown">
				<button class="dropdown_button">Account Settings </button>
				<div class="dropdown_content">
					<a href="user.php">Change username </a></br>
					<a href="pass.php">Change password </a></br>
					<a href="profile_change.php">Change profile picture </a>
				</div> 
			</div>	
			<a href="profile.php">Back to Profile </a>
			<a href="logout.php"> Log-out</a> 


	</div>
<img src="Plots/accuracy_compare.jpg" width="500"> </img>
<img src="Plots/speed_compare.jpg" width="500"> </img>
<img src="Plots/time_compare.jpg" width="500"> </img>
<img src="Plots/speed_accur_compare.jpg" width="500"> </img>


</body>
</html>