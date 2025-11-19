<?php
require('models/database.php');
//require_once('util/secure_conn.php');
//require_once('util/valid_admin.php');
require_once('views/header.php');

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
    <?php foreach($books as $book) : ?>
        <tr>
            <td><?php echo $book['bookID']; ?></td>
            <td><?php echo $book['bookName']; ?></td>
            <td><?php echo $book['bookAuthor']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</html>
<?php require_once('views/footer.php'); ?>
