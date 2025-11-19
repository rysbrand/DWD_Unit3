<?php

function add_user($email, $password, $firstName, $lastName, ) {
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = '
    INSERT INTO users (emailAddress, password, firstName, lastName)
        VALUES (:email, :password, :first_name, :last_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':first_name', $firstName);
    $statement->bindValue(':last_name', $lastName);
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

    if (!$row || empty($row['password'])) {
        return false;
    }

    $hash = $row['password'];
    return password_verify($password, $hash);
}

function get_user_by_email($email) {
    global $db;
    $query = '
        SELECT *
        FROM users
        WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    return $user ?: null;
}

?>