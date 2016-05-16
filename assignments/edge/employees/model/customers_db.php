<?php

// Search customers by work day
function get_customers_by_day($work_day_id) {
  global $db;
  $query = 'SELECT * FROM customers
            WHERE work_day_id = :work_day_id';
  $statement = $db->prepare($query);
  $statement->bindValue(":work_day_id", $work_day_id);
  $statement->execute();
  $customers = $statement->fetchAll();
  $statement->closeCursor();
  return $customers;
}

// Search customers by city
function get_customers_by_name($name) {
  global $db;
  $query = 'SELECT * FROM customers
            WHERE name = :name';
  $statement = $db->prepare($query);
  $statement->bindValue(":name", $name);
  $statement->execute();
  $customers = $statement->fetchAll();
  $statement->closeCursor();
  return $customers;
}

// Get all customers
function get_customers() {
  global $db;
  $query = 'SELECT * FROM customers';
  $statement = $db->prepare($query);
  $statement->execute();
  $customers = $statement->fetchAll();
  $statement->closeCursor();
  return $customers;
}

// Get customer by ID
function get_customer_by_id($customer_id) {
  global $db;
  $query = 'SELECT * FROM customers
            WHERE customer_id = :customer_id';
  $statement = $db->prepare($query);
  $statement->bindValue(":customer_id", $customer_id);
  $statement->execute();
  $customer = $statement->fetch();
  $statement->closeCursor();
  return $customer;
}

// Add customer
function add_customer($customer_work_day_id, $customer_name, $customer_street_address, $customer_city, $customer_state, $customer_zip_code,
$customer_phone_number, $customer_comments) {
  global $db;
  $query = 'INSERT INTO customers
               (customer_id, work_day_id, name, street_address, city, state, zip_code, phone_number, comments)
            VALUES
               (NULL, :work_day_id, :name, :street_address, :city, :state, :zip_code, :phone_number, :comments)';
  $statement = $db->prepare($query);
  $statement->bindValue(':work_day_id', $customer_work_day_id);
  $statement->bindValue(':name', $customer_name);
  $statement->bindValue(':street_address', $customer_street_address);
  $statement->bindValue(':city', $customer_city);
  $statement->bindValue(':state', $customer_state);
  $statement->bindValue(':zip_code', $customer_zip_code);
  $statement->bindValue(':phone_number', $customer_phone_number);
  $statement->bindValue(':comments', $customer_comments);
  $statement->execute();
  $statement->closeCursor();
}

// Delete customer
function delete_customer($customer_id) {
  global $db;
  $query = 'DELETE FROM customers
            WHERE customer_id = :customer_id';
  $statement = $db->prepare($query);
  $statement->bindValue(':customer_id', $customer_id);
  $statement->execute();
  $statement->closeCursor();
}

// Edit customer
function edit_customer($customer_id, $edit_work_day_id, $edit_name, $edit_street_address, $edit_city, $edit_state, $edit_zip_code,
$edit_phone_number, $edit_comments) {
    global $db;
    $query = 'UPDATE customers
              SET work_day_id = :work_day_id
              , name = :name
              , street_address = :street_address
              , city = :city
              , state = :state
              , zip_code = :zip_code
              , phone_number = :phone_number
              , comments = :comments
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':work_day_id', $edit_work_day_id);
    $statement->bindValue(':name', $edit_name);
    $statement->bindValue(':street_address', $edit_street_address);
    $statement->bindValue(':city', $edit_city);
    $statement->bindValue(':state', $edit_state);
    $statement->bindValue(':zip_code', $edit_zip_code);
    $statement->bindValue(':phone_number', $edit_phone_number);
    $statement->bindValue(':comments', $edit_comments);
    $statement->execute();
    $statement->closeCursor();
}
?>
