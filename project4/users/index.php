<?php
require_once('../header.php');
$results = $api->dbQueryUsers();
?>

<div class="container">

    <?php if (isset($_GET['user'])) { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>Successfully added or updated user <b><?= $_GET['user'] ?></b>.</p>
    </div>
    <?php } ?>

    <h2>User Request</h2>
    <p><a href="new.php">Add New User</a></p>

    <!-- Start modify form -->
    <form class="form-inline" action="<?= SITE_ROOT ?>/users/modify.php" method="get" role="form">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>create</th>
                <th>read</th>
                <th>readAll</th>
                <th>update</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($results as $record) { ?>
            <tr>
                <?php $username = $record['username']; ?>
                <td><?= $username ?></td>
                <td><?php echo $api->dbCheckTransactions($username, 1); ?></td>
                <td><?php echo $api->dbCheckTransactions($username, 2); ?></td>
                <td><?php echo $api->dbCheckTransactions($username, 3); ?></td>
                <td><?php echo $api->dbCheckTransactions($username, 4); ?></td>
                <td><?php echo $api->dbCheckTransactions($username, 5); ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    </form>
    <!-- End modify form -->

</div>

<?php
include('../footer.php');
