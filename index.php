<?php
require('models/database.php');
require_once('views/header.php');
//models\database.php
$query = 'SELECT * FROM product
            ORDER BY bookID';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

?>

<!DOCTYPE html>
<html>

<table>
    &nbsp;
    <?php foreach($products as $product) : ?>
        <tr>
            <td><?php echo $product['bookID']; ?></td>
            <td><?php echo $product['bookName']; ?></td>
            <td><?php echo $product['bookAuthor']; ?></td>
            <td><?php echo $product['bookPrice']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</html>
<?php require_once('views/footer.php'); ?>