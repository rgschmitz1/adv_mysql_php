<?php
require_once('../header.php');

// Clear error message
$error_msg = '';

// If the user isn't logged in, try to log them in
if (!isset($_SESSION['id']) && isset($_POST['submit'])) {
    // grab username and password from user
    $user_username = $api->dbInputCheck($_POST['username']);
    $user_password = $api->dbInputCheck($_POST['password']);

    if (empty($user_username) || empty($user_password)) {
        $error_msg = 'You must enter a valid username and password to login.';
    } else {
        // lookup user from the database
        $query = "SELECT id FROM users WHERE username = '$user_username' AND password = '" . sha1($user_password) ."'";
        $data = $api->dbQuery($query);

        if (mysqli_num_rows($data) == 0) {
            $error_msg = 'Invalid username or password entered, try again.';
        } elseif (mysqli_num_rows($data) == 1) {
            // Login is OK, set the SESSION username and id, then redirect to homepage
            $row = mysqli_fetch_array($data);
            $_SESSION['username'] = $user_username;
            $_SESSION['id'] = $row['id'];
            $api->dbClose();
            header('Location: ' . SITE_ROOT);
        } else {
            $error_msg = 'Duplicate username and password exists in database, admin must fix!';
        }
    }
}

echo '<div class="container">';

// Check if user is already logged in
if (empty($_SESSION['id'])) {
    if (!empty($error_msg)) {
        ?>
        <div class="alert alert-dismisable alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><?= $error_msg ?></p>
        </div>
        <?php
    }
    ?>

    <div class="well center-login">
        <legend>Login</legend>
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <fieldset>
                <div class="form-group text-left">
                    <label for="username" class="control-label">Username</label>
                    <input type="text" class="form-control" value="<?php if (!empty($user_username)) { echo $user_username; } ?>"
                     id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group text-left">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control"
                     id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </fieldset>
        </form>
        <p><a href="<?= SITE_ROOT ?>/users/new.php">Create New User</a></p>
    </div>

    <?php
} else {
    echo '<p>You are logged in as <b>' . $_SESSION['username'] . '</b>.</p>';
}

echo '</div>';

require_once('../footer.php');
