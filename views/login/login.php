<?php 
require_once('../util/secure_conn.php');
?>
<main>
    <form action="." method="post" >
        <fieldset>
            <legend>Login</legend>

            <label>E-mail:</label>
            <input type="text" name="email"
                value="<?php echo htmlspecialchars($email);?>">
            <?php echo $fields->getField('email')->getHTML(); ?><br>

            <label>Password:</label>
            <input type="password" name="password" 
               value="<?php echo htmlspecialchars($password);?>">
            <?php echo $fields->getField('password')->getHTML(); ?><br>

        </fieldset>
        <fieldset>
            <legend>Enter</legend>

            <label>&nbsp;</label>
            <input type="submit" name="action" value="Login"/>
            <input type ="submit" name="action" value="Reset" /><br>
        </fieldset>
    </form>
</main>

<?php include 'footer.php' ?>