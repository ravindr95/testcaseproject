<?php
session_start();

// LinkedIn App credentials
$clientId = '77qvnljipnmcy2';
$clientSecret = '7tx32h4OsB2aDwOB';
$redirectUri = 'http://localhost/testcase/admin/linkedin_callback.php';

// LinkedIn API URLs
$authorizeUrl = 'https://www.linkedin.com/oauth/v2/authorization';
$tokenUrl = 'https://www.linkedin.com/oauth/v2/accessToken';
$apiUrl = 'https://api.linkedin.com/v2/me';

// LinkedIn API scopes (permissions)
//$scopes = ['r_liteprofile', 'r_emailaddress'];
//$scopes = ['emailaddress'];
// Build the authorization URL
$scope = ['email', 'profile', 'openid'];

$authorizeUrl .= '?client_id=' . $clientId;
$authorizeUrl .= '&redirect_uri=' . urlencode($redirectUri);
$authorizeUrl .= '&scope=' . urlencode(implode(' ', $scope));
$authorizeUrl .= '&response_type=code&state=' . bin2hex(random_bytes(16));

// Redirect the user to the LinkedIn authorization URL
// echo $authorizeUrl; exit();
header('Location: ' . $authorizeUrl);
exit;
?>
