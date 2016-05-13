<?php
// start the session
session_start();

// connect to the model
require 'model/dbConnector.php';
$db = loadDatabase();
require 'model/employees_db.php';

// index of actions
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {
  case "home":
    include('home.php');
    break;
  case "Login":
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $login = employee_login($username, $password);
    if ($login != NULL || $login != "") {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['login'] = true;
      header('Location: employees/index.php');
    } else {
      $errorMessage = "Invalid Login";
      include('home.php');
    }
    break;
}

?>
