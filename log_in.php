<?php
require_once("header.php");
require_once("included_functions.php");


if (isset($_POST["submit"])) {
    // form submitted
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == "root" && $password == "1234") {
        // login sucsess
        // redirect_to("index_todo.php?username=\"root\"");

    }
    else {
        $message = "Error in username or password";
    }
    
} else {
    $username = "";
    $message = "Log in pls";
}

?>

<body>

    <div class="container-fluid">
        <?php

        ?>
        <p></p>
        <div class="alert alert-primary" role="alert">
            <?php echo $message ?>
        </div>
        <form action="forms_single.php" method="post">
            <div class="form-group">
                <label for="exampleInputUsename">User Name</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo htmlspecialchars($username) ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>