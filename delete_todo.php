<?php
error_reporting(0);
require_once("db_connection.php"); // DB CONNECTION
require_once("included_functions.php");
require_once("header.php");

if (isset($_POST['submit'])){
    // validations

        $id = $_GET["todo_id"];

        $query = "DELETE FROM todos WHERE id = {$id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Success
            redirect_to("index_todo.php");
        } else {
            // Failure
            redirect_to("index_todo.php");
            var_dump($query);
        }
    
}
else {
// GET req
$todo = find_todo_by_id($_GET["todo_id"]);
}
?>
<div class="container-fluid">
  <?php
  if (isset($query)){
    var_dump($query);
    
  }
  ?>
  <h2>Delete TODO:    <?php echo $todo["todo"];  ?></h2>
  <form action="delete_todo.php?todo_id=<?php echo $todo["id"];?>" method="post">
    <div class="form-group">
      <!-- <label>New TODO: </label> 
      <input type="text" class="form-control" name="todo" id="todo" value="<?php echo $todo["todo"];  ?>"> -->
    </div>
    
    <label>Are you sure to delete : <?php echo $todo["todo"];  ?> </label> 

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

  <?php
  require_once("footer.php");
  ?>