<?php 
$target_dir = "ProfilePhotos/";
$target_file = $target_dir.rand(1000,100000).basename($_FILES["pic"]["name"]); //Filename
$target_file_loc=$_FILES["pic"]["tmp_name"]; //File location
$target_file_size = $_FILES["pic"]["size"];
$target_file_type = $_FILES["pic"]["type"];
/*echo "<br/>". "base name ".basename($_FILES["pic"]["name"]);
echo "<br/>"."size ".$target_file_size;
echo "<br/>"."loc ".$target_file_loc;
echo "<br/>"."type ".$target_file_type;
echo "<br/>"."file ".$target_file;
*/
// new file size in KB
//$new_size = $target_file_size/1024;
$new_size = $target_file_size;

// make file name in lower case
$new_file_name = $target_file;

// make file name by replacing blank with -
$final_file=str_replace(' ','-',$new_file_name);


if(move_uploaded_file($target_file_loc,$target_file)) //PHP built function move_uploaded_file
{
        mysqli_query($connection,"INSERT INTO `basicstuddetails`(`USN` , `branch`, `section`, `sem`, `bio`,`file`,`type`,`size`)
        VALUES ('$usn','$branch', '$section','$sem','$bio','$final_file','$target_file_type','$new_size')")
        or die(mysqli_error($connection));
}

?>
<script>alert('Student Record Inserted Sucessfully');
window.location.href ="profile_page.php";
</script>
</html>
?>