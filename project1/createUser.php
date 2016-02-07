<?php
include('header.html');

if (!isset($_POST['submit']))
    header('Location: newUser.html');

$valuelist = array('email',
                   'password',
                   'city',
                   'state',
                   'zip',
                   'emaillist',
                   'agree');

echo '<div class="container"><ol>';
foreach ($valuelist as $key) {
    echo '<li>';
    if (("$key" == 'agree') && empty($_POST["$key"])) {
        echo '<p class="bg-danger">YOU DO NOT AGREE TO TERMS, <b>NO SOUP FOR YOU!</b></p>';
    } elseif (empty($_POST["$key"])) {
        echo "<p class='bg-danger'>You forgot to enter in <b>$key</b>.</p>";
    } elseif ("$key" == 'email') {
        if ((!preg_match('/\w[\w\._\-&!?=#]*@/', $_POST['email'])) ||
            (!checkdnsrr(preg_replace('/.*@/', '', $_POST['email'])))) {
            echo '<p class="bg-danger">Your email address <b>(' . $_POST['email'] . ')</b> is invalid.</p>';
        } else {
            echo '<p>Your email address is <b>' . $_POST['email'] . '</b>.</p>';
        }
    } elseif (("$key" == 'zip') && !is_numeric($_POST['zip'])) {
        echo '<p class="bg-danger">Your zip must be and integer, <b>' . $_POST['zip'] . '</b> is an invalid input.</p>';
    } elseif ("$key" == 'emaillist') {
        if ($_POST['emaillist'] == 'yes') {
            echo '<p>You would like to receive email offers.</p>';
        } else {
            echo '<p>You <b>DO NOT</b> want to receive email offers (fine then!)</p>';
        }
    } elseif ("$key" == 'agree') {
        echo '<p>You agree to terms and conditions (good, good!)</p>';
    } else {
        echo "<p>Your $key is <b>" . $_POST["$key"] . "</b>.</p>";
    }
    echo '</li>';
}
echo '</ol></div>';

include('footer.html');
?>
