<?php include 'views/header.php';
//taking this out so the app actually works
//require_once('util/secure_conn.php'); ?>

<main>
    <form action="." method="post" >
        <input type="hidden" name="action" value="register">
        <fieldset>
            <legend>User Information</legend>

            <label>First Name:</label>
            <input type="text" name="first_name"
                value="<?php echo htmlspecialchars($firstName);?>">
            <?php echo $fields->getField('first_name')->getHTML(); ?><br>
            
            <label>Last Name:</label>
            <input type="text" name="last_name"
                value="<?php echo htmlspecialchars($lastName);?>">
            <?php echo $fields->getField('last_name')->getHTML(); ?><br>

            <label>E-mail:</label>
            <input type="text" name="email"
                value="<?php echo htmlspecialchars($email);?>">
            <?php echo $fields->getField('email')->getHTML(); ?><br>

            <label>Password:</label>
            <input type="password" name="password" 
               value="<?php echo htmlspecialchars($password);?>"><br>

            <label>Verify Password:</label>
            <input type="password" name="verify" 
               value="<?php echo htmlspecialchars($verify);?>">
        </fieldset>
        <fieldset>
            <legend>Submit Registration</legend>

            <label>&nbsp;</label>
            <input type="submit" value="register"/>
             <button type="reset">Clear Form</button><br>
        </fieldset>
    </form>
</main>
<?php include './views/footer.php';?>