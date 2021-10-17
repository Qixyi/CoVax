<?php

require_once("User.Class.php");

class Administrator extends User {

    function __construct($username, $password, $email,
        $fullName, $staffID, $centre) {
        parent::__construct($username, $password, $email, $fullName);
        $this->staffID = $staffID;
        $this->centre = $centre;
    }

    function getStaffID(){
        return $this->staffID;
    }

    function getCentre(){
        return $this->centre;
    }

    function setStaffID($staffID){
        $this->staffID = $staffID;
    }

    function setCentre($centre){
        $this->centre = $centre;
    }
}