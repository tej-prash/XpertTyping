
<?php
$error=" ";
if(isset($_POST['submit'])){
	if(empty($_POST['username'])||empty($_POST['password'])){
		$error="Username or password invalid";
	}
	else{
$servername="localhost";
$username="root";
$password="";
$flag_user_exists=0;
$flag_username_exists=0;
//Start a connection
$user=$_POST["username"];
$pass=$_POST["password"];
$conn=mysqli_connect($servername,$username,$password,"touch");

if($conn->connect_error){
	echo "Connection failed";
} 
else{
$sql='SELECT username,password FROM login_members';
$val=mysqli_query($conn,$sql);
if(!$val){
	die('Could not obtain data'.mysqli_connect_error());
}
while($row=mysqli_fetch_array($val,MYSQLI_ASSOC)){
	if(($user==$row['username'])){
		$flag_username_exists=1;
		if(($pass==$row['password'])){
		$flag_user_exists=1;
		break;
		}
	}
}
if($flag_user_exists==1){
	$_SESSION['login_user']=$user; 
//echoari "connection sucessfull";
$temp1=$_SESSION['login_user'];
$val1=mysqli_query($conn,"SELECT num_sessions FROM lesson_data WHERE username='$temp1'"); 
$row=mysqli_fetch_array($val1,MYSQLI_ASSOC);
$new_session=$row['num_sessions']+1;
$val2=mysqli_query($conn,"UPDATE lesson_data SET num_sessions='$new_session' WHERE username='$temp1'"); 
//mysqli_close($conn); //Initialising session
$val1=mysqli_query($conn,"UPDATE lesson_data SET user_yes=1 WHERE username='$temp1'");
}
else{
	//if($flag_username_exists==1){
		$error="Incorrect Password. Please try again!";
	//}
	/*else{
		$error="PLEASE SIGN UP";
	}*/
}
}
}
mysqli_close($conn);
}
?>
