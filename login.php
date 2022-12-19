<?php
$conn=mysqli_connect("localhost","root","","cloudbox");
session_start(); 
if(!isset($_SESSION['uname'])){
$username=$_POST['username'];
$password=$_POST['password'];
$v="select * from credentials where username='$username' and password='$password'";
$res=mysqli_query($conn,$v);
$count=mysqli_num_rows($res);
if($count>=1){
   $_SESSION['uname']=$username;
   }
   else{
   $_SESSION['uname']=NULL;
   }}
   if(isset($_SESSION['uname'])){
      echo "<script>location.href='upload.php'</script>";
   }
   else{
      echo "<script>alert('Username or Password incorrect')</script>";
      echo "<script>location.href='login.html'</script>";    
      }
?>