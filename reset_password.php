<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('config.php');

session_start(); // Ensure session is started at the beginning

// Check if user ID is provided
if (!isset($_GET['users_id'])) {
    echo "Invalid request";
    exit;
}

$users_id = $_GET['users_id'];

// Fetch user info
$select = "SELECT * FROM cake_shop_users_registrations WHERE users_id = '$users_id'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);

if (!$res) {
    echo "Invalid user";
    exit;
}

// Step 1: Generate and send OTP if not already sent
if (!isset($_SESSION['otp_sent'])) {
    $otp = rand(100000, 999999); // 6-digit OTP
    $otp_expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));
    $update_otp = "UPDATE cake_shop_users_registrations SET otp='$otp', otp_expiry='$otp_expiry' WHERE users_id = '$users_id'";
    mysqli_query($conn, $update_otp);

    // Send OTP via email
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'typewithsania02@gmail.com'; // SMTP username
        $mail->Password = 'htfy loue bgxp lprj';  // SMTP password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->SMTPDebug = 0;
        // Recipients
        $mail->setFrom('no-reply@typewithsania02.com', 'Maharaja Bakers');
        $mail->addAddress($res['users_email']); // Send OTP to user email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Password Reset';
        $mail->Body    = "Your OTP is: <b>$otp</b>. It will expire in 10 minutes.";
        $mail->AltBody = "Your OTP is: $otp. It will expire in 10 minutes.";

        $mail->send();
        echo "<script>alert('OTP sent successfully to your email!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('OTP could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }

    $_SESSION['otp_sent'] = true;
}

// Step 2: Verify OTP
if (isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['otp'];
    $check_otp = "SELECT * FROM cake_shop_users_registrations WHERE users_id='$users_id' AND otp='$entered_otp' AND otp_expiry > NOW()";
    $result = mysqli_query($conn, $check_otp);

    if (mysqli_num_rows($result) > 0) {
        // OTP is valid
        $_SESSION['otp_verified'] = true; // Set session flag for OTP verification

        // Provide feedback to the user
        echo "<script>alert('OTP verified! You can now reset your password.');</script>";

        // Redirect to the password reset form
        header("Location: reset_password.php?users_id=$users_id");
        exit;
    } else {
        // OTP is invalid or expired
        echo "<script>alert('Invalid or expired OTP.');</script>";
    }
}

// Step 3: Handle password reset after OTP verification
if (isset($_SESSION['otp_verified']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = md5($_POST['new_password']); // Use a better hashing method like password_hash() in real-world apps
    $confirm_password = md5($_POST['confirm_password']);

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password does not match!')</script>";
    } else {
        // Update the password in the database and reset OTP fields
        $update = "UPDATE cake_shop_users_registrations SET users_password='$new_password', otp=NULL, otp_expiry=NULL WHERE users_id='$users_id'";
        mysqli_query($conn, $update);

        // Reset session variables
        unset($_SESSION['otp_verified']);
        unset($_SESSION['otp_sent']);

        // Provide feedback to the user and redirect to login
        echo "<script>alert('Password reset successfully!')</script>";
        header("Location: login_users.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html, body { background-color: white; height: 100%; }
    body { display: flex; align-items: center; padding-top: 20px; padding-bottom: 20px; }
    </style>
</head>
<body>
<div class="splash-container text-dark">
    <div class="card">
        <div class="card-header text-center">
            <a href="#"><h2 class="text-primary">MAHARAJA BAKERS & SWEETS</h2></a>
            <span class="splash-description">
                <?php echo isset($_SESSION['otp_verified']) ? "Reset Your Password" : "Enter OTP"; ?>
            </span>
        </div>
        <div class="card-body">
            <?php if (!isset($_SESSION['otp_verified'])): ?>
                <!-- OTP Form -->
                <form method="post">
                    <div class="form-group">
                        <label for="otp" style="font-size: 18px;">OTP:</label>
                        <input type="text" name="otp" required class="form-control form-control-lg">
                    </div>
                    <button type="submit" name="verify_otp" class="btn btn-primary btn-lg btn-block">Verify OTP</button>
                </form>
            <?php else: ?>
                <!-- Password Reset Form -->
                <form method="post">
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
            <?php endif; ?>
        </div>
        <div class="card-footer bg-white p-0">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="register.php" class="footer-link">Create An Account</a>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="login_users.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
