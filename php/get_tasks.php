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

// checking if the user is logged in from cookie
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];

    $query = "SELECT * FROM $tablename WHERE username = '$username';";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching tasks from the database: " . mysqli_error($conn));
    }

    echo "<table style='margin: auto; width: 80%; margin-top: 20px;' border='1'>
            <tr>
                <th>Task</th>
                <th>Date and Time</th>
                <th>Actions</th>
            </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr data-task='{$row['task']}' data-datetime='{$row['datetime']}'>
                            <td>{$row['task']}</td>
                            <td>{$row['datetime']}</td>
                            <td>
                                <div style='display: inline-block; margin-right: 10px;'>
                                    <a href='../php/edit.php?id={$row['id']}' class='edit-btn' style='text-decoration: none; padding: 5px 10px; background-color: #3498db; color: #fff; border-radius: 5px;'>Edit</a>
                                </div>
                                <form action='../php/delete.php?id={$row['id']}' method='POST' style='display: inline-block;'>
                                    <button class='delete-btn' style='padding: 5px 10px; background-color: #e74c3c; color: #fff; border-radius: 5px;'>Delete</button>
                                </form>
                            </td>
                    </tr>";
            }            

    echo "</table>";
} else {
    echo "User not logged in.";
}

mysqli_close($conn);

?>
