<?php

setcookie('username', '', time() - 3600, '/');

header('Location: ../components/login.html');
exit;

?>
