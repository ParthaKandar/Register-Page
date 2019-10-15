<?php
$usernae = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phonecode = $_POST['phonecode'];
$phone = $_POST['phone']; 

if(!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phonecode) || !empty($phone))
{ 
$host = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbname = "registerdemo";

$conn = new mysqli($host, $dbUsername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
	# code...
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
	$SELECT = "SELECT email from register where email = ? Limit 1";
	$INSERT = "INSERT Into register(username,password,gender,email,phonecode,phone) values(?,?,?,?,?,?)";

	//prepare statement
	$stmt = $conn->prepare($SELECT);
	$stmt->blind_param("s",$email);
	$stmt->execute();
	$stmt->blind_result($email);
	$stmt->store_result();
	$rnum = $stmt->num_rows;

	if($rnum==0)
	{
		$stmt->close();

		$stmt = $conn->prepare($INSERT);
		$stmt->blind_param("ssssii", $username, $password, $gender, $email, $phonecode, $phone);
		$stmt->execute();
		echo "New record inserted successfully";

	}
	else
	{
		echo "Someone already register with this email";
	}
	$stmt->close();
	$conn->close();
}
}
else
{
	echo "All fields are required";
	die();
}

?>