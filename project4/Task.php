<?php
require_once('header.php');
?>

<div class="container">
    <a href="<?= SITE_ROOT ?>/taskservice.php">Task Service (readAll)</a>
    <br />
    <!-- Read form here -->
    <form class="form-inline" action='taskservice.php' method='get'>
        <legend>Read</legend>
        <input class="form-control" type='text' name='id' placeholder='id' />
        <input class="btn btn-primary" type='submit' value='Read' \>
    </form>
    <br />
    <!-- Create form here -->
    <form class="form-inline" action='taskservice.php' method='post'>
        <legend>Create</legend>
        <input class="form-control" type='text' name='description' placeholder='description' />
        <input class="btn btn-primary" type='submit' value='Post' \>
    </form>
    <br />
    <!-- Detete form here -->
    <div class="form-inline">
        <legend>Delete</legend>
        Enter the ID to delete: <input class="form-control" type="text" id="idToDelete" placeholder='id' />
        <button class="btn btn-primary" id="btnDelete" type="button">Delete</button>
    </div>
    <br />
    <!-- Update form here -->
    <div class="form">
        <legend>Update</legend>
        <div class='col-sm-3'>
        Enter the ID to update:<input class="form-control" type="text" id="idToUpdate" />
        <br />
        Description: <input class="form-control" type="text" id="description" />
        <br />
        <button class="btn btn-primary" id="btnUpdate" type="button">Update</button>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>

<script type="text/javascript">
    $(document).ready(function() {
        //js -> call taskservice.php
        $("#btnDelete").click(function() {
            $.ajax("taskservice.php", {"data":{"id":$("#idToDelete").val()}, "method":"DELETE"});
        });
        $("#btnUpdate").click(function() {
            $.ajax("taskservice.php", {"data":{"id":$("#idToUpdate").val(), "description":$("#description").val()}, "method":"PUT"});
        });
    })
</script>
