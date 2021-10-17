<?php

class Batch {

    function __construct($batchNo, $expiryDate, $quantityAvailable, 
    $quantityAdministered, $vaccineID) {
        $this->batchNo = $batchNo;
        $this->expiryDate = $expiryDate;
        $this->quantityAvailable = $quantityAvailable;
        $this->quantityAdministered = $quantityAdministered;
        $this->vaccineID = $vaccineID;
    }

    // function __construct() {
    //     $arguments = func_get_args();
    //     $numberOfArguments = func_num_args();
  
    //     if (method_exists($this, $function = 
    //             '__construct'.$numberOfArguments)) {
    //         call_user_func_array(
    //                     array($this, $function), $arguments);
    //     }
    // }

    // function __construct4($batchNo, $expiryDate, $quantityAvailable, $vaccine) {
    //     $this->batchNo = $batchNo;
    //     $this->expiryDate = $expiryDate;
    //     $this->quantityAvailable = $quantityAvailable;
    //     $this->quantityAdministered = 0;
    //     $this->vaccine = $vaccine;
    // }

    // function __construct5($batchNo, $expiryDate, $quantityAvailable, 
    //     $quantityAdministered, $vaccine) {
        
    //     $this->batchNo = $batchNo;
    //     $this->expiryDate = $expiryDate;
    //     $this->quantityAvailable = $quantityAvailable;
    //     $this->quantityAdministered = $quantityAdministered;
    //     $this->vaccine = $vaccine;
    // }

    function getBatchNo(){
        return $this->batchNo;
    }

    function getExpiryDate(){
        return $this->expiryDate;
    }

    function getQuantityAvailable(){
        return $this->quantityAvailable;
    }

    function getQuantityAdministered(){
        return $this->quantityAdministered;
    }

    function getVaccineID(){
        return $this->vaccineID;
    }

    function setBatchNo($batchNo){
        $this->batchNo = $batchNo;
    }

    function setExpiryDate($expiryDate){
        $this->expiryDate = $expiryDate;
    }

    function setQuantityAvailable($quantityAvailable){
        $this->quantityAvailable = $quantityAvailable;
    }

    function setQuantityAdministered($quantityAdministered){
        $this->quantityAdministered = $quantityAdministered;
    }

    function setVaccineID($vaccineID){
        $this->vaccineID = $vaccineID;
    }

}