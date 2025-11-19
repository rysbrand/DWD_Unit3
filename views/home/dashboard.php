<?php
require('models/database.php');
require_once('views/header.php');

$query = 'SELECT * FROM books
            ORDER BY bookID';
$statement = $db->prepare($query);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();

?>
<main>
    <h1>Books in Database</h1>
<table>
    <th>bookID</th>
    <th>Title</th>
    <th>bookAuthor</th>
    <th>&nbsp;</th>
    <?php foreach($books as $book) : ?>
        <tr>
            <td><?php echo $book['bookID']; ?></td>
            <td><?php echo $book['bookName']; ?></td>
            <td><?php echo $book['bookAuthor']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

<?php require_once('views/footer.php'); ?>
