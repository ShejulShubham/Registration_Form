<?php
session_start();
session_destroy();
// go to login page
header('Location: admin_login.php');
exit();
?>