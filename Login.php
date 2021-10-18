<?php

    // session_start();

    require_once("config.php");
    require_once("Data/MysqlDataProvider.Class.php");

    // $database = new MysqlDataProvider(CONFIG['db']);

    // function output($value){
    //       echo '<pre>';
    //       print_r($value);
    //       echo '<pre>';
    // }

    // echo($_SERVER['REQUEST_METHOD'] == "POST");

    // if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //     $accType = $_POST["selectAccType"];
    //     $username = trim($_POST["username"]);
    //     $password = trim($_POST["password"]);

    //     echo $accType;
    //     echo $username;
    //     echo $password;

    //     output($_POST);

    //     $loggedInUser = $database->login($accType, $username, $password);

    //     if($loggedInUser != false){
    //         $_SESSION['loggedInUser'] = $loggedInUser;
    //     } else {
    //         output("error!");
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>
</head>
<body>
     <!-- Top Bar -->
     <div class="navbar sticky-top top-nav-blue">
        <div class="container-fluid">
            <a class="navbar-brand link-light" href="#"><img src="covidvax.png" alt="This is the CoVax logo" height="50" width="50">
        <p class="h1 align-middle d-inline-block"> CoVax</p></a>
            <!-- TODO: Add href-->
            <a href="#"><button type="button" class="btn btn-outline-warning">Sign Up</button></a>
        </div>
      </div>

       <!--Login Form-->
       <div class="container mt-5">
        <section class="container-fluid d-flex align-items-center">
            <div class="container">
                <div class="row d-flex align items-center bg-white">
                    <div class="col-md-6 p-0">
                        <img src="covidvaccine.png" alt="Vaccine" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-lg-4 mb-3 px-md-5"> 
                                <form method="POST" class="px-md-5 px-2 needs-validation" novalidate>
                                    <h1 class="text-md-start text-center">Login</h1>
                                    <!--Login Form--> 
                                    <div class="form-floating-mb-3">
                                        <label>User Account Type</label>
                                        <select class="form-select btn-lg" id="selectAccType" name="selectAccType">
                                            <option selected disabled value="">Choose here...</option>
                                            <option value="healthcareAdministrator">Healthcare Administrator</option>
                                            <option value="patient">Patient</option>
                                        </select>
                                        <div class="invalid-feedback">Please select an account type.</div>
                                    </div>
                                    <div class="form-floating-mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control btn-lg" id="username"
                                            name="username" placeholder="Username" required>
                                        <div class="invalid-feedback">Please enter a username.</div>
                                    </div>
                                    <div class="form-floating-mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control btn-lg" id="password"
                                            name="password" placeholder="Password" required>
                                        <div class="invalid-feedback">Please enter your password [7 to 15 characters
                                            which contain only characters, numeric digits, underscore and first
                                            character must be a letter].</div>
                                    </div>
                                    
                                    <!--Login Button-->
                                    <div class="login-btn d-flex justify-content-md-start mt-3 justify-content-center">
                                        <input type="button" class="btn btn-primary mb-md-0 mb-5 btn-lg " id="loginBtn" value="Login"
                                        onclick="location.href = 'AdminHome.php';">
                                    </div>                                      
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
        
    <script src="Login.js"></script>
</body>
</html>