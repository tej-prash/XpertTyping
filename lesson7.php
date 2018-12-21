<?php 
session_start();
?>
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
</style>

<link rel="stylesheet" type="text/css" href="lesson_color.css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>-->
	<script src="jquery-3.2.1.min.js">
	</script>
	
<script>
function keyboard()
{

var k=event.which||event.keyCode;
//alert(k);
var key=String.fromCharCode(k);
var key=key.toUpperCase();
var getKey=document.getElementById('a'+key);
getKey.style.color="red";
getKey.className="pop";
setTimeout(function(){getKey.style.color="white";getKey.className="unpop";},100);
//alert(key);
}

</script>
	<script>
	$(document).ready(function(){
		var result="";
		function next(){
				window.location.href="lesson7.php?next="+result;
				<?php
				if(isset($_GET['next'])){
					$servername="localhost";
					$username="root";
					$password="";
					//Start a connection
					$conn=mysqli_connect($servername,$username,$password,"touch");
					if($conn->connect_error){
						echo "Connection failed";
					} 
					else{
						//echoari "connection sucessfull";
						$temp1=$_SESSION['login_user'];
						$temp2=explode(";",$_GET['next'])[0];
						$temp3=explode(";",$_GET['next'])[1];
						$temp2=$temp2.",".$temp3;
						$val=mysqli_query($conn,"UPDATE lesson_data SET lesson7='$temp2' WHERE username='$temp1'");
						$val2=mysqli_query($conn,"SELECT total_time FROM lesson_data WHERE username='$temp1'");
						$row=mysqli_fetch_array($val2,MYSQLI_ASSOC);
						$new_time=$temp3+$row['total_time'];
						$val3=mysqli_query($conn,"UPDATE lesson_data SET total_time='$new_time' WHERE username='$temp1'");
						if(!$val){
							//die('Could not obtain data'.mysqli_connect_error());
							//header("Location:lesson3.php");

						}
						else{
							header("Location:lesson8.php");
							mysqli_close($conn);
							//unset($_COOKIE['myVar']);
						}
					}
				}		
				?>
		}
		var timer=0.00;
		var counter;
		var count=0;
		var mistakes=0;
		var l=String(document.getElementById("one").innerHTML);
		var line=$("#one"), characters=line.text().split("").map(function(char){
						if(char!=" ") {return $("<span>" + char +"</span>");}
						//else if(char=='<br>'){return "<br>"}
						else{return $("<span>"+"__"+"</span>");}
		});
		line.html(characters);
		function stopWatch(){
			timer+=1;
		}
		$(window).keypress(function(e){
			if(count==0){
				counter=window.setInterval(stopWatch,10);
			}
			l=l.trim();
			var keynum=e.which||e.keyCode;
			var key=String.fromCharCode(keynum);
			key=key.toUpperCase();
			var getKey=document.getElementById('a'+key);
			//alert(getKey);
            if(getKey!=null){getKey.style.color="red";
            getKey.className="pop";
            setTimeout(function(){getKey.style.color="white";getKey.className="unpop";},100);}
			if(count<l.length){
			if(String.fromCharCode(keynum)==l.charAt(count)){
				characters[count].css("color","#26A65B");
			}
			//console.log(l);
			else{
			characters[count].css('color','red');
			mistakes+=1;
		}
			characters[count].css('background-color','white');
			if(count<l.length-1)characters[count+1].css('background-color','grey');
						count+=1;

	}
	else{
		if(count==l.length){
	clearInterval(counter);
	timer=timer/100;
	document.getElementById("d1").getElementsByTagName("div")[0].innerHTML+=Math.floor(count/timer)+"cps";
	document.getElementById("d1").getElementsByTagName("div")[1].innerHTML+=Math.floor(((count-	mistakes)/count*100))+"%";
	//$fp=fopen("file.txt","a+");
	//var text_node=document.createTextNode("Summary"+"Speed: "+timer.toString()+"\n"+"Accuracy: "+(count-mistakes)+"/"+count);
	//result.appendChild(text_node);
	//document.body.appendChild(result);
	var ele=document.createElement("button");
	var text_button=document.createTextNode("Next");
	ele.appendChild(text_button);
	document.body.appendChild(ele);
	ele.addEventListener("click",next);
	ele.setAttribute("name","next");
	result=Math.floor(count/timer)+","+Math.floor(((count-mistakes)/count*100));
	result+=";"+timer;
	ele.setAttribute("value",result);
	count+=1;


}
}
	});
});
	</script>
</head>
<body align="center">
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
	<p id="one" style="font-size:40px">ppp qq p q pq qp
qqp pq p p qp pq
t y ty yt ttt yy
tyt yty yyt tty</p>
<div>
<script>
///Users/OmgItsUtsav/Desktop/DsProject/OriginalProject/table.css
var sstr="~!@#$%^&*()[]"
var bracket=sstr.split("");

var tstr="QWERTYUIOP{}_";
var tops=tstr.split("");

var mstr="ASDFGHJKL;':\""
var middle=mstr.split("");

var bstr="ZXCVBNM,.<>?/"
var bottom=bstr.split("");

var nstr="1234567890-+="
var number=nstr.split("");
document.writeln("<table id=t1 cellspacing=5px border=border>");

document.writeln("<tr>");
for(var i in bracket)
{
document.writeln("<td id="+'a'+bracket[i]+">");
document.writeln(bracket[i]);
document.writeln("</td>");
}
document.writeln("</tr>");


document.writeln("<tr id=number>");
for(var i in number)
{
document.writeln("<td id="+'a'+number[i]+">");
document.writeln(number[i]);
document.writeln("</td>");
}
document.writeln("</tr>");

document.writeln("<tr id=top>");
for(var i in tops)
{
document.writeln("<td id="+'a'+tops[i]+">");
document.writeln(tops[i]);
document.writeln("</td>");
}
document.writeln("</tr>");
document.writeln("<tr id=middle>");
for(var i in middle)
{
document.writeln("<td id="+'a'+middle[i]+">");
document.writeln(middle[i]);
document.writeln("</td>");
}
document.writeln("</tr>");
document.writeln("<tr id=bottom>");
for(var i in bottom)
{
if(bottom[i]!='>')
document.writeln("<td id="+'a'+bottom[i]+">");
else{
document.writeln("<td id="+'a'+"&gt;"+">");

}
document.writeln(bottom[i]);
document.writeln("</td>");
}
document.writeln("</tr>");


document.writeln("</table>");
</script>
</div>
	<div id="d1">
		Summary
		<div id="speed">Speed: </div>
		<div id="accur"> Accuracy: </div>
	</div>
	<script>
	/*var count=0;
	function myFunction(e){
			var l=String(document.getElementById("one").innerHTML);
			l=l.trim();
			var keynum;
			if(window.event){
				keynum=e.which||e.keyCode;
				if(String.fromCharCode(keynum)==l.charAt(count)){
						//alert("Match found"+String.fromCharCode(keynum))
						document.getElementById("line").innerHTML+=l.charAt(count);
						document.getElementById("line").style.backgroundColor="green";
						count+=1;

						return false;
				}
				return false;
				//alert(l.charAt(count));
				//count++;
			}
			
	}*/
	</script>
	
	<!--<form action="">
		Start typing here: <textarea id="line" rows="2" cols="50" onkeypress="return myFunction(event)"></textarea>
	</form>-->
	</center>

</body>
</html>