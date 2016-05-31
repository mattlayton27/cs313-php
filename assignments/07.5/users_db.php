<?php
function sign_up($username, $hashed_password) {
  global $db;
  $query = 'INSERT INTO users
               (user_id, username, password)
            VALUES
               (NULL, :username, :password)';
  $statement = $db->prepare($query);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':password', $hashed_password);
  $statement->execute();
  $statement->closeCursor();
}

function get_user($username) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}
?>
