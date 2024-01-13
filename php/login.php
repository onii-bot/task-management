<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskmanagent";
$tablename = "users";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    mysqli_select_db($conn, $dbname) or die("Cannot connect to database");

    $query = "SELECT * FROM " . $tablename . " WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie expires in 30 days

        header("Location: ../components/home.php");
        exit;
    } else {
        echo "<script>alert('Username or password incorrect'); window.location.href='../components/login.html';</script>";
        exit;
    }

    mysqli_free_result($result);
}

mysqli_close($conn);

?>
