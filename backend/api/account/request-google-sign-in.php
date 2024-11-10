<?php
  include ('../config.php');
  require_once ('../../assets/vendor/google-oauth/vendor/autoload.php');
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  // Google oAuth Initialize
  $client = new Google_Client();
  $client->setClientId('104458844677-uvj7eo80ufvo6cimqoa3jr4s2rldoje2.apps.googleusercontent.com');
  $client->setClientSecret('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');
  $client->setRedirectUri('http://localhost/google-login-redirect');
  $client->addScope("email");
  $client->addScope("profile");
  $client->addScope("https://www.googleapis.com/auth/user.addresses.read");
  $client->addScope("https://www.googleapis.com/auth/user.birthday.read");
  $client->addScope("https://www.googleapis.com/auth/user.gender.read");
  $client->addScope("https://www.googleapis.com/auth/user.phonenumbers.read");

  $google_url = $client->createAuthUrl();
  echo json_encode(["status" => "success", "data" => $google_url]);
?>