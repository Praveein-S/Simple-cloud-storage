<?php
session_start();        
$conn = mysqli_connect('localhost', 'root','', 'cloudbox');
$sql = "SELECT * FROM `cloudbox`.`{$_SESSION['uname']}`";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (isset($_POST['save'])) { 
    $filename = $_FILES['myfile']['name'];  
    $destination = 'uploads/'. $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'mp4', 'mp3' ,'jpg', 'jpeg '])) {
        echo "You file extension must be .zip, .pdf, .docx, .mp4, .mp3, .jpg, .jpeg";
    } elseif ($_FILES['myfile']['size'] > 1000000000) {
        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $destination)) {
            $sql1 = "INSERT INTO `cloudbox`.`{$_SESSION['uname']}` (name, size) VALUES ('$filename', '$size')";
            if (mysqli_query($conn, $sql1)) {
                echo "File uploaded successfully";
                echo "<script>alert('File uploaded successfully')</script>";
            }
        } else {
            echo "Failed to upload file.";
            echo "<script>alert('Failed to upload file.')</script>";
        }
    }
}
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM `cloudbox`.`{$_SESSION['uname']}` WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);
        mysqli_query($conn, $updateQuery);
        exit;
    }
}
if (isset($_GET['id'])){
    $d=$_GET['id'];
    $del = mysqli_query($conn, "DELETE FROM `cloudbox`.`{$_SESSION['uname']}` WHERE id=$d");
    if($del){
        header("location:downloads.php");
    }else{
        echo "<script>alert('Error deleting record');location.href='downloads.php';</script>";
    }
}
?>