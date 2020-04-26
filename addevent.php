<?php

if (isset($_POST['done'])) {
  $gathering_type = $_POST['event_type'];
  $number_of_people = $_POST['number_of_people'];
  $number_of_waiters = $_POST['number_of_waiters'];
  $separate_male_female = $_POST['separate_male_female'];
  $venue = $_POST['venue'];
  $user_id = $_POST['user_id'];
  $status = 1;
  $hours = $_POST['hours'];
  $date = $_POST['event_date'];
// require 'includes/pictures.php';

  //adding product
  $queryaddproduct = "INSERT INTO events(gathering_type,number_of_people,number_of_waiters,separate_male_female,venue,user_id,status,date,hours)
  VALUES ('$gathering_type','$number_of_people','$number_of_waiters','$separate_male_female','$venue','$user_id','$status','$date','$hours')";

    if ($connection->query($queryaddproduct) === TRUE ) {
          echo "<div class='center-align'>
                 <h5 class='green-text'>Event Added Successfully</h5>
                 </div><br><br>";

     } else {
         echo "<h5 class='red-text '>Error: " . $queryaddproduct . "</h5><br><br><br>" . $connection->error;
     }

     $connection->close();


    }
 ?>
