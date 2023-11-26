<?php
// verify.php
include("connection.php");

// Your database connection logic here

if (isset($_GET['token'])) {
    $verificationToken = $_GET['token'];

    // Update the user's is_verified status in the database
    $sql = "UPDATE users SET is_verified = 1 WHERE verification_token = '$verificationToken'";

    if ($con->query($sql) === TRUE) {
        echo "Account verification successful! You can now log in.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
} else {
    echo "Invalid verification token.";
}
?>
