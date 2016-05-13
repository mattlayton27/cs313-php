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
?>
