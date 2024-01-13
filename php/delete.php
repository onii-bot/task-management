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
    $id = $_GET["id"];

    $query = "DELETE FROM $tablename WHERE id=$id;";

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
