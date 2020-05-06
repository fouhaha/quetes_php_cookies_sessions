<?php
session_start();
// remove all session variables
session_unset();
unset($_SESSION);

// destroy the session
session_destroy();

foreach ($_COOKIE as $cookie_name => $cookie_value) {
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, "", time() -4200, "/");
}

header('location: /login.php');

