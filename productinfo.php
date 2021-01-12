 <?php 
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> Product Details </title>
	<link href="styleProductInfo.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	 <!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	 <div class = "container"> 
         <div class= "row">

         	<div class = "col-md-5">
         		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="ketchup.jpg" class="d-block w-100" alt="First slide">
				    </div>
				  
				   
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </a>
				</div>
 

         	</div>
         	<div class = "col-md-7">
         		<p class= "newarrival text-center">NEW</p>
         		<h2> Spicy Ketchup </h2>
                <p> Product Code: ISRC2020  </p>

                <?php
                   //$starNumber = $_SESSION["product_rating"]
                /*
                   $starNumber = 3.5;
				    for($x=1;$x<=$starNumber;$x++) {
				        echo '<img src="star.png" />';
				    }
				    if (strpos($starNumber,'.')) {
				        echo '<img src="halfstar.png" />';
				        $x++;
				    }
				    while ($x<=5) {
				        echo '<img src="blankstar.png" />';
				        $x++;
				    } 
				     */
				?>
              
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-half-o fa-sm checked" aria-hidden="true"></span>
				<span class="fa fa-star-o checked" aria-hidden="true"></span>

				<div id="myHTMLWrapper">

				</div>

				<script>
				   var wrapper = document.getElementById("myHTMLWrapper");

				  var myHTML = '';
				  //var num = <?php //echo json_encode($_SESSION["product_rating"]); ?>;


				  for (var i = 0; i < 5; i++) {
				    myHTML += '<span class="fa fa-star checked"></span>';
				  }



				  wrapper.innerHTML = myHTML;
				</script>
				
				
                <p class= "price"> 8.5 TL </p>
                <p><b>Brand: </b> Heinz</p>
                <label>Count  </label>
                <input type="text" value="1">
                <button type="button" class="btn btn-default cart">Add to Basket</button>
         	</div>
         	


         </div>


	 </div>
</head>
<body style="background-color: peachpuff;">

</body>
</html>
