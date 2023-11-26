<?php
require "connection.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['register'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $verificationToken = bin2hex(random_bytes(32));

    //cooment
    $select_query = "select user_name from users where user_name='$user_name' limit 1";

    $select_query_run = mysqli_query($con, $select_query);
    //echo $select_query_run; die();
    if (mysqli_num_rows($select_query_run) > 0) {
        $_SESSION["status"] = "Aready registered wuth us";
?>
        <script>
            alert("You have already registeres with us");
        </script>
<?php exit;
    } else {
        $query = "INSERT INTO `users`(`fname`, `lname`, `user_name`, `password`, `cpassword`, `verificationToken`) VALUES ('$fname','$lname','$user_name','$password','$cpassword', '$verificationToken')";
        $run = mysqli_query($con, $query) or die(mysqli_error($con));
        if ($run == true) {

            //sendemail_varify($fname, $user_name, $varify_token);
            echo "Your data has been submittedd";
            //header('location: index.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="register">
        <div class="container">
            <h2>Register Here</h2>
            <div class="login-form-grids">
                <h6>Login information</h6>
                <form action="registered.php" method="post" onsubmit="return validateForm()">
                    <input type="text" name="fname" id="fname" placeholder="First Name..." required>
                    <input type="text" name="lname" id="lname" placeholder="Last Name..." required>



                    <input type="email" name="user_name" id="user_name" placeholder="Email Address" required>
                    <span id="email_error" style="color: red;"></span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Password Confirmation" required>
                    <span id="password_error" style="color: red;"></span>
                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                        </div>
                    </div>
                    <input type="submit" name="register" value="Register">
                </form>
            </div>
            <div class="register-home">
                <a href="index.php">Home</a>
            </div>
        </div>
    </div>
</body>
<script>
    function validateForm() {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('cpassword').value;
        var password_error = document.getElementById('password_error');

        if (password !== confirm_password) {
            password_error.innerHTML = 'Password and Confirm Password do not match.';
            return false;
        } else {
            password_error.innerHTML = '';
            return true;
        }

        var email = document.getElementById('user_name').value;
        var email_error = document.getElementById('email_error');

        // Regular expression for basic email validation
        var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!email_regex.test(email)) {
            email_error.innerHTML = 'Invalid email address.';
            return false;
        } else {
            email_error.innerHTML = '';
            return true;
        }
    }
</script>
<script src="https://unpkg.com/cropperjs"></script>
<script src="register.js"></script>

</html>