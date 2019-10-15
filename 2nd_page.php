<?php
include_once 'config.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];
$phonecode = $_POST['phonecode'];
$phone = $_POST['phone']; 
 $sql = "INSERT INTO register(username,password,gender,email,phonecode,phone)
      VALUES( '".$username."','".$password."','".$gender."','".$email."','".$phonecode."','".$phone."')";
      
   $retval = mysqli_query($conn, $sql);
   if(!$retval ) {
      die('Could not enter data: ' . mysqli_error($conn));
   }
   else{
   
   echo "Entered data successfully\n";
   }
   mysqli_close($conn);

  header("refresh:0,url=3rd_page.html");
?>