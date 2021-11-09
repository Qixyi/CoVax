<?php

require_once("User.Class.php");

class Administrator extends User {

    private $staffID;
    private $centreName;
    // function __construct($username, $password, $email,
    //     $fullName, $staffID, $centre) {
    //     parent::__construct($username, $password, $email, $fullName);
    //     $this->staffID = $staffID;
    //     $this->centre = $centre;
    // }

    function getStaffID(){
        return $this->staffID;
    }

    function getCentreName(){
        return $this->centreName;
    }

    function setStaffID($staffID){
        $this->staffID = $staffID;
    }

    function setCentreName($centreName){
        $this->centreName = $centreName;
    }
}