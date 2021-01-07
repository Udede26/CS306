<!doctype html>
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
     <link href="home.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">name surname</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>Home</strong>
      </a>
      <a href = "#" id="mymy" class="navbar-brand d-flex align-items-center">
        <strong>Products</strong>
      </a>
      <a href = "#" class="navbar-brand d-flex align-items-center">
        <strong>About</strong>
      </a>
      <a action= "newindex.php" class="md-form mt-0" id="searchtime">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container" id="top">
    
  </section>

  <div class="row">
  <div class="column">
    <div class="rp-main-content album py-5 bg-light text-center">
      <?php
          
          $db = mysqli_connect('localhost','root','','mydatabsinorealityo');
          if($db->connect_errno >0){
            die('Baglanamadim ['. $db->connect_error.']');
          }
          

          $result = mysqli_query($db,"SELECT * FROM product");

        
          

        
        
          while($row = mysqli_fetch_assoc($result))
          {
            $product_name= $row['product_name'];
            $description = $row['product_description'];
            $price = $row['price'];
            $brand = $row['brand'];
            
            echo "<li class='list-group-item'>";
            echo "<!-- Custom content-->";
            echo "<div class='media align-items-lg-center flex-column flex-lg-row p-3'>";
            echo   "<div class='media-body order-2 order-lg-1'>";
            echo      "</div><img src='https://drive.google.com/uc?export=view&id=1MbY3FN3HvBnFjl3HQROjgaXkBq5nhq_V' alt='Generic placeholder image' width='200' class='ml-lg-5 order-1 order-lg-2'>";
                echo      "<h5 class='mt-0 font-weight-bold mb-2'>$product_name</h5>";
                    echo       "<p class='font-italic text-muted mb-0 small'>$description</p>";
                    echo "<div class='mt-0 font-weight-bold mb-2'>
                    <h6 class='font-weight-bold my-2'>$price $</h6>
                    
                      </div>" . "<div class='form-group' align='center'>
                      <select class='form-control align-items-lg-center' id='exampleSelect1' style='max-width:20%;'>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                    <br>
                    </br>";
                    
                      echo "<button class='w-10 btn btn-lg btn-primary' type='submit sign in'>Add to cart</button>" ;
          echo  "</div>"; 
          echo "</li>";
          }
          echo "</table>";

          
          ?>
    </div>
  </div>
  <div class ="column">
    helll guys how are you let's go
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
