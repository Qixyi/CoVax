<?php
session_start();

require_once("config.php");

$user = unserialize($_SESSION['user']);
$database = new MysqlDataProvider(CONFIG['db']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>All Covax Vaccine Batch</title>
</head>
<body>
    <!-- Top Bar -->
    <div class="navbar sticky-top top-nav-blue">
      <div class="container-fluid">
          <a class="navbar-brand link-light" href="AdminHome.php"><img src="covidvax.png" alt="This is the CoVax logo" height="50" width="50">
      <p class="h1 align-middle d-inline-block"> CoVax</p></a>
          <a href="Logout.php"><button type="button" class="btn btn-outline-warning">Log Out</button></a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <br>
        <h2 class="text-center text-uppercase"><?php echo $user->getCentreName(); ?></h2>

        <section class="my-5">
            <a href="AdminAddBatch.php"><button type="button" class="btn top-nav-blue text-white">Add Batch</button></a>
            <p class="d-inline-block"><?php echo count($database->getBatches($user->getCentreName())) ?> Batch; 14 Pending Appointments</p>
        </section>


        <!-- Batch Table -->
        <table class="table table-hover" id="batchTable">
            <thead>
              <tr class="light-cyan-color">
                <th scope="col">Batch No</th>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Pending Appointments</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $batchArray = $database->getBatches($user->getCentreName());
                foreach($batchArray as $batch):
                  $vaccine = $database->getVaccineById($batch->getVaccineID());
              ?>
                <tr data-href="AdminAppointment.html">
                  <th scope="row"><?php echo $batch->getBatchNo() ?></th>
                  <td><?php echo $vaccine->getVaccineName() ?></td>
                  <td>3</td>
                </tr>
              <?php endforeach;?>
              <!-- <tr data-href="AdminAppointment.html">
                <th scope="row">B0001</th>
                <td>Pfizer</td>
                <td>3</td>
              </tr> -->
            </tbody>
          </table>
    </div>

    <script type="text/javascript">
      const allRows = document.querySelectorAll("tr[data-href]");

      allRows.forEach(row => {
        row.addEventListener("click", () => {
          window.location.href = row.dataset.href;
        });
      });
      
    </script>
</body>
</html>