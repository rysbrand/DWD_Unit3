<?php
include 'views/header.php';
?>

<main>
    <h1>My Account</h1>

    <form action="index.php" method="post" class="aligned">
        <input type="hidden" name="action" value="update_account">

        <fieldset>
            <legend>Account Information</legend>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name"
                   value="<?= htmlspecialchars($firstName ?? '') ?>">
            <?= $fields->getField('first_name')->getHTML(); ?><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name"
                   value="<?= htmlspecialchars($lastName ?? '') ?>">
            <?= $fields->getField('last_name')->getHTML(); ?><br>

            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email"
                   value="<?= htmlspecialchars($email ?? '') ?>">
            <?= $fields->getField('email')->getHTML(); ?><br>
        </fieldset>

        <fieldset>
            <legend>Save Changes</legend>
            <label>&nbsp;</label>
            <input type="submit" value="Update Account">
        </fieldset>
    </form>
</main>

<?php include 'views/footer.php'; ?>