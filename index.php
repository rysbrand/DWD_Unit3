<!-- </*?php
require('models/database.php');
require_once('views/header.php');
//models\database.php
$query = 'SELECT * FROM books
            ORDER BY bookID';
$statement = $db->prepare($query);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();

?>

<!DOCTYPE html>
<html>

<table>
    <th>bookID</th>
    <th>Title</th>
    <th>bookAuthor</th>
    &nbsp;*/
    </*?php foreach($books as $book) : ?>
        <tr>
            <td></*?php echo $book['bookID']; ?></td>
            <td></*?php echo $book['bookName']; ?></td>
            <td></*?php echo $book['bookAuthor']; ?></td>
        </tr>
        </*?php endforeach; ?>
    </table>
</html>
</*?php require_once('views/footer.php'); ?*/> -->

<?php
require_once('model/fields.php');
require_once('model/validate.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('email', 'Must be a valid email address.');
$fields->addField('password', 'Must be at least 6 characters.');
$fields->addField('verify');
$fields->addField('first_name');
$fields->addField('last_name');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = 'reset';
} else {
    $action = strtolower($action);
}

switch ($action) {
    case 'reset':
        $email = '';
        $password = '';
        $verify = '';
        $firstName = '';
        $lastName = '';
        
        include 'view/register.php';
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


        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/index.php';
        }
        break;
}
?>