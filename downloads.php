<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style1.css">
  <title>Cloudbox-Download files</title>
</head>
<body>
<div class="header">
            <div class="innerheader">
                <div class="logo">
                    <a href="signup.html"><img src="logo.png" width="270px"></a>
                </div>
                <ul class="nav">
                  <a href="home.html"><span class="icon"><ion-icon name="home-outline"></ion-icon></span>Home</a>
                  <a href="upload.php"><span class="icon"><ion-icon name="cloud-upload-outline"></ion-icon></span>Upload</a>
                  <a href="logout.php"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>Logout</a> 
                </ul>
            </div>
</div>
<?php echo"<h2 style='margin-left:10px'>Welcome <span style='color:red;''>".$_SESSION['uname']."</span> !</h2>"; ?>
<blockquote style="font-size:20px;font-weight:bold;margin-top:40px">Here are your files which you uploaded to our Cloudbox.<br><br><br> Note: Delete files after making a proper decision Because,deleted files cant be recovered and the process is irreversible.</blockquote> 
<p style="font-size:28px;background-color:black;color:white;text-align:center;width:50%;margin-left:25%;margin-top:60px">Files</p>
<table>
<thead>
    <th>Filename</th>
    <th>Size (in KB)</th>
    <th>Action</th>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td style="text-align:center"><?php echo $file['name']; ?></td>
      <td style="text-align:center"><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><div class="buttons"><div class="downb"><a href="downloads.php?file_id=<?php echo $file['id'] ?>"><ion-icon name="cloud-download-outline"></ion-icon><span style="margin-left:8px">Download</span></a></div>
      <div class="del"><a href="downloads.php?id=<?php echo $file['id'] ?>"><ion-icon name="trash-outline"></ion-icon><span style="margin-left:8px">Delete</span></a></div></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>