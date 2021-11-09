<?php

require_once("User.Class.php");

class Patient extends User {

    private $ICPassport;

    // function __construct($username, $password, $email, $fullName, $ICPassport) {
    //     parent::__construct($username, $password, $email, $fullName);
    //     $this->ICPassport = $ICPassport;
    // }

    function getICPassport(){
        return $this->ICPassport;
    }

    function setICPassport($ICPassport){
        $this->ICPassport = $ICPassport;
    }
}