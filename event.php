<?php
session_start();

if (!isset($_GET['id'])) {
    header('Location: index.php');
}

if (!isset($_SESSION['logged_in'])) {
  $nav = 'includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}

$event_id =$_GET['id'];
 require 'includes/header.php';
 require $nav;?>

  <div class="container-fluid product-page" id="top">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Home</a>
            <a href="events.php" class="breadcrumb">Event</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <?php

include 'db.php';

//get products
$queryproduct = "SELECT * FROM events WHERE id = '{$event_id}' AND user_id = '$idsess'";
$result1 = $connection->query($queryproduct);
if ($result1->num_rows > 0) {
// output data of each row
$rowproduct = $result1->fetch_assoc();
    $event_id = $rowproduct['id'];
    $gathering_type = $rowproduct['gathering_type'];
    $number_of_people = $rowproduct['number_of_people'];
    $number_of_waiters = $rowproduct['number_of_waiters'];
    $separate_male_female = $rowproduct['separate_male_female'];
    $venue = $rowproduct['venue'];
    $status = $rowproduct['status'];
    $user_id = $rowproduct['user_id'];
    $date = $rowproduct['date'];
    $hours = $rowproduct['hours'];

}
?>

<div class="container-fluid product">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h2><?= $gathering_type; ?></h2>
        <hr>
        <div class="stuff">
        <table class="table table-striped table-dark">
          <tbody>
            <tr>
              <th scope="row">Number of People</th>
              <td><?= $number_of_people ?></td>
              <th scope="row">Venue</th>
              <td><?= $venue ?></td>
            </tr>
            <tr>
              <th scope="row">Number of Waiters</th>
              <td><?= $number_of_waiters ?></td>
              <th scope="row">Date</th>
              <td><?= $date ?></td>
            </tr>
            <tr>
              <th scope="row">Separate for Men/Woman</th>
              <td><?php if($separate_male_female == "yes"){
                echo "Yes";
              }else{ echo "No";} ?></td>
              <th scope="row">Hours</th>
              <td><?= $hours ?></td>
           
            </tr>
           
          </tbody>
        </table>
      </div>


    </div>
  </div>
  </div>
</div>
<?php 

  include 'db.php';

  $connection->close();


 require 'includes/secondfooter.php';
 require 'includes/footer.php'; ?>
