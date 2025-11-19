<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'My DWDUnit3 App'; ?></title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<nav>
    <a href="index.php?action=show_login">Login</a>

    <?php if (!empty($_SESSION['user_id'])): ?>
        <a href="index.php?action=show_dashboard">Dashboard</a>
        <a href="index.php?action=show_account">My Account</a>
        <a href="index.php?action=logout">Logout</a>
    <?php endif; ?>
</nav>

<div class="container">
