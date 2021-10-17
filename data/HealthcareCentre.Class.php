<?php

class HealthcareCentre {

    // Function to call other __construct functions
    // based on number of arguments provided
    function __construct() {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();
  
        if (method_exists($this, $function = 
                '__construct'.$numberOfArguments)) {
            call_user_func_array(
                        array($this, $function), $arguments);
        }
    }

    // Constructor for creating new centre via user input
    function __construct2($centreName, $address){
        $this->centreName = $centreName;
        $this->address = $address;
        $this->healthcareAdministrators = [];
        $this->centreBatches = [];
    }

    // Constructor for creating new centre via database
    function __construct4($centreName, $address, $healthcareAdministrators, $centreBatches) {
        $this->centreName = $centreName;
        $this->address = $address;
        $this->healthcareAdministrators = $healthcareAdministrators;
        $this->centreBatches = $centreBatches;
    }

    function getCentreName(){
        return $this->centreName;
    }

    function getAddress(){
        return $this->address;
    }

    function getHealthcareAdministrators(){
        return $this->healthcareAdministrators;
    }

    function getCentreBatches(){
        return $this->centreBatches;
    }

    function setCentreName($centreName){
        $this->centreName = $centreName;
    }

    function setAddress($address){
        $this->address = $address;
    }

    function setHealthcareAdministrators($healthcareAdministrators){
        $this->healthcareAdministrators = $healthcareAdministrators;
    }

    function setCentreBatches($centreBatches){
        $this->centreBatches = $centreBatches;
    }

    function addHealthcareAdministrators($admin){
        $tempAdminList = $this->getHealthcareAdministrators();
        array_push($tempAdminList, $admin);
        $this->setHealthcareAdministrators($tempAdminList);
    }

    function addCentreBatches($batch){
        $tempBatchList = $this->getCentreBatches();
        array_push($tempBatchList, $batch);
        $this->setCentreBatches($tempBatchList);
    }
}