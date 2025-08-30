<?php
session_start();
unset($_SESSION['user_users_id']);
unset($_SESSION['user_users_username']);
echo "<script>alert('product removed!')</script>";
echo "<script>window.location.assign('cart.php')</script>";
session_destroy();
header("Location: index.php?logout_success=1");
?>