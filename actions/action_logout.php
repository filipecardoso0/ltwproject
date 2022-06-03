<?php

    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    if($session->isLoggedIn())
        $session->logout();

    //Goes back to main page
    header('Location: ../index.php');
?>