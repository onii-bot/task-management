<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Home - MTasks</title>
</head>
<body>

<div class="header">
    <div class="logo" onclick="location.href='../index.html'">MTasks</div>
    <div class="logout-button">
        <button class="auth-button" onclick="location.href='../php/logout.php'">Logout</button>
    </div>
</div>

<div class="content">
    <?php
        // getting username of logged in user
        $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
        echo '<h2 class="welcome-message">Welcome, ' . htmlspecialchars($username) . '!</h2>';
    ?>

    <h2 class="page-heading">Task Management</h2>

    <form action="../php/add.php" method="POST" class="task-form">
        <label for="task">Task:</label>
        <input type="text" id="task" name="task" required>
        
        <label for="datetime">Date and Time:</label>
        <input type="datetime-local" id="datetime" name="datetime" required>
        
        <button type="submit" class="auth-button">Add Task</button>
    </form>

    <?php include '../php/get_tasks.php'; ?>
</div>

<script src="script.js"></script>
<script>
    var datetimeInput = document.getElementById('datetime');
    datetimeInput.addEventListener('input', function () {
        var selectedDatetime = new Date(datetimeInput.value);
        var currentDate = new Date();

        if (selectedDatetime <= currentDate) {
            alert('Please select a date and time in the future.');
            datetimeInput.value = ''; // Clear the input value
        }
    });

    // Function to get the value of a cookie by name
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
            return match[2];
        }
        return null;
    }
</script>
</body>
</html>
