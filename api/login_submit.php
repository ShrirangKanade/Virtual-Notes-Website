<?php
session_start();
require("../includes/database_connect.php");
$email=$_POST['email'];
$password=$_POST['password'];
$password = sha1($password);

$sql="SELECT * FROM users where email='$email' AND PassWord='$password';";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error :".mysqli_error ($conn);
}
 
$row=mysqli_fetch_assoc($result);
if($row){
    $_SESSION['user_id']=$row['id'];
    $_SESSION['name']=$row['Full_Name'];
    header("location: ../Dashboard.php");
  
}else{
    echo "Login Failed";
}
mysqli_close($conn);
?>