<?php
    require 'functions.php';

    $_SESSION = [];

    session_start();
    session_unset();
    session_destroy();
    header('Location: sign-in.php');
?>