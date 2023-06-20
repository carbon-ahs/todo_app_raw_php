<?php
error_reporting(0);
require_once("db_connection.php"); // DB CONNECTION
require_once("included_functions.php");
require_once("header.php");

if (isset($_POST['submit'])) {
    // validations
    $todo = mysql_prep($_POST["todo"]);
    $id = $_GET["todo_id"];

    $query    = "UPDATE todos SET ";
    $query    .= "todo = \"{$todo}\" ";
    $query    .= "WHERE id = {$id} ";
    $query    .= "LIMIT 1 ;";

    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        redirect_to("index_todo.php");
    } else {
        // Fail
        var_dump($query);
    }
} else {
    // GET req
    $todo = find_todo_by_id($_GET["todo_id"]);
}
?>
<div class="container-fluid">
    <?php
    if (isset($query)) {
        var_dump($query);
    }
    ?>
    <h2>Edit TODO: <?php echo $todo["todo"];  ?></h2>
    <form action="edit_todo.php?todo_id=<?php echo $todo["id"]; ?>" method="post">
        <div class="form-group">
            <!-- <label>New TODO: </label> -->
            <input type="text" class="form-control" name="todo" id="todo" value="<?php echo $todo["todo"];  ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php
    require_once("footer.php");
    ?>