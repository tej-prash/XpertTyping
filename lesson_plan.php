<?php
session_start(); ?>
<html>
<head>
<style>
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
		body{
			background-color:#c0cfe8;
			background-size: cover;
			background-repeat: no-repeat;
		}
		#beg{
			position:relative;
			text-decoration: none;
			outline:none;
			border:10px solid #efcb99;
			background:#a3f98e;
			margin:40px;
			width:90%;
			height:200px;
			padding:10px;
		}
		#med{
			position:relative;
			text-decoration: none;
			outline:none;
			color:white;
			border:10px solid gray;
			background:#2D4262;
			margin:40px;
			width:90%;
			height:200px;
			padding:10px;
		}
		#med span{
			font-size: 20px;
			font-family:georgia;
		}
		#med div{
			margin:10px;
		}
		#adv{
			position:relative;
			text-decoration: none;
			outline:none;
			border:10px solid gray;
			background:#2D4262;
			color:white;
			margin:40px;
			width:90%;
			height:200px;
			padding:10px;
		}
		#adv span{
			font-size: 20px;
			font-family:georgia;
		}
		#adv div{
			margin:10px;
		}
		#beg span{
			font-size: 20px;
			font-family:georgia;
		}
		#beg div{
			margin:10px;
		}
		.goto{
			text-decoration: none;
			color:white;
			position:absolute;
			bottom:2px;
			right:2px;
			font-size:50px;
		}
	</style>
</head>
<body>
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
	<center>
	<div id="beg">
		<span> BEGINNER <span> <br>
		<div> Progress: </div>
		<div> Speed: </div>
		<div> Accuracy: </div>
		<a class="goto" href="lesson1.php"> -> </a>
	</div>
	<div id="med">
		<span> INTERMEDIATE <span> <br>
		<div> Progress: </div>
		<div> Speed: </div>
		<div> Accuracy: </div>
		<a class="goto" href="lesson7.php"> -> </a>
	</div>
	<div id="adv">
		<span> ADVANCED <span> <br>
		<div> Progress </div>
		<div> Speed </div>
		<div> Accuracy </div>
		<a class="goto" href="lesson15.php"> -></a>
	</div>
	</center>
<?php 
$servername="localhost";
$username="root";
$password="";
$flag_user_exists=0;
$flag_username_exists=0;
//Start a connection
$conn=mysqli_connect($servername,$username,$password,"touch");

if($conn->connect_error){
	echo "Connection failed";
} 
else{
$sql='SELECT * FROM lesson_data';
$val=mysqli_query($conn,$sql);
if(!$val){
	die('Could not obtain data'.mysqli_connect_error());
}
$level=1;
while($row=mysqli_fetch_array($val,MYSQLI_NUM)){
	if($row[0]==$_SESSION['login_user']){
		$i=1;
		$sum_accuracy=0;
		$sum_speed=0;
		$beg_accuracy=0;
		$beg_speed=0;
		$med_accuracy=0;
		$med_speed=0;
		$level=1;
		while(!is_null($row[$i])){
			if($i==7){$level+=1;$beg_accuracy=$sum_accuracy;$beg_speed=$sum_speed;$sum_speed=0;$sum_accuracy=0;}
			if($i==15){$sum_speed=0;$med_accuracy=$sum_accuracy;$med_speed=$sum_speed;$level+=1;$sum_accuracy=0;}
			$arr=explode(',',$row[$i]);
			$sum_speed+=$arr[0];
			$sum_accuracy+=$arr[1];
			$i++;
		}	
		$i--;
		break;
	}	
}
switch($level){ 
	case 1:
	?> 
	<script> 
	document.getElementById("beg").getElementsByTagName("div")[0].innerHTML="Progress: "+ <?php echo floor(($i/6)*100);?> +"%";
	document.getElementById("beg").getElementsByTagName("div")[1].innerHTML="Speed: " +<?php echo floor($sum_speed/$i);?> +"cps";
	document.getElementById("beg").getElementsByTagName("div")[2].innerHTML="Accuracy: " +<?php echo floor($sum_accuracy/$i);?> +"%";
	document.getElementById("beg").getElementsByClassName("goto")[0].href="lesson"+ <?php echo $i+1 ?> +".php";
	</script>
	<?php break;
	case 2:
	?> 
	<script> 
	document.getElementById("med").getElementsByTagName("div")[0].innerHTML="Progress: "+ <?php echo floor((($i-6)/7)*100);?> + "%";
	document.getElementById("med").getElementsByTagName("div")[1].innerHTML="Speed: "+ <?php echo floor(($sum_speed/($i-6)));?> +"cps";
	document.getElementById("med").getElementsByTagName("div")[2].innerHTML= "Accuracy: "+ <?php echo floor(($sum_accuracy/($i-6)));?> +"%";
	document.getElementById("beg").getElementsByTagName("div")[0].innerHTML= "Progress: "+<?php echo "100";?> + "%";
	document.getElementById("beg").getElementsByTagName("div")[1].innerHTML= "Speed: "+ <?php echo floor(($beg_speed/7));?> + "cps";
	document.getElementById("beg").getElementsByTagName("div")[2].innerHTML= "Accuracy: "+ <?php echo floor(($beg_accuracy/7));?> + "%";
	document.getElementById("beg").getElementsByClassName("goto")[0].href="lesson6.php";
	//document.getElementById("med").getElementsByClassName("goto")[0].href="lesson"+ <?php echo $i+1 ?> +".php";
	</script> 

	<?php break;
	case 3:
	?> 
	<script> 

	document.getElementById("adv").getElementsByTagName("div")[0].innerHTML="Progress: "+ <?php echo floor((($i-14)/7)*100);?> + "%";
	document.getElementById("adv").getElementsByTagName("div")[1].innerHTML="Speed: "+ <?php echo floor(($sum_speed/($i-14)));?> +"cps";
	document.getElementById("adv").getElementsByTagName("div")[2].innerHTML= "Accuracy: "+ <?php echo floor(($sum_accuracy/($i-14)));?> +"%";
	document.getElementById("med").getElementsByTagName("div")[0].innerHTML= "Progress: "+<?php echo "100";?> +"%";
	document.getElementById("med").getElementsByTagName("div")[1].innerHTML= "Speed: "+ <?php echo floor(($med_speed/7));?> + "cps";
	document.getElementById("med").getElementsByTagName("div")[2].innerHTML= "Accuracy: "+ <?php echo floor(($med_accuracy/7));?> + "%";
	document.getElementById("beg").getElementsByTagName("div")[0].innerHTML= "Progress: "+<?php echo "100";?> +"%";
	document.getElementById("beg").getElementsByTagName("div")[1].innerHTML= "Speed: "+ <?php echo floor(($beg_speed/7));?> + "cps";
	document.getElementById("beg").getElementsByTagName("div")[2].innerHTML= "Accuracy: "+ <?php echo floor(($beg_accuracy/7));?> + "%";
	//document.getElementById("adv").getElementsByClassName("goto")[0].href="lesson"+ <?php echo $i+1 ?>+".php";*/
	</script> 

	<?php break;
} 
} ?>
</body>
</html>