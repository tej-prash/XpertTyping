<?php
$error=" ";
if(isset($_POST['submit'])){
	if(empty($_POST['username'])||empty($_POST['password'])){
		alert("Invalid username or password");
		header("Location:sign_up_home.php");
	}
	else{
//session_start();
//if(isset($_SESSION['login_user']))header("Location:profile.php");
if(!isset($_SESSION['login_user'])){
$servername="localhost";
$username="root";
$password="";
$flag_user_exists=0;
$flag_username_exists=0;
//Start a connection
$user=$_POST["username"];
$pass=$_POST["password"];
$email=$_POST["email"];
$fullname=$_POST["full_name"];
$conn=mysqli_connect($servername,$username,$password,"touch");

if($conn->connect_error){
	echo "Connection failed";
} 
else{
$sql='SELECT username,password FROM login_members';
$val=mysqli_query($conn,$sql);
if(!$val){
	die('Could not obtain data1'.mysqli_connect_error());
}
while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
	if(($user==$row['username'])){
		$flag_username_exists=1;
		break;
	}
}
if($flag_username_exists==1){
	$error="Username already exists";
}
else{
	$id=mysqli_num_rows($val)+1;
	//echo "$user  $pass";
	//print_r($user);
	//$sql="INSERT INTO login_members VALUES(2,$user,$pass,'hi')";
	$val=mysqli_query($conn,"INSERT INTO login_members(ID,username,password,email,name) VALUES('$id','$user','$pass','$email','$fullname')");
	if(!$val){
		die('Could not obtain data'.mysqli_error($conn));
	}
	$val=mysqli_query($conn,"INSERT INTO lesson_data(username) VALUES('$user')");
	if(!$val){
		die('Could not obtain data'.mysqli_error($conn));
	}
//echoari "connection sucessfull";
	$temp1=$_SESSION['login_user'];
	$val1=mysqli_query($conn,"SELECT num_sessions FROM lesson_data WHERE username='$temp1'"); 
	$row=mysqli_fetch_array($val1,MYSQLI_ASSOC);
	$new_session=$row['num_sessions']+1;
	$val2=mysqli_query($conn,"UPDATE lesson_data SET num_sessions='$new_session' WHERE username='$temp1'"); 
	$_SESSION['login_user']=$user;
	header("Location:profile.php");
}

}
}
}
mysqli_close($conn);
}
?>
