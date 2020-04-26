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
            <a href="events.php ?>" class="breadcrumb">Events</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

 <div class="container-fluid category-page">
    <div class="row">

      <div class="col s12 m2 center-align cat">
        <div class="collection card">
        <?php

          include 'db.php';

          //get categories
            $querycategory = ['WEDDING','BIRTHDAY','GET TOGETHER','CORPORATE FUNCTIONS','KITTY PARTY','FOOD CATERING'];
            foreach($querycategory as $key => $value) {
          ?>
         <a href="events.php?event=<?= $value; ?>" class='collection-item' ><?= $value; ?></a>
       <?php } ?>
       </div>
      </div>

      <div class="col s12 m10 ">
        <div class="container content">
          <div class="center-align">
            <button class="button-rounded btn-large waves-effect waves-light">Events</button>
            <a type="submit" href="eventcreate.php" class="button-rounded btn-large waves-effect waves-light">Create New Event</a>
          </div>
        <div class="row">
        <div class="col-12">
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Event Type</th>
      <th scope="col">No. of People</th>
      <th scope="col">No. of Waiter</th>
      <th scope="col">Venue</th>
      <th scope="col">Date</th>
      
    </tr>
  </thead>
  <tbody>
          <?php
          //get products

          //pages links
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;
          $gathering_type = isset($_GET['event']) ? $_GET['event'] : '';
          $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

          $queryproduct = "SELECT SQL_CALC_FOUND_ROWS * FROM events WHERE gathering_type = '{$gathering_type}' ORDER BY id DESC LIMIT {$start}, 16";
          $result = $connection->query($queryproduct);

          //pages
           $total = $connection->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
           $pages = ceil($total / $perpage);

            if ($result->num_rows > 0) {
            // output data of each row
            while($rowproduct = $result->fetch_assoc()) {
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
            ?>	

              <tr>
                <th scope="row"><a href="event.php?id=<?= $event_id; ?>"><span class="card-title grey-text"><?= $gathering_type; ?></span>
                </a></th>
                <td><?= $number_of_people; ?></td>
                <td><?= $number_of_waiters  ?></td>
                <td><?= $venue ?></td>
                <td><?= $date ?></td>
              </tr>

              <?php }} ?>
              </tbody>
</table>
              </div>
                <div class="center-align animated slideInUp wow">
                  <ul class="pagination <?php if($total<15){echo "hide";} ?>">
                  <li class="<?php if($page == 1){echo 'hide';} ?>"><a href="?page=<?php echo $page-1; ?>&per-page=15"><i class="material-icons">chevron_left</i></a></li>
                  <?php for ($x=1; $x <= $pages; $x++) : $y = $x;?>


                      <li class="waves-effect pagina  <?php if($page === $x){echo 'active';} elseif($page <  ($x +1) OR $page > ($x +1)){echo'hide';} ?>"><a href="?page=<?php echo $x; ?>&per-page=15" ><?php echo $x; ?></a></li>



                  <?php endfor; ?>
                  <li class="<?php if($page == $y){echo 'hide';} ?>"><a href="?page=<?php echo $page+1; ?>&per-page=15"><i class="material-icons">chevron_right</i></a></li>
                </ul>
                </div>
          </div>
      </div>

    </div>
</div>

  <?php
   require 'includes/secondfooter.php';
   require 'includes/footer.php'; ?>
