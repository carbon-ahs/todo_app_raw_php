<?php
error_reporting(0);
require_once("db_connection.php"); // DB CONNECTION
require_once("included_functions.php");
require_once("header.php");

if (isset($_POST['submit'])){
    // validations
        $todo = mysql_prep($_POST["todo"]);

        $query   = "INSERT INTO todos (";
        $query	.= " todo ";
        $query	.= ") VALUES (";
        $query	.= " '{$todo}'";
        $query	.= ")";
      
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
}
?>
<div class="container-fluid">
  <?php
  if (isset($query)){
    var_dump($query);
  }
  ?>
  <h2>Create New TODO </h2>
  <form action="new_todo.php" method="post">
    <div class="form-group">
      <label>New TODO: </label>
      <input type="text" class="form-control" name="todo" id="todo" placeholder="Enter new todo">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

  <?php
  require_once("footer.php");
  ?>