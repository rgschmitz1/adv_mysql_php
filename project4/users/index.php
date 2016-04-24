<?php
require_once('../header.php');
//if (!$api->authorizeAdmin())
//    exit('<div class="container">You must be an administrative user to access this page.</div>');

$query = "SELECT * FROM users";
$result = $api->dbQuery($query);
if (!$result)
    $api->dbError($query);
?>

<div class="container">

    <?php if (isset($_GET['user'])) { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>Successfully added or updated user <b><?= $_GET['user'] ?></b>.</p>
    </div>
    <?php } ?>

    <h2>User Management</h2>
    <p><a href="new.php">Add New User</a></p>

    <!-- Start modify form -->
    <form class="form-inline" action="<?= SITE_ROOT ?>/users/modify.php" method="get" role="form">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Modify</th>
            </tr>
        </thead>
        <tbody>

        <?php while ($record = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?= $record['username'] ?></td>
                <td style="padding-top: 0px; padding-bottom: 0px;">
                    <button type="submit" name="user_id" value="<?= $record['id'] ?>" class="btn btn-default">Edit</button>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    </form>
    <!-- End modify form -->

</div>

<?php
include('../footer.php');
