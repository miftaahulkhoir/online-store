<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['nama']);
    unset($_SESSION['level']);

    header("Location: index.php");
?>
/**
 * Created by PhpStorm.
 * User: mmdc
 * Date: 1/30/18
 * Time: 11:31 PM
 */