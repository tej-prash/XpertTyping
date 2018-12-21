<?php 
session_start();
if(isset($_POST['submit'])){
	$servername="localhost";
	$username="root";
	$password="";
	//Start a connection
	$conn=mysqli_connect($servername,$username,$password,"touch");
	if($conn->connect_error){
		echo "Connection failed";
	} 
	else{
	//$path=$_POST['pro_picture'];
	$temp1=$_SESSION['login_user'];	
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
		$final_file=str_replace(' ','_',$new_file_name);


		if(move_uploaded_file($target_file_loc,$target_file)) //PHP built function move_uploaded_file
		{
		        
		        if(mysqli_query($conn,"UPDATE login_members SET pic_path='$final_file' WHERE username='$temp1'")){
		        	header("Location:profile.php");
		        }
		        //or die(mysqli_error($connection));
		}
	}

}
?>
<html>
<head>
	<style>
	body{
		background:url("Mystic.jpg");
		background-size:cover;
		background-repeat: no-repeat;
	}
	#sub{
		text-decoration: none;
		outline:none;
		border:2px solid #f49292;
		background:#f46969;
		border-radius:18px;
		margin:20px;
		width:200px;
		height:40px;
	}
	#pic_id{
		text-decoration: none;
		outline:none;
		border:2px solid #f49292;
		background:#f46969;
		border-radius:18px;
		margin:20px;
		width:200px;
		height:40px;
	}
	</style>
</head>
<body>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

  <script type="text/javascript">
  $(function(){
			$('#pic_id').change( function(event) {
				var tmppath = URL.createObjectURL(event.target.files[0]);
				$("img").fadeIn("fast").attr('src',tmppath);
  				document.getElementsByName("pro_picture")[0].value=tmppath;
				alert(document.getElementsByName("pro_picture")[0].value);
			});
  });
  </script>   
  <form action=""  method="POST" enctype="multipart/form-data"> 
	<input type="file" name="pic" id="pic_id"><br><br>
	<img src="" value="" width="200"  id="image" style="display:none;" />
	<input type="submit" id="sub"name="submit" value="Submit">
	</form>
</body>
</html>	