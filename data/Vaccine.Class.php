<?php

class Vaccine {

    private $vaccineID;
    private $manufacturer;
    private $vaccineName;

    // function __construct($vaccineID, $manufacturer, $vaccineName) {
    //     $this->vaccineID = $vaccineID;
    //     $this->manufacturer = $manufacturer;
    //     $this->vaccineName = $vaccineName;
    //     $this->vaccineBatches = [];
    // }

    function getVaccineID(){
        return $this->vaccineID;
    }

    function getManufacturer(){
        return $this->manufacturer;
    }

    function getVaccineName(){
        return $this->vaccineName;
    }

    // function getVaccineBatches(){
    //     return $this->vaccineBatches;
    // }

    function setVaccineID($vaccineID){
        $this->vaccineID = $vaccineID;
    }

    function setManufacturer($manufacturer){
        $this->manufacturer = $manufacturer;
    }

    function setVaccineName($vaccineName){
        $this->vaccineName = $vaccineName;
    }

    // function setVaccineBatches($vaccineBatches){
    //     $this->vaccineBatches = $vaccineBatches;
    // }

    // function addVaccineBatches($batch){
    //     $tempBatchList = $this->getVaccineBatches();
    //     array_push($tempBatchList, $batch);
    //     $this->setVaccineBatches($tempBatchList);
    // }
}