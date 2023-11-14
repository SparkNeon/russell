<?php

session_start();

unset($_SESSION['logged_in']);
unset($_SESSION['account_type']);
unset($_SESSION['username']); 

setcookie(session_name(), "", time() - 360);
session_destroy();


// Redirect to index
header("Location: index.php");

?>