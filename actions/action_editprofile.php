<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    $db = getDatabaseConnection();

    $id = $_POST['id'];
    $type = $_POST['type'];
    $value = $_POST['value'];

    $field = null;

    if($type === "username"){
        //We have to verify first if username already exists
        $ver = $db->prepare("SELECT IdUser FROM User Where Username = ?");
        $ver->execute(array($value));

        if($ver->fetch() != null)
            $session->addMessage('error', 'Username already taken');
        else{
            $stmt = $db->prepare("UPDATE User SET Username = ? WHERE IdUser = ?");
            $field = 'Username Field ';
        }
    }
    else if($type === "password"){
        //We have to hash the value first once we are dealing with passwords
        $value = hash('sha256', $value);

        $stmt = $db->prepare("UPDATE User SET Password = ? WHERE IdUser = ?");
        $field = 'Password Field ';
    }
    else if($type === "address"){
        $stmt = $db->prepare("UPDATE User SET Address = ? WHERE IdUser = ?");
        $field = 'Address Field ';
    }
    else if($type === "phonenumber"){
        //We have to verify first if phonenumber already exists
        $ver = $db->prepare("Select IdUser From User Where Phonenumber = ?");
        $ver->execute(array($value));

        if($ver->fetch() != null)
            $session->addMessage('error', 'Phone Number already exists');
        else{
            $stmt = $db->prepare("UPDATE User SET Phonenumber = ? WHERE IdUser = ?");
            $field = 'Phone Number Field ';
        }
    }

    if($stmt->execute(array($value, $id))){
        $session->addMessage('success', $field . 'edited succesfully');
    }
    else{
        $session->addMessage('error', 'ERROR: Something went wrong!');
    }

?>
