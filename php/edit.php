<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskmanagent";
$tablename = "tasks";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}

$id = $_GET['id'];

$query = "SELECT * FROM $tablename WHERE id = '$id';";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>

<form action="../php/update.php?id=<?php echo $id; ?>" method="POST" class="task-form">
<label for="task">Task:</label>
<input type="text" id="task" value="<?php echo $row['task']; ?>" name="task" required>

<label for="datetime">Date and Time:</label>
<input type="datetime-local" value="<?php echo $row['datetime']; ?>" id="datetime" name="datetime" required>

<button type="submit" class="auth-button">Edit Task</button>
</form>
