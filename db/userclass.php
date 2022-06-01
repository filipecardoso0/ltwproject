<?php

    declare(strict_types = 1);

    class User {
        public int $id;
        public string $name;
        public string $username;
        public string $address;
        public int $phonenumber;

        public function __construct(int $id, string $name, string $username, string $address, int $phonenumber){
            $this->id = $id;
            $this->name = $name;
            $this->username = $username;
            $this->address = $address;
            $this->phonenumber = $phonenumber;
        }


        static function getUserWithPassword(PDO $db, string $username, string $password) : ?User{
            $stmt = $db->prepare('Select IdUser, Name, Username, Address, Phonenumber FROM User WHERE Username = ? AND Password = ?');
            $stmt->execute(array($username, hash('sha256', $password)));

            if($user = $stmt->fetch())
                return new User((int)$user['IdUser'], $user['Name'], $user['Username'], $user['Address'], (int)$user['Phonenumber']);
            else
                return null;
        }

        static function getUserWithId(PDO $db, int $userid) :?User{
            $stmt = $db->prepare('SELECT Name, Username, Address, Phonenumber FROM User Where IdUser = ?');
            $stmt->execute((array($userid)));

            if($user = $stmt->fetch()){
                return new User((int)$userid, $user['Name'], $user['Username'], $user['Address'], (int)$user['Phonenumber']);
            }
            else
                return null;
        }

        static function createUser(PDO $db, string $username, string $name, string $address, int $phonenumber, string $password){
            $stmt = $db->prepare('Insert into User (Name, Password, Username, Address, Phonenumber) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute(array($name, $password,  $username, $address, $phonenumber));
        }

        static function createAcctypeOwner(PDO $db, int $userid){
            $stmt = $db->prepare('Insert into Owner (IdUser) VALUES (?)');
            $stmt->execute(array($userid));
        }

        static function createAcctypeCustomer(PDO $db, int $userid){
            $stmt = $db->prepare('Insert into Customer (IdUser) VALUES (?)');
            $stmt->execute(array($userid));
        }

        static function getUserAccountType(PDO $db, int $userid) :?string{
            $stmt = $db->prepare('SELECT * FROM Owner WHERE IdUser = ?');
            $stmt->execute(array($userid));

            if($stmt->fetch() != null){
                return "owner";
            }

            return "customer";
        }

        static function createNewUser(PDO $db, string $username, string $name, string $address, int $phonenumber, string $password, string $confirmpassword, string $accountype){

            //Password != confirmpassword so we won't register the users
            if($password != $confirmpassword)
                return array("ERROR " => "Passwords do not match.");

            //Asserts if the username already exists in the current database as well as the phonenumber
            $fetchusername = $db->prepare('Select * From User Where Username = ?');
            $fetchusername->execute(array($username));

            $fetchphonenumber = $db->prepare('Select * from User Where Phonenumber = ?');
            $fetchphonenumber->execute(array($phonenumber));

            if($fetchusername->fetch() != NULL)
                return array("ERROR" => "Username Already Taken.");
            else if($fetchphonenumber->fetch() != NULL)
                return array ("ERROR" => "Phone Number Already Taken.");

            //Encrypts the password
            $newpassword = hash('sha256', $password);

            //Creates a User in the User table
            self::createUser($db, $username, $name, $address, $phonenumber, $newpassword);

            //gets the user id after insertion in the user table
            $user = self::getUserWithPassword($db, $username, $password);

            //Verifies the account type which the user wants to create
            if($accountype === "owner"){
                self::createAcctypeOwner($db, $user->id);
            }
            else if($accountype === "customer"){
                self::createAcctypeCustomer($db, $user->id);
            }
            //In case the user type happens to be invalid we will cancel the insertion into the database
            else{
                return array("ERROR" => "Oops! Something went wrong.");
            }

            return null;
        }

    }
?>