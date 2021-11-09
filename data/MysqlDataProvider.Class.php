<?php

require_once("config.php");
require_once("Vaccine.Class.php");
require_once("Batch.Class.php");
require_once("Administrator.Class.php");
require_once("Patient.Class.php");

class MysqlDataProvider {
    function __construct($source) {
        $this->source = $source;
    }

    // Checks if user is valid. Returns user object if exists, else returns false.
    // USED in Login.php
    function login($username, $password) {
        $db = $this->connect();

        if($db == null) {
            return;
        }

        $sql = ('SELECT * FROM Administrator WHERE username = :username AND password = :password');
        $smt = $db->prepare($sql);

        $smt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        $data = $smt->fetchObject('Administrator');
        if($data == false) {
            $sql = ('SELECT * FROM Patient WHERE username = :username AND password = :password');
            $smt = $db->prepare($sql);

            $smt->execute([
                ':username' => $username,
                ':password' => $password
            ]);

            $data = $smt->fetchObject('Patient');
        }

        $smt = null;
        $db = null;

        if(empty($data)){
            return;
        }

        return $data;
    }

    // Returns all vaccine objects
    // USED in AdminAddBatch.php
    function getVaccines() {
        $db = $this->connect();

        if($db == null) {
            return []; // need to check this!
        }

        $query = $db->query('SELECT * FROM Vaccine');

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'Vaccine');
        
        $query = null;
        $db = null;

        return $data;
    }


    // Search for a Vaccine object. Returns a Vaccine object if exists, else returns false
    // USED in AdminHome.php
    function getVaccineById($vaccineID) {
        $db = $this->connect();

        if($db == null) {
            return;
        }

        $sql = ('SELECT * FROM Vaccine WHERE vaccineID = :vaccineID');
        $smt = $db->prepare($sql);

        $smt->execute([
            ':vaccineID' => $vaccineID
        ]);

        $data = $smt->fetchObject('Vaccine');
        $smt = null;
        $db = null;

        return $data;
    }


    // Inserts new batch into db
    // USED in AdminAddBatch.php
    function recordNewBatch($batchNo, $expiryDate, $quantityAvailable, 
    $quantityAdministered, $vaccineID, $centreName) {
        $db = $this->connect();

        if($db == null) {
            return;
        }

        $sql = 'INSERT INTO Batch (batchNo, expiryDate, quantityAvailable, quantityAdministered, vaccineID, centreName)
                VALUES (:batchNo, :expiryDate, :quantityAvailable, 
                :quantityAdministered, :vaccineID, :centreName)';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':batchNo' => $batchNo,
            ':expiryDate' => $expiryDate,
            ':quantityAvailable' => $quantityAvailable,
            ':quantityAdministered' => $quantityAdministered,
            ':vaccineID' => $vaccineID,
            ':centreName' => $centreName
        ]);

        $smt = null;
        $db = null;
    }

    // Checks if batchNo exists. Returns true if batchNo does NOT exist, else returns false.
    // USED in AdminAddBatch.php
    function validBatchNo($batchNo) {
        $db = $this->connect();

        if($db == null) {
            return;
        }

        $sql = ('SELECT * FROM Batch WHERE batchNo = :batchNo');
        
        $smt = $db->prepare($sql);

        $smt->execute([
            ':batchNo' => $batchNo
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Batch');

        if(empty($data)){
            return true;
        }

        $smt = null;
        $db = null;

        return false;
    }


    // not done!!!
    // USED in AdminHome.php
    function getBatches($centreName) {
        $db = $this->connect();

        if($db == null) {
            return [];
        }

        $sql = ('SELECT * FROM Batch WHERE centreName = :centreName');

        $query = $db->prepare($sql);

        $query->execute([
            ':centreName' => $centreName
        ]);

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'Batch');

        $query = null;
        $db = null;

        return $data;
    }

    // public function get_terms() {

    // }

    // public function get_term($term) {

    // }

    // public function add_term($term, $definition) {

    // }

    private function connect() {
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
    }
}