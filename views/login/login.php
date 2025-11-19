<?php 
require_once('../util/secure_conn.php');
?>
<main>
    <form action="." method="post" id="login_form" class="aligned">
        <fieldset>
        <main>
            <h1>Login</h1>

            <form action="." method="post" id="login_form" class="aligned">
                <input type="hidden" name="action" value="login">

                <label>Email:</label>
                <input type="text" class="text" name="email">
                <br>

                <label>Password:</label>
                <input type="password" class="text" name="password">
                <br>

                <label>&nbsp;</label>
                <input type="submit" value="Login">
    </form>

    <p><?php echo $login_message; ?></p>
</main>

<?php include 'footer.php' ?>