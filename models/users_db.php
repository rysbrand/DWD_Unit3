<?php

function add_user($email, $password) {
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO users (emailAddress, password)
              VALUES (:email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();
}

function is_valid_user_login($email, $password) {
    global $db;
    $query = 'SELECT password FROM users
              WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['password'];
    return password_verify($password, $hash);
}

?>