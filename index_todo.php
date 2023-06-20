<?php
require_once("db_connection.php"); // DB CONNECTION
require_once("included_functions.php");
require_once("header.php");


// if(!$_GET["username"]){
//     redirect_to("login.php");
// }

$todo_set = find_all_todos();
?>
<div class="container-fluid">
<h2>Hello </h2>
    <ul class="list-group">
    <?php

    while ($todo = mysqli_fetch_assoc($todo_set)) {
        echo "<li class=\"list-group-item\">{$todo["todo"]}" 
        . "<a href=\"edit_todo.php?todo_id={$todo["id"]}\"> <i class=\"fa fa-edit\"></i></a>" 
        . "<a href=\"delete_todo.php?todo_id={$todo["id"]}\"> <i class=\"fa fa-remove\"></i></a>"
        . "</li>";
    }
    ?>
    </ul>
    <br>
    <!-- <h2> DEMO LIST </h2>
    <ul class="list-group">
        <li class="list-group-item">Cras justo odio <a href="#" class="fa fa-facebook"></a> </li>
        <li class="list-group-item">Cras justo odio <a class="fa-duotone fa-trash"></a></li>
        <i class="fa-regular fa-trash"></i>
        <a href="your link here"> <i class="fa fa-edit"></i></a>
    </ul> -->
</div>

<?php
require_once("footer.php");
?>