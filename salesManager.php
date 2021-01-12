<?php 
include "config.php";

session_start();
$managerName = $_SESSION['managername'];
$managerSurname = $_SESSION['managersurname'];
$managerID = $_SESSION['managerid'];

// SQL query to select data from database 
$sql = "SELECT * 
        FROM place_order P
        WHERE P.manager_id = $managerID"; 
$result = mysqli_query($db, $sql); 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     <!-- Custom styles for this template -->
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Welcome!</h4>
            <ul>
              <li><a style="color:  #FFFFFF"><?php echo $managerName ?> </a></li>
              <li><a style="color:  #FFFFFF"><?php echo $managerSurname ?></a></li>
            </ul>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 style="color:#FFFFFF">Account</h4>
            <ul id="managerLogout">
              <li><a href="managerLogout.php" style="color:  #FFFFFF">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="salesManager.php" class="navbar-brand d-flex align-items-center">
          <strong>Orders</strong>
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    </div>
</header>
<main>
  <div class = "container">
      <div class = "row">
        <div class = "col">&nbsp;</div>
      </div>

      <div class = "col-lg-12">
        <p class = "lead">Product Table</p>

        <table class = "table table-striped table-hover">
          <thead class = "thead-dark">
            <tr>
              <th scope = "col">Row</th>
              <th scope = "col">Order ID</th>
              <th scope = "col">User ID</th>
              <th scope = "col">Basket ID</th>
              <th scope = "col">Order Date</th>
              <th scope = "col">Order Status</th>
              <th scope = "col">Details</th>
            </tr>           
          </thead>
          <tbody>
            <?php   // LOOP TILL END OF DATA  
                $nr = 0;
                while($rows=$result->fetch_assoc()) 
                {
                	$nr++;
 
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN-->
                <td><?php echo $nr;?></td>     
                <td><?php echo $rows['order_id'];?></td> 
                <td><?php echo $rows['user_id'];?></td> 
                <td><?php echo $rows['basket_id'];?></td> 
                <td><?php echo $rows['order_date'];?></td>
                <td><?php echo $rows['order_status'];?></td>
                <td>
                  <a class = "btn btn-primary" href = "managerInvoice.php?orderid=<?php echo $rows["order_id"]; ?>" role = "button">Invoice</a>
                  <a class = "btn btn-success" href = "changeStatusOrder.php?orderid=<?php echo $rows["order_id"]; ?>" role = "button">Change Status</a>
                  <a class = "btn btn-danger <?php if($rows['order_status'] == 'Delivered' || $rows['order_status'] == 'Cancelled' ||$rows['order_status'] == 'delivered') {?>disabled <?php }?>" href = "cancelOrder.php?orderid=<?php echo $rows["order_id"]; ?>" role = "button">Cancel</a>

                </td> 
            </tr> 
            <?php 
                } 
             ?>       
          </tbody>
        </table>

      </div>
    </div>
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1"> All rights reserved to  &copy;Ahmet ltd. AŞ. </p>
    <p class="mb-0">2020-2021 </p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>


