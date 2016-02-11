<?php
include('header.html');

if (!isset($_POST['submit']))
    header('Location: newUser.html');

$valuelist = array('Email' => 'email',
                   'Password' => 'password',
                   'City' => 'city',
                   'State' => 'state',
                   'Zip' => 'zip',
                   'emaillist' => 'emaillist',
                   'agree' => 'agree');

echo '<div class="container"><ol>';
foreach ($valuelist as $key => $value) {
    echo '<li>';
    if (("$key" == 'agree') && empty($_POST['agree'])) {
        echo '<p class="bg-danger">YOU DO NOT AGREE TO TERMS, <b>NO SOUP FOR YOU!</b></p>';
    } elseif (empty($_POST["$value"])) {
        echo "<p class='bg-danger'>You forgot to enter in <b>$key</b>.</p>";
    } elseif ("$key" == 'Email') {
        if ((!preg_match('/\w[\w\._\-&!?=#]*@/', $_POST['email'])) ||
            (!checkdnsrr(preg_replace('/.*@/', '', $_POST['email'])))) {
            echo '<p class="bg-danger">Your email address <b>(' . $_POST['email'] . ')</b> is invalid.</p>';
        } else {
            echo '<p>Email: ' . $_POST['email'] . '</p>';
        }
    } elseif (("$key" == 'Zip') && (!is_numeric($_POST['zip']) || (strlen($_POST['zip']) != 5))) {
        echo '<p class="bg-danger">Your zip must be a 5 digit integer, <b>' . $_POST['zip'] . '</b> is an invalid input.</p>';
    } elseif ("$key" == 'emaillist') {
        if ($_POST['emaillist'] == 'yes') {
            echo '<p>Receive emails</p>';
        } else {
            echo '<p>No emails</p>';
        }
    } elseif ("$key" == 'agree') {
        echo '<p>I agree</p>';
    } else {
        echo "<p>$key: " . $_POST["$value"] . "</p>";
    }
    echo '</li>';
}
echo '</ol></div>';

include('footer.html');
