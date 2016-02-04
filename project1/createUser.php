<?php
if (!isset($_POST['submit']))
	header('Location: newUser.html');

$valuelist = array('email',
				   'password',
				   'city',
				   'state',
				   'zip',
				   'emaillist',
				   'agree');

foreach ($valuelist as $key) {
    if (($_POST["$key"] == 'agree') && empty($_POST["$key"])) {
    	echo '<p class="error">YOU DO NOT AGREE TO TERMS, NO SOUP FOR YOU!</p>';
    } elseif (empty($_POST["$key"])) {
		echo '<p class="error">You forgot to enter in your ' . $_POST["$key"] . '.</p>';
    }
    if (($_POST["$key"] == 'email') && (!empty($_POST["$key"]))) {
		if ((!preg_match('/\w[\w\._\-&!?=#]*@/', $_POST["$key"])) ||
            (!checkdnsrr(preg_replace('/.*@/', '', $_POST["$key"])))) {
      		echo '<p class="error">Your email address is invalid.</p>';
		}
    }
}
?>
