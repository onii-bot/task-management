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
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $dob = $_POST["dob"];

    mysqli_select_db($conn, $dbname);
    $query = "INSERT INTO $tablename (email, username, password, dob) VALUES ('$email', '$username', '$password', '$dob');";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error on db insert");
    } else {
        // setting the cookie
        setcookie("username", $username, time() + (86400 * 30), "/");

        header("Location: ../components/home.php");
        exit;
    }
}

?>
