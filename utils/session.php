<?php

declare(strict_types=1);

session_start();

class Session{
    public function __construct(){
        if(!isset($_SESSION['messages'])){
            $_SESSION['messages'] = array();
        }
    }

    public function isLoggedIn() : bool{
        return isset($_SESSION['id']);
    }

    public function logout(){
        session_destroy();
    }

    public function getId() : ?int {
        if(isset($_SESSION['id']))
            return $_SESSION['id'];

        return null;
    }

    public function setId(int $id) {
        $_SESSION['id'] = $id;
    }

    //In order to display messages in case of authentication error

    public function addMessage(string $type, string $text) {
        $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
        return $_SESSION['messages'];
    }

    public function clearMessages() {
        $_SESSION['messages'] = array();
    }

}

?>