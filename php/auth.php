<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: custom.php');
} else {
    header('Location: login.php');
}
?>