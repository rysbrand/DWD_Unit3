<?php

session_start();
require_once('models/database.php');
require_once('models/fields.php');
require_once('models/validate.php');
require_once('models/users_db.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('email', 'Must be a valid email address.');
$fields->addField('password', 'Must be at least 6 characters.');
$fields->addField('verify');
$fields->addField('first_name');
$fields->addField('last_name');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

if ($action === NULL) {
    if (empty($_SESSION['user_id'])) {
        $action = 'show_login';
    } 
    else {
        $action = 'show_dashboard';
    }
} 
else {
    $action = strtolower($action);
}

switch ($action) {

    case 'show_login':
        $email = '';
        $password = '';
        $login_message = $login_message ?? '';
        include 'views/login/login.php';
        break;

    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if (is_valid_user_login($email, $password)) {

            $user = get_user_by_email($email);

            $_SESSION['user_id'] = $user['userID'];
            $_SESSION['user_email'] = $email['emailAddress'];

            include 'views/home/dashboard.php';
        } else {
            $login_message = 'Invalid email or password.';
            include 'views/login/login.php';
        }
        break;

    case 'reset':
        $email = '';
        $password = '';
        $verify = '';
        $firstName = '';
        $lastName = '';       
        include 'views/login/register.php';
        break;

    case 'show_register':
        $email = '';
        $password = '';
        $verify = '';
        $firstName = '';
        $lastName = '';
        include 'views\login\register.php';
        break;

    case 'register':
        // Copy form values to local variables
        $email = trim(filter_input(INPUT_POST, 'email'));
        $password = filter_input(INPUT_POST, 'password');
        $verify = filter_input(INPUT_POST, 'verify');
        $firstName = trim(filter_input(INPUT_POST, 'first_name'));
        $lastName = trim(filter_input(INPUT_POST, 'last_name'));

        // Validate form data
        $validate->email('email', $email);
        $validate->password('password', $password);
        $validate->verify('verify', $password, $verify);
        $validate->text('first_name', $firstName);
        $validate->text('last_name', $lastName);

        add_user($email, $password, $firstName, $lastName);

        include 'views/login/success.php';
        break;

    case 'show_dashboard':
        if (empty($_SESSION['user_id'])) {
            $login_message = 'Please login first.';
            include 'views/login/login.php';
        } else {
            include 'views/home/dashboard.php';
        }
        break;

    case 'logout':
        $_SESSION = array();   // Clear all session data from memory
        session_destroy();     // Clean up the session ID
        $login_message = 'You have been logged out.';
        include('views/login/login.php');
        break;
    }
?>