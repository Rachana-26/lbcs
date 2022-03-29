<?php
session_start();
unset($_SESSION['custid']);
session_destroy();
header('Location:index.php');
?>
