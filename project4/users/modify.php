<?php
require_once('../header.php');
if (!$api->authorizeAdmin())
    exit('<div class="container">You must be an administrative user to access this page.</div>');

if (!isset($_GET['user_id']) && !isset($_POST['user_id'])) {
    header('Location: index.php');
} elseif (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $userid = $_GET['user_id'];
} elseif (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $userid = $_POST['user_id'];
}

$list = array('username' => 'Username',
              'password' => 'Password',
              'PasswordConfirmation' => 'Confirm Password');

$updatelist = array('username',
                    'password',
                    'PasswordConfirmation');

$query = "SELECT * FROM users WHERE id = '$userid'";
$results = $api->dbQuery($query);

// There should be only one user that matches the user id in the database
if (mysqli_num_rows($results) == 0) {
    exit("<div class='container'>Invalid userid #$userid, try again.</div>");
} elseif (mysqli_num_rows($results) == 1) {
    $record = mysqli_fetch_array($results);
    foreach ($updatelist as $key) {
        if (($key == 'password') || ($key == 'PasswordConfirmation')) {
            continue;
        }
        $data["$key"] = $record["$key"];
    }
}

// If user has submitted form, check user input
if (isset($_POST['submit'])) {
    $error_msg = '';
    // Check each input is set
    foreach ($updatelist as $key) {
        $error["$key"] = false;
        if (isset($_POST["$key"]) && !empty($_POST["$key"])) {
            $data["$key"] = $api->dbInputCheck($_POST["$key"]);
        } elseif (("$key" != 'password') && ("$key" != 'PasswordConfirmation') && empty($_POST["$key"])) {
            $error_msg = 'All highlighted fields must be filled in, try again.';
            $error["$key"] = true;
        }
    }

    // Check that password and confirmation password match
    if (empty($error_msg) && ($data['password'] != $data['PasswordConfirmation'])) {
        $error_msg = 'Password and confirmation password does not match, try again.';
        $error['password'] = true;
        $error['PasswordConfirmation'] = true;
    }

    // If no errors exist, set user info into database
    if (empty($error_msg)) {
        $username = $data['username'];
        $password = sha1($data['password']);

        if (empty($password)) {
            $query = "UPDATE users SET username = '$username' WHERE id = '$userid'";
        } else {
            $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = '$userid'";
        }

        $result = $api->dbQuery($query);
        if (!$result) {
            echo $query;
            $api->dbError();
        } else {
            $api->dbClose();
            header("Location: index.php?user=$username");
        }
    }
}

echo '<div class="container">';

// Check if errors exist in form
if (!empty($error_msg)) {
    ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><?= $error_msg ?></p>
    </div>
    <?php
}
?>

<div class="well">
    <legend>Modify User</legend>
    <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>

        <?php
        // Display new user form below
        echo "<input type='hidden' name='user_id' value='$userid'>";
        foreach ($list as $key => $value) {
            // Highlight form input as in error if flagged as having an issue
            if (isset($error["$key"]) && ($error["$key"])) {
                echo '<div class="form-group has-error has-feedback">';
            } else {
                echo '<div class="form-group">';
            }
            echo "<label for='$key' class='col-sm-2 control-label'>$value</label>";
            echo "<div class='col-sm-3'>";
            // Change form input type to password for appropriate fields
            if (("$key" == 'password') || ("$key" == 'PasswordConfirmation')) {
                echo "<input type='password' class='form-control' name='$key' id='$key' placeholder='$value'>";
            } else {
                echo "<input type='text' class='form-control' name='$key' id='$key' value='" . $data["$key"] . "' placeholder='$value'>";
            }
            // If error is present with input, display error icon in input box
            if (isset($error["$key"]) && ($error["$key"])) {
                echo '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
            }
            echo '</div></div>';
        }
        ?>

            <div class="form-group">
                <div class="col-sm-1 col-sm-offset-2">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<?php
echo '</div>';
include('../footer.php');
