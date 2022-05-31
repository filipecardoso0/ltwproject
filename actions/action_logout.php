<?php

    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    if($session->isLoggedIn())
        $session->logout();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>