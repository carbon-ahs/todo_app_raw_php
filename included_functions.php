<?php
function hello($name) {
    return "Hello" . $name;
}
function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}
function mysql_prep($string){
	global $connection;
	$escaped_string = mysqli_real_escape_string($connection, $string);

	return $escaped_string;
}

function confirm_query($result_set, $query) {
	if (!$result_set) {
		die("DB quary failed. Query: " . $query);
	}
}
function find_all_todos() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM todos ";
	$query .= "ORDER BY id ASC ";
	$todo_set = mysqli_query($connection, $query);

	confirm_query($todo_set, $query);
	return $todo_set;
}
function find_todo_by_id($todo_id) {
	global $connection;
	$safe_todo_id = mysqli_real_escape_string($connection, $todo_id);

	$query = "SELECT * ";
	$query .= "FROM todos ";
	$query .= "WHERE id = {$safe_todo_id} ";
	$query .= "LIMIT 1 ";
	$todo_set = mysqli_query($connection, $query);
	confirm_query($todo_set, $query);

	if ($todo = mysqli_fetch_assoc($todo_set)){
		return $todo;
	}
	else {
		null;
	}
}

?>