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
    exit();
    break;
  case "get_customers_by_day":
    $work_day_id = filter_input(INPUT_POST, 'work_day_id');
    $customers = get_customers_by_day($work_day_id);
    include('customers.php');
    exit();
    break;
  case "get_customers_by_name":
    $name = filter_input(INPUT_POST, 'name');
    $customers = get_customers_by_name($name);
    if ($customers == "" || $customers == NULL || empty($customers)) {
      $nameError = "No customers under that name";
      $work_days = get_work_days();
      include('home.php');
      exit();
    } else {
      include('customers.php');
      exit();
    }
    break;
  case "get_customers":
    $customers = get_customers();
    include('customers.php');
    exit();
    break;
  case "add_customer":
    $customer_work_day_id = filter_input(INPUT_POST, 'customer_work_day_id');
    $customer_name = filter_input(INPUT_POST, 'customer_name');
    $customer_street_address = filter_input(INPUT_POST, 'customer_street_address');
    $customer_city = filter_input(INPUT_POST, 'customer_city');
    $customer_state = filter_input(INPUT_POST, 'customer_state');
    $customer_zip_code = filter_input(INPUT_POST, 'customer_zip_code');
    $customer_phone_number = filter_input(INPUT_POST, 'customer_phone_number');
    $customer_comments = filter_input(INPUT_POST, 'customer_comments');
    if (empty($customer_work_day_id) || empty($customer_name) || empty($customer_street_address) || empty($customer_city)
    || empty($customer_state) || empty($customer_zip_code) || empty($customer_phone_number)) {
      $addError = "Do not leave any fields blank";
      $work_days = get_work_days();
      include('home.php');
      exit();
    }
    try {
      add_customer($customer_work_day_id, $customer_name, $customer_street_address, $customer_city, $customer_state, $customer_zip_code,
      $customer_phone_number, $customer_comments);
      $addedCustomer = "Added a new customer";
      $work_days = get_work_days();
      include('home.php');
      exit();
    } catch(Exception $e) {
      $addError = "An error occured";
      $work_days = get_work_days();
      include('home.php');
      exit();
    }
    break;
  case "delete_customer":
    $customer_id = filter_input(INPUT_POST, 'customer_id');
    delete_customer($customer_id);
    $changed_customer = "Customer deleted";
    $work_days = get_work_days();
    include('home.php');
    exit();
    break;
  case "edit_customer_page":
    $customer_id = filter_input(INPUT_POST, 'customer_id');
    $customer = get_customer_by_id($customer_id);
    $work_days = get_work_days();
    include('edit_customer.php');
    exit();
    break;
  case "edit_customer":
    $customer_id = filter_input(INPUT_POST, 'customer_id');
    $edit_work_day_id = filter_input(INPUT_POST, 'edit_work_day_id');
    $edit_name = filter_input(INPUT_POST, 'edit_name');
    $edit_street_address = filter_input(INPUT_POST, 'edit_street_address');
    $edit_city = filter_input(INPUT_POST, 'edit_city');
    $edit_state = filter_input(INPUT_POST, 'edit_state');
    $edit_zip_code = filter_input(INPUT_POST, 'edit_zip_code');
    $edit_phone_number = filter_input(INPUT_POST, 'edit_phone_number');
    $edit_comments = filter_input(INPUT_POST, 'edit_comments');
    if (empty($customer_id) || empty($edit_work_day_id) || empty($edit_name) || empty($edit_street_address) || empty($edit_city)
    || empty($edit_state) || empty($edit_zip_code) || empty($edit_phone_number)) {
      $edit_error = "Do not leave any fields blank";
      $customer_id = filter_input(INPUT_POST, 'customer_id');
      $work_days = get_work_days();
      $customer = get_customer_by_id($customer_id);
      include('edit_customer.php');
      exit();
    }
    try {
      edit_customer($customer_id, $edit_work_day_id, $edit_name, $edit_street_address, $edit_city, $edit_state, $edit_zip_code,
    $edit_phone_number, $edit_comments);
      $changed_customer = "Edited customer <b>" . $edit_name . "</b>";
      $work_days = get_work_days();
      include('home.php');
      exit();
    } catch (Exception $e) {
      $edit_error = "An error occured";
      $customer_id = filter_input(INPUT_POST, 'customer_id');
      $work_days = get_work_days();
      $customer = get_customer_by_id($customer_id);
      include('edit_customer.php');
      exit();
    }
    break;
  case "log_out":
    $_SESSION['login'] = false;
    $_SESSION['username'] = NULL;
    $_SESSION['password'] = NULL;
    header('Location: ../index.php');
    break;
}

?>
