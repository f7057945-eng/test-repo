<?php
require_once('../config.php');

// Check if admin ID is provided
if (!isset($_GET['admin_id'])) {
    echo "Invalid request";
    exit;
}

$admin_id = $_GET['admin_id'];

// Check if admin exists
$select = "SELECT * FROM cake_shop_admin_registrations WHERE admin_id = '$admin_id'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password does not match!')</script>";
        echo "<script>window.location.assign('reset_password.php?users_id=$admin_id')</script>";
        exit;
    }

    // Update password
    $update = "UPDATE cake_shop_admin_registrations SET admin_password = '$new_password' WHERE admin_id = '$admin_id'";
    mysqli_query($conn, $update);

    // Start session and store admin data
    session_start();
    $_SESSION['admin_admin_id'] = $res['admin_id'];
    $_SESSION['admin_admin_username'] = $res['admin_username'];

    echo "<script>alert('Password reset successfully!')</script>";
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
        background-color: white;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<body>
<div class="splash-container text-dark">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><h2 class="text-primary">𝐌𝐀𝐇𝐀𝐑𝐀𝐉𝐀 𝐁𝐀𝐊𝐄𝐑𝐒 & 𝐒𝐖𝐄𝐄𝐓𝐒</h2></a><span class="splash-description">Please enter your user information.</span></div>
                    
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                <div class="form-group">
                    <label for="new_password" style="font-size: 18px;">New Password:</label>
                    <input type="password" name="new_password" required class="form-control form-control-lg">
                </div>
                <div class="form-group">
                    <label for="confirm_password" style="font-size: 18px;">Confirm Password:</label>
                    <input type="password" name="confirm_password" required class="form-control form-control-lg">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="admin_signup.php" class="footer-link">Create An Account</a>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="index.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>