<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <center>
        <h2>Admin Login</h2>
    </center>
    <form method="post" class="modal-content animate" action="login.php">
        <div class="container">
            <label for="user_name"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="user_name" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" name="sub" value="abc">Login</button>
        </div>
        <h4>For New People</h4>
        <p><a href="registered.php">Register Here</a> (Or) Login via <a href="#" onclick="facebookLogin()">Facebook</a> <a href="linkedin_login.php">Login with LinkedIn</a></p>

        <div class="container" style="background-color:#f1f1f1">

        </div>
    </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Initialize the Facebook SDK with your App ID
        window.fbAsyncInit = function() {
            FB.init({
                appId: '750283865112918',
                cookie: true,
                xfbml: true,
                version: 'v13.0' // Use the latest version available
            });
        };

        // Function to handle Facebook login
        function facebookLogin() {
            FB.login(function(response) {
                if (response.authResponse) {
                    // User authorized your app
                    // Access token can be retrieved using: response.authResponse.accessToken
                    console.log('Access Token:', response.authResponse.accessToken);
                    console.log('Access Token:', response);
                    //window.location.href="http://localhost/testcase/admin/authfb.php?token=" + response.authResponse.accessToken;
                    location.replace("http://localhost/testcase/admin/authfb.php?token=" + response.authResponse.accessToken);
                } else {
                    // User cancelled login or did not authorize your app
                    console.log('Login cancelled.');
                }
            }, {
                scope: 'email'
            }); // Specify the permissions you need
        }
    </script>

</body>

</html>