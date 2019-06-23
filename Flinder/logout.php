<?php
session_start();
session_destroy();
header("location: /php-projects/fys_examen/workspace/login.php");
?>