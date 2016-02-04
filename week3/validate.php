<?php
if(!isset($_POST['termsAndConditions']))
	header('Location: index.html');

$email = $_POST['email'];
$password = $_POST['password'];
$pic = $_FILES['profilePic'];
$pic_name = $_FILES['profilePic']['name'];

echo "email: $email", "<br />", "password: $password", "<br />";

#echo "<pre>";
#print_r($pic);
#echo "</pre>";

move_uploaded_file($_FILES['profilePic']['tmp_name'], "uploads/$pic_name");
?>
