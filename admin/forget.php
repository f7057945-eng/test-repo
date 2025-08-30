<?php

session_start();
require_once('../config.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if admin_email is present in the POST data
    if (!isset($_POST['admin_email'])) {
        echo json_encode(['error' => 'Email field is missing']);
        exit;
    }

    // Validate email format
    $admin_email = trim($_POST['admin_email']);
    if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['error' => 'Invalid email format']);
        exit;
    }

    // Validate and sanitize the email
    $admin_email = mysqli_real_escape_string($conn, $admin_email);

    // SQL query
    $select = "SELECT * FROM cake_shop_admin_registrations WHERE admin_email = '$admin_email'";

    // Execute the query
    $query = mysqli_query($conn, $select);

    // Fetch the data as an associative array
    $res = mysqli_fetch_assoc($query);

    // Check if the admin exists
    if ($res) {

            // Forward to reset_password page
            header("Location: reset_password.php?admin_id=".$res['admin_id']."&token=".$password_reset_token);
            exit;
    } else {
        echo "<script>alert('Username or Password does not exist!')</script>";
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        background-color: white;
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    </style>
</head>
<body>
<div class="splash-container text-dark">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><h2 class="text-primary">𝐌𝐀𝐇𝐀𝐑𝐀𝐉𝐀 𝐁𝐀𝐊𝐄𝐑𝐒 & 𝐒𝐖𝐄𝐄𝐓𝐒</h2></a><span class="splash-description">Please enter your user information.</span></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="admin_email">Email Address:</label>
                                <input type="email" class="form-control" id="admin_email" name="admin_email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <!--<a href="register.php" class="footer-link">Create An Account</a>-->
                <div class="card-footer-item card-footer-item-bordered">
                <a href="login_users.php" class="footer-link">Back to login Site</a>
            </div>
            </div>
        </div>
    </div>
<!-- Optional JavaScript -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>