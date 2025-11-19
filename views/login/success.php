<?php include 'header.php'; ?>
<main>
    <h2>Success</h2>
    <p>The following registration information has been successfully
       submitted.</p>
    <ul>
        <li>Email: <?php echo htmlspecialchars($email); ?></li>
        <li>First Name: <?php echo htmlspecialchars($firstName); ?></li>
        <li>Last Name: <?php echo htmlspecialchars($lastName); ?></li>
    </ul>
</div>
<?php include 'footer.php'; ?>