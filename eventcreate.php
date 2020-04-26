<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}
else {
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];
}

 require 'includes/header.php';
 require $nav; ?>
    <div class="container-fluid product-page">
        <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
            <div class="col s12">
                <a href="index.php" class="breadcrumb">Home</a>
                <a href="eventcreate.php ?>" class="breadcrumb">Create Event</a>
            </div>
            </div>
        </nav>
        </div>
    </div>
   <?php

include_once 'db.php';
?>
    <div class="container addp">
    <form method="post" enctype="multipart/form-data">
        <div class="card"   style="padding:10px">
        <?php

        include_once 'db.php';
        ?>

        <div class="row">
        
            <div class="input-field col s6">
                <select id="event_type" name="event_type">
                    <option selected="selected">Choose Event Type</option>
                <?php
                    $products = ['WEDDING','BIRTHDAY','GET TOGETHER','CORPORATE FUNCTIONS','KITTY PARTY','FOOD CATERING'];
                    foreach($products as $key=>$value){
                ?>
                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            
            <div class="input-field col s6" >
                <select id="separate_male_female" name="separate_male_female" >
                    <option value="">Separate Funtion</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            
            <div class="input-field col s6">
                <input id="number_of_people" placeholder="Number_of People" type="number" class="validate" name="number_of_people">
            </div>

            <div class="input-field col s6">
                <input id="number_of_waiters" placeholder="Number of Waiters" type="number" class="validate" name="number_of_waiters">
            </div>

            
            <div class="input-field col s6">
                <input id="venue" placeholder="Venue" type="text" class="validate" name="venue">
            </div>

            <div class="input-field col s6">
                <input id="hours" placeholder="Hours" type="number" class="validate" name="hours">
            </div>

            <div class="input-field col s6">
                <input id="event_date"  type="datetime-local" class="validate" name="event_date">
            </div>  
            <input type="hidden" value="<?php echo $idsess ?>" name="user_id">




        </div>
        <div class="row">
            <div class="center-align">
                <button type="submit" name="done" class="waves-effect button-rounded waves-light btn">Submit</button>
            </div>
        </div>

    </form>
    </div>
  <?php


    require 'addevent.php'; 
    require 'includes/secondfooter.php';
   require 'includes/footer.php'; ?>
