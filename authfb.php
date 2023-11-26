<?php
require "connection.php";
session_start();
if (isset($_GET['token'])) {

    $authtooth = $_GET['token'];
    //die()
    $url = 'https://graph.facebook.com/me?fields=birthday,email,hometown,name,link&access_token=' . $authtooth; // Replace with your API endpoint
    $headers = [

        'Content-Type: application/json', // Example content type header
        'Accept: application/json', // Example content type header
    ];

    $options = [
        'http' => [
            'header' => implode("\r\n", $headers),
            'method' => 'GET',
            // You can add more options like timeout, etc., if needed
        ],
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    if ($response === false) {
        // Handle error here
        echo "Error fetching data.";
    } else {
        // Process $response
        //$jsonString = var_dump($response); // Example: Display the response
        $jsonString = $response;
        $decodeData = json_decode($jsonString, true);
        if ($decodeData === null && json_last_error() !== JSON_ERROR_NONE) {
            // Handle JSON decoding error
            echo "Error decoding JSON: " . json_last_error_msg();
        } else {
            /*   echo $decodeData['email'];
            echo $decodeData['name'];
            echo $decodeData['id']; */
            $uname = $decodeData['email'];
            $name = $decodeData['name'];
            $id = $decodeData['id'];
            $query = "select * from users where user_name='$uname'";
            $run = mysqli_query($con, $query) or die(mysqli_error($con));

            if (mysqli_num_rows($run) == 0) {

                $query = "INSERT INTO `users`(`fname`, `lname`, `user_name`, `password`, `cpassword`, `social_userid`) VALUES ('$name','','$uname','12345','12345', '$id')";
                $run = mysqli_query($con, $query) or die(mysqli_error($con));
                if ($run == true) {
                    //sendemail_varify($fname, $user_name, $varify_token);
                    // echo "Your data has been submittedd";
                    $_SESSION['uname'] = $uname;
                    $_SESSION['pass'] = 12345;
                    header('location:home.php');
                    //header('location: index.php');
                }

            } else {
                $data = mysqli_fetch_assoc($run);
                $id = $data['user_name'];
                $password = $data['password'];

                if ($uname == $id) {
                    $_SESSION['uname'] = $id;
                    $_SESSION['pass'] = $password;
                    header('location:home.php');
                } else {
                    echo "<center><h1 style='color:red'>Invalid user name or password<h1></center>";
                }
            }

        }
        // echo $response;  die();

    }

}
