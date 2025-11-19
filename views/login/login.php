<?php 
//taking this out so this app actually works on localhost
//require_once('util/secure_conn.php');
?>
<main>
        <main>
            <h1>Login</h1>

            <?php if (!empty($login_message)) : ?>
                <p class="error"><?= htmlspecialchars($login_message) ?></p>
            <?php endif; ?>

            <form action="." method="post" id="login_form" class="aligned">
                <input type="hidden" name="action" value="login">

                <label>Email:</label>
                <input type="text" class="text" name="email" id="email">
                <br>

                <label>Password:</label>
                <input type="password" class="text" name="password" id="password">
                <br>

                <label>&nbsp;</label>
                <input type="submit" value="login">
            </form>

        <p class="mt-20"> Need an account? <a href="index.php?action=show_register">Register here</a></p>
</main>

<?php include 'views\footer.php' ?>