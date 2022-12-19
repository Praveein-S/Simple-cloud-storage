<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="style1.css">
    <title>Cloudbox-Files Upload</title>
  </head>
  <body>
  <div class="header">
            <div class="innerheader">
                <div class="logo">
                    <a href="signup.html"><img src="logo.png" width="270px"></a>
                </div>
                <ul class="nav">
                  <a href="home.html"><span class="icon"><ion-icon name="home-outline"></ion-icon></span>Home</a>
                  <a href="downloads.php"><span class="icon"><ion-icon name="cloud-download-outline"></ion-icon></span>Download</a>
                  <a href="logout.php"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>Logout</a> 
                </ul>
            </div>
        </div>
  <?php
   echo"<h2 style='margin-left:10px'>Welcome <span style='color:red;''>".$_SESSION['uname']."</span> !</h2>"; ?> 
   <blockquote style="font-size:20px;font-weight:bold;margin-top:40px">In our drive we provide most secured storage , the files uploaded can be accessed anywhere anytime .Free your storage by uploading to this drive.<br><br><br>You can upload your files below to save it in cloud and use it from anywhere by logging your account. </blockquote> 
   
    <div class="container">
      <div class="row">
        <form action="upload.php" method="post" enctype="multipart/form-data" >
          <h3 align="center">UPLOAD FILE</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
    <marquee behavior="" direction="" style="background-color:black;color:white;font-size:1.2em;width:50%;margin-left:25%">ONLY .pdf, .doc, .zip, .mp4, .mp3, .jpg and .jpeg FILES ARE SUPPORTED!</marquee>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>