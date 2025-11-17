<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'My DWDUnit3 App'; ?></title>
    <link rel="stylesheet" href="views/main.css">
</head>
<body>

<nav>
    <a href="/login">Login</a>

    <?php if (!empty($_SESSION['user_id'])): ?>
        <a href="/dashboard">Dashboard</a>
        <a href="/logout">Logout</a>
    <?php endif; ?>
</nav>

<div class="container">
