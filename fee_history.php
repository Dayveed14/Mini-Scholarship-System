<?php require_once("includes/sessions.php");
require('includes/db.php'); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>UNIUYO Scholarship System</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="user_index.php" class="logo"><b>Uni<span>uyo</span></b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="user_index.php"><img src="img/fr-05.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo" ".$_SESSION['username']." "?></h5>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Dashboard</span>
              </a>
            <ul class="sub">
              <li><a href="result.php">Results</a></li>
              <li><a href="due_history.php">Dues History</a></li>
              <li><a href="fee_history.php">School Fee History</a></li>
              <li><a href="politics.php">Political Involvement</a></li>
            </ul>
          </li>               
          <li>
            <a href="actions.php">
              <i class="fa fa-envelope"></i>
              <span>Profile </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
        <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Fee Payment History </h4>
              <p><?php $query = "SELECT fee.session, fee_history.session FROM fee INNER JOIN fee_history ON fee.session = fee_history.session";
                $result = mysqli_query($conn,$query);
                if (mysqli_num_rows($result)== 0 ){
                  echo "<br>Please pay your outstanding fees
                  <button type='submit' class='btn btn-theme'>Pay</button> ";
                } else {
                  echo "Your fee payment history is up to date";
                }
                  ?>
              </p>
              <hr>
              <?php
              $query = "SELECT * FROM fee_history WHERE reg_number = '".$_SESSION['username']."'";
              $result = mysqli_query($conn,$query);
              if (mysqli_num_rows($result) > 0){
                echo "<table class='table'>
                        <thead>
                          <tr>
                            <th>Fee Amount</th>
                            <th>Amount Paid</th>
                            <th>Date Due</th>
                            <th>Date Paid</th>
                            <th>Session</th>
                            <th>Semester</th>
                          </tr>
                        </thead>";
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<tbody>
                          <tr>
                            <td>". $row["amount"]."</td>
                            <td>". $row["total_paid"]."</td>
                            <td>". $row["due_date"]."</td>
                            <td>". $row["date_paid"]."</td>
                            <td>". $row["session"]."</td>
                            <td>". $row["semester"]."</td>
                          </tr>                          
                          </tbody>";
                        }
                        echo "</table>";
              }
              else {
                echo "0 results";
              }
              ?>                   
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>UNIUYO</strong>. All Rights Reserved
        </p>        
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="lib/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->

</body>

</html>
