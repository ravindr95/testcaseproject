<?php
// otp_verification.php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify the entered OTP
    $userEnteredOTP = $_POST['otp'];
    $actualOTP = $_SESSION['otp'];
    $email = $_SESSION['user_name'];

    if ($userEnteredOTP === $actualOTP) {
        // OTP verification successful, proceed with registration

        // Save user details in the database or perform other registration logic
        // ...

        echo 'Registration successful!';
        
        // Clear session variables
        unset($_SESSION['otp']);
        unset($_SESSION['user_name']);
    } else {
        echo 'Invalid OTP. Please try again.';
    }
}
?>

<!-- otp_verification.html -->
<form action="otp_verification.php" method="post">
    <label for="otp">Enter OTP:</label>
    <input type="text" name="otp" required>

    <button type="submit">Verify OTP</button>
</form>
