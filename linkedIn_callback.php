<?php
require("connection.php") ;
session_start();


// LinkedIn App credentials
$clientId = '77qvnljipnmcy2';
$clientSecret = '7tx32h4OsB2aDwOB';
$redirectUri = 'http://localhost/testcase/admin/linkedin_callback.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Exchange authorization code for access token
    $token_url = 'https://www.linkedin.com/oauth/v2/accessToken';
    $token_params = [
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirectUri,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
    ];

    $token_request = curl_init($token_url);
    curl_setopt($token_request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($token_request, CURLOPT_POST, true);
    curl_setopt($token_request, CURLOPT_POSTFIELDS, http_build_query($token_params));
    $token_response = curl_exec($token_request);
    curl_close($token_request);
     //echo. $token_response .'';
    $access_token = json_decode($token_response)->access_token;

    // Get user details using the access token
    $profile_url = 'https://api.linkedin.com/v2/userinfo';
    $profile_request = curl_init($profile_url);
    curl_setopt($profile_request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($profile_request, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $access_token]);
    $profile_response = curl_exec($profile_request);

    curl_close($profile_request);
    //$decodeData = json_decode($jsonString, true);
    $profile_data = json_decode($profile_response, true);
    ///echo $profile_data['sub'];die();


    $id_provider = $profile_data['sub'];
    $firstname = $profile_data['given_name'];
    $lastname  = $profile_data['family_name'];
    $email  = $profile_data['email'];
    
    $query = "select * from users where user_name='$email'";
    $run = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($run) == 0) {

        $query = "INSERT INTO `users`(`fname`, `lname`, `user_name`, `password`, `cpassword`, `social_userid`) VALUES ('$firstname','$lastname','$email','12345','12345', '$id_provider')";
        $run = mysqli_query($con, $query) or die(mysqli_error($con));
        if ($run == true) {
            //sendemail_varify($fname, $user_name, $varify_token);
            // echo "Your data has been submittedd";
            $_SESSION['uname'] = $email;
            $_SESSION['pass'] = 12345;
            header('location:home.php');
            //header('location: index.php');
        }

    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['user_name'];
        $password = $data['password'];

        if ($email == $id) {
            $_SESSION['uname'] = $id;
            $_SESSION['pass'] = $password;
            header('location:home.php');
        } else {
            echo "<center><h1 style='color:red'>Invalid user name or password<h1></center>";
        }
    }

}
    // Process and use $profile_data as needed for login or user information
    //var_dump($profile_data);



?>
