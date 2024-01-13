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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $datetime = $_POST["datetime"];

    // getting the user who is inserting
    $username = $_COOKIE['username'];

    $query = "INSERT INTO $tablename (username, task, datetime) VALUES ('$username', '$task', '$datetime');";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error adding task to the database: " . mysqli_error($conn));
    } else {
        header("Location: ../components/home.php");
        exit();
    }
}

mysqli_close($conn);

?>
