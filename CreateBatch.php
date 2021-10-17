<?php

require_once("data/MysqlDataProvider.Class.php");

//session_start();
//echo '<script>alert("Welcome to Geeks for Geeks")</script>';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $batchNo = trim($_POST['batchNo']);
    $expiryDate = trim($_POST['expiryDate']);
    $qtyAvailable = trim($_POST['qtyAvailable']);
    $qtyAdministered = 0;
    $vaccineID = trim($_POST['vaccineName']);
    
    $database = new MysqlDataProvider(CONFIG['db']);

    if($database->validBatchNo($batchNo)){
        $database->recordNewBatch($batchNo, $expiryDate, $qtyAvailable, $qtyAdministered, $vaccineID);
        $database = null;
        header("Location: AdminHome.php");
        exit;
    } else {
        // Send back 'x' variable as AdminBatch.php
        // will check if this variable is set

        header("Location: AdminAddBatch.php?x=1");
    }
    
}
