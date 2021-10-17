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

    function login($accType, $username, $password) {
        $db = $this->connect();

        if($db == null) {
            return;
        }

        if($accType === "healthcareAdministrator") {
            $sql = ('SELECT * FROM Administrator ' + 
            'WHERE username = :username AND password = :password');
        } else {
            $sql = ('SELECT * FROM Patient WHERE username = :username AND' +
            ' password = :password');
        }
        
        $smt = $db->prepare($sql);

        $smt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        if($accType === "healthcareAdministrator") {
            $data = $smt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
            'Administrator', ['username', 'password', 'email',
            'fullName', 'staffID', 'centre']);
        } else {
            $data = $smt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
            'Patient', ['username', 'password', 'email',
            'fullName', 'ICPassport']);
        }

        if(empty($data)){
            return false;
        }

        $smt = null;
        $db = null;

        return $data;
    }

    function selectViewAvailableVaccine() {
        $db = $this->connect();

        if($db == null) {
            return []; // need to check this!
        }

        $query = $db->query('SELECT * FROM Vaccine');

        $data = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vaccine', ['vaccineID', 'manufacturer', 'vaccineName']);
        
        $query = null;
        $db = null;

        return $data;
    }


    function recordNewBatch($batchNo, $expiryDate, $quantityAvailable, 
    $quantityAdministered, $vaccineID) {
        $db = $this->connect();

        if($db == null) {
            return;
        }

        $sql = 'INSERT INTO Batch (batchNo, expiryDate, quantityAvailable, quantityAdministered, vaccineID)
                VALUES (:batchNo, :expiryDate, :quantityAvailable, 
                :quantityAdministered, :vaccineID)';

        $smt = $db->prepare($sql);

        $smt->execute([
            ':batchNo' => $batchNo,
            ':expiryDate' => $expiryDate,
            ':quantityAvailable' => $quantityAvailable,
            ':quantityAdministered' => $quantityAdministered,
            ':vaccineID' => $vaccineID
        ]);

        $smt = null;
        $db = null;
    }

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

        $data = $smt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
        'Batch', ['batchNo', 'expiryDate', 'quantityAvailable', 
        'quantityAdministered', 'vaccineID']);

        if(empty($data)){
            return true;
        }

        $smt = null;
        $db = null;

        return false;
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