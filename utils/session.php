<?php

declare(strict_types=1);

class Session{

    private array $messages;

    public function __construct(){
        session_start();

        $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
        unset($_SESSION['messages']);
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

    public function getName() : ?string{
        if(isset($_SESSION['name']))
            return $_SESSION['name'];

        return null;
    }

    public function setId(int $id) {
        $_SESSION['id'] = $id;
    }

    public function setName(string $name){
        $_SESSION['name'] = $name;
    }

    //In order to display messages in case of authentication error

    public function addMessage(string $type, string $text) {
        $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
        return $this->messages;
    }

    public function clearMessages() {
        $_SESSION['messages'] = array();
    }

}

?>