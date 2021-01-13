<?php 
session_start();
include "config.php";

$managerName = $_SESSION['managername'];
$managerSurname = $_SESSION['managersurname'];

// SQL query to select data from database 
$sql = "SELECT * FROM product ORDER BY product_id"; 
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

      #myInput {
        background-image: url('..assets/dist/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
      }

      #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
      }

      #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
      }

      #myTable tr {
        border-bottom: 1px solid #ddd;
      }

      #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;
      }

    </style>
     <!-- Custom styles for this template -->
     <link href="home.css" rel="stylesheet">
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
        <a href="productManager.php" class="navbar-brand d-flex align-items-center">
          <strong>Products</strong>
        </a>
        <a href="category.php" class="navbar-brand d-flex align-items-center">
          <strong>Product Categories</strong>
        </a>
        <a href="newProduct.php" class="navbar-brand d-flex align-items-center">
          <strong>Add New Product</strong>
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
        <h2>Product Table</h2>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.." title="Type in a product">
        <table class = "table table-striped table-hover">
          <thead class = "thead-dark">
            <tr class = "header">
              <th scope = "col">Row</th>
              <th scope = "col">Product ID</th>
              <th scope = "col">Product Name</th>
              <th scope = "col">Price</th>
              <th scope = "col">Brand</th>
              <th scope = "col">Rating</th>
              <th scope = "col">Action</th>
            </tr>           
          </thead>
          <tbody id  = "myTable">
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
                <td><?php echo $rows['product_id'];?></td> 
                <td><?php echo $rows['product_name'];?></td> 
                <td><?php echo $rows['price'];?></td> 
                <td><?php echo $rows['brand'];?></td>
                <td><?php echo $rows['rating'];?></td>
                <td>
                	<a class = "btn btn-success" href = "productEdit.php?product_id=<?php echo $rows["product_id"]; ?>" role = "button">Edit</a>
                	<a class = "btn btn-danger" href = "productDelete.php?product_id=<?php echo $rows["product_id"]; ?>" role = "button">Delete</a>              
              </td> 
            </tr> 
            <?php 
                } 
             ?>       
          </tbody>
        </table>
        <script>
          function myFunction() 
          {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) 
            {
              td = tr[i].getElementsByTagName("td")[2];
              if (td) 
              {
                txtValue = td.textContent || td.innerText;
              }
              if (txtValue.toUpperCase().indexOf(filter) > -1) 
              {
                tr[i].style.display = "";
              } 
              else 
              {
                tr[i].style.display = "none";
              }
            }       
          }
        </script>

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


