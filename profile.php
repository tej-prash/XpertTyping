<?php
session_start();
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
$user=$_SESSION['login_user'];
$val=mysqli_query($conn,"SELECT * FROM lesson_data WHERE username='$user'");
if(!$val){
	die('Could not obtain data'.mysqli_connect_error());
}
$level=1;
$row=mysqli_fetch_array($val,MYSQLI_NUM);
		$i=1;
		$sum_accuracy=0;
		$sum_speed=0;
		$level=1;
		while(!is_null($row[$i])){
			if($i==7)$level+=1;
			if($i==15)$level+=1;
			$arr=explode(',',$row[$i]);
			$sum_speed+=$arr[0];
			$sum_accuracy+=$arr[1];
			$i++;
		}	
		$i--;
if($i!=0){
$_SESSION['speed']=floor($sum_speed/$i) . " cps";
$_SESSION['accuracy']=floor($sum_accuracy/$i) . "%";
$_SESSION['total_time']=$row[24]." seconds";
$_SESSION['average_time']=floor($row[24]/$row[25]) . " seconds";
}
else{
	$_SESSION['speed']="Start typing for stats!";
	$_SESSION['accuracy']="Start typing for stats!";
	$_SESSION['total_time']="Start typing for stats!";
	$_SESSION['average_time']="Start typing for stats!";
}

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="profile_styles.css">
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
			<a href="logout.php"> Log-out</a> 


	</div>
	<div>
		<center> <h1> Welcome <?php if(!$_SESSION['login_user']){header('Location:login.php');
}else{echo ($_SESSION['login_user']);} ?> </h1> </center>
	</div>
	<div id="statistics">
		<h3> Basic stats: </h3>
		<div class="stats"> Accuracy : <?php echo $_SESSION['accuracy'];?> </div>
		<div class="stats"> Speed: <?php echo $_SESSION['speed'];?> </div>
 		<div class="stats"> Average practice time: <?php echo $_SESSION['average_time'];?> </div>
 		<div class="stats"> Total practice time: <?php echo $_SESSION['total_time'];?> </div>
	</div>	
	<center><div id="profile_picture">
		<img src="" alt="Please upload your profile picture!" width="200"> </img>
	</div>	 </center>
	<!--<div id="profile">
		Upload your profile picture!
		<input type="file" id="myFile"></input>
		<img src="" alt="Profile Picture"></img>
	</div>
	<script>
		var r=window.setInterval(display,1000);
		function display(){
			var source=document.getElementById("myFile").value;
			if(source!=''){
				document.getElementById("profile").getElementsByClassName("img")[0].src=source;
				clearInterval(r);
			}
		}
	</script>-->
<?php 
$val=mysqli_query($conn,"SELECT pic_path from login_members WHERE username='$user'");
$row=mysqli_fetch_array($val,MYSQLI_ASSOC);
if($row['pic_path']){
	$temp2=$row['pic_path']
	?> 
	<script>
	document.getElementById("profile_picture").getElementsByTagName("img")[0].src='<?php echo $temp2; ?>';
	</script>
<?php 
} ?>
</body>
</html>
</br></br>
</body>
</html>