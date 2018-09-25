<?php
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once '../google-api-php-client/Google_Client.php';
require_once '../google-api-php-client/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '316833584473-k5sdvul6072delitfcdpkqoik8j1ocmb.apps.googleusercontent.com'; 
$clientSecret = 'egoNt7Ac0am5aiApZ0_Jh5UY'; 
$redirectURL = 'http://localhost/google'; //Callback URL

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to System OverDrive');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);