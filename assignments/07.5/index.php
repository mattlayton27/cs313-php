<?php
// start the session
session_start();

// connect to the model
require 'dbConnector.php';
$db = loadDatabase();
require 'users_db.php';
require 'password.php';

// index of actions
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'sign_in_page';
    }
}

// check if logged in
if (!empty($_SESSION['logged_in'])) {
  if ($_SESSION['logged_in'] == true) {
    $action = 'homepage';
  }
}

switch ($action) {
  case "sign_in_page":
    include('sign-in.php');
    exit();
    break;
  case "sign_up_page":
    include('sign-up.php');
    exit();
    break;
  case "sign_in":
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    try {
      $user = get_user($username);
    } catch (Exception $e) {
      $error = "Can't get user";
      include('sign-in.php');
      exit();
    }
    $hashed_password = $user['password'];
    if (password_verify($password, $hashed_password)) {
      $_SESSION['username'] = $username;
      $_SESSION['logged_in'] = true;
      include('homepage.php');
      exit();
    } else {
      $error = "Invalid Login";
      include('sign-in.php');
      exit();
    }
    break;
  case "sign_up":
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if(!empty($username) || !empty($password)) {
      sign_up($username, $hashed_password);
      include('sign-in.php');
      exit();
    } else {
      $error = "Do not leave fields empty";
      include('sign-up.php');
    }
    break;
  case "homepage":
    include('homepage.php');
    exit();
    break;
}

?>
