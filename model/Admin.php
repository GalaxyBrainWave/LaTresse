<?php 
    class Admin extends User {
        public function __construct() {
            parent::__construct($userId = 0, $lastName = "", $firstName = "", $email = "", $hashPass = "", $isAdmin = false, $nbReactions = 0, $nbHelloThanks = 0, $nbComments = 0);
        }
    }