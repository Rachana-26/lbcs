<?php
session_start();
unset($_SESSION['eng_id']);
session_destroy();
header('Location:../index.php');
?>
