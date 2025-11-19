<?php
require_once('models/database.php');
require_once('models/admin_db.php');

if(!isset($_SESSION['is_valid_admin'])) {
    header("Location: ." );
}
?>