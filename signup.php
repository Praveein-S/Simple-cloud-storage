<?php
$conn=mysqli_connect("localhost","root","","cloudbox");
$email=$_POST['email'];  
$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if($password == $cpassword){
$v="INSERT INTO credentials(email,username,password) VALUES('$email','$username','$password')";
$res=mysqli_query($conn,$v);
$sql="CREATE TABLE `cloudbox`.`{$username}` (id INT(11) AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255),size INT(5))";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('YOUR ACCOUNT HAS BEEN CREATED!')</script>";
    echo "<script>location.href='login.html'</script>";
}else{
    echo "<script>alert('INVALID USERNAME/PASSWORD!')</script>";
    echo "<script>location.href='signup.html'</script>";
}
}
else{
    echo "<script>alert('PASSWORDS ARE NOT MATCHED,TRY RE-ENTERING')</script>";
    echo "<script>location.href='signup.html'</script>";
}
?>