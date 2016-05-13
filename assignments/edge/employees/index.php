<?php
// Start the session
session_start();

// Check if the user is logged in
if ($_SESSION['login'] == "" || $_SESSION['login'] == NULL || $_SESSION['login'] == false) {
  header('Location: ../index.php');
}

// Connect to the model
require 'model/dbConnector.php';
$db = loadDatabase();
require 'model/work_days_db.php';
require 'model/customers_db.php';

// Index of actions
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {
  case "home":
    $work_days = get_work_days();
    include('home.php');
    break;
  case "get_customers_by_day":
    $work_day_id = filter_input(INPUT_POST, 'work_day_id');
    $customers = get_customers_by_day($work_day_id);
    include('customers.php');
    break;
  case "get_customers_by_name":
    $name = filter_input(INPUT_POST, 'name');
    $customers = get_customers_by_name($name);
    if ($customers == "" || $customers == NULL || empty($customers)) {
      $nameError = "No customers under that name";
      $work_days = get_work_days();
      include('home.php');
    } else {
      include('customers.php');
    }
    break;
  case "get_customers":
    $customers = get_customers();
    include('customers.php');
    break;
  case "log_out":
    $_SESSION['login'] = false;
    $_SESSION['username'] = NULL;
    $_SESSION['password'] = NULL;
    header('Location: ../index.php');
}

?>
