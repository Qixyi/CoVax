<?php
require_once 'database.php';

function checkEmpty($var){
    if (empty($var)){
        return false;
    }
    else {
        return true;
    }
}

if (isset($_POST)){
    extract($_POST);
    if ( checkEmpty($username) and checkEmpty($password) and checkEmpty($email)
    and checkEmpty($fullName) and checkEmpty($ICPassport) )
    {
        

        $query="INSERT INTO patient (username, password, email, fullName, ICPassport) VALUES ( '$username', '$password', '$email'
        '$fullName','$ICPassport')";
        $sql=mysqli_query($conn,$query)or die(mysqli_error($conn));
        
        echo "You are signed in";

    }
    else{
        
        echo "Please fill the empty fields";

        
    }


}
?>