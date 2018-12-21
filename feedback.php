



<?php 
	$flag=0;
    if(isset($_POST['submit'])) { //to check if the form was submitted
        $fb= $_POST['feedback'];
     
    $file=fopen("feedback.txt","a");
	$fb=$fb."<br>";
    fwrite($file,$fb);
    fclose($file);
	$flag=1;
	}
?>


<?php
if($flag){
echo"<h1>Previous Feedbacks</h1>";
$file=file_get_contents("feedback.txt");
/*cho fread($file,filesize("one.txt"));*/
/*for($i=0;$i<sizeof($file);$i++)
{
	echo $file[$i];
}*/
echo "<p style=\"color:white\">$file</p>";
$flag=0;
}
//fclose($file);
?>




<html>
<head>
<style>
body{background-image:url("Frozen.jpg");}
h1{color:#E9E9E9;}
</style>
<h1>Feedback Form</h1>
<form action="" method="post">
     <textarea name="feedback" rows="5" cols="50"></textarea>
     <input type="submit" name="submit" value="Submit" />
</form>
</head>
</html>