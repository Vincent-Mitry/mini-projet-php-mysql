<?php

session_start();
session_destroy();
header("Location:/divers/mini-projet-php-mysql/index.php");
exit();

?>