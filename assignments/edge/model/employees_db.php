<?php
function employee_login($username, $password) {
    global $db;
    $query = 'SELECT name FROM employees
              WHERE name = :username
              AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $login = $statement->fetch();
    $statement->closeCursor();
    return $login;
}
?>
