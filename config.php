<?php
session_start();

// Facebook App credentials
$fbAppId = '713047443757204';
$fbAppSecret = '338105dc8833c47fdb0f6dbf4b93e1ed';
$fbRedirectURL = 'http://localhost/testcase/admin/fb-callback.php'; // Redirect URL after Facebook login

// Facebook Graph API endpoint
$fbGraphURL = 'https://graph.facebook.com/v12.0/';

?>