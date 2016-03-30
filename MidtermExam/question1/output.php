<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MidtermExam - question1</title>
    <!-- Default bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>
<body>
<?php
// If inputEmail and/or inputPassword is not set redirect to form.html,
// this doubles as a check that the user came from form.html since we are using the POST method
if (empty($_POST['inputEmail']) || empty($_POST['inputPassword'])) {
    header('Location: form.html');
}
$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
echo "<p>Input Email is, <b>$email</b></p>";
echo "<p>Input Password is, <b>$password</b></p>";
?>
</body>
</html>
