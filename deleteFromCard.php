<?php
session_start();
//if(isset($_POST['']))
include "config.php";
$user_id = $_SESSION['users_id'];
$pID =$_POST['product_id'];


$sql1= "SELECT B.countt 
        FROM basketproducts B
        WHERE B.product_id = $pID AND B.user_id = $user_id";
$result = mysqli_query($db, $sql1);
while($row = mysqli_fetch_assoc($result))
{
  $pCount = $row['countt'];
}
 

$sql1= "SELECT P.price 
        FROM product P
        WHERE P.product_id = $pID";
$result = mysqli_query($db, $sql1);
while($row = mysqli_fetch_assoc($result))
{
  $price = $row['price'];
}
 

$sql2="SELECT * 
        FROM basket B
        WHERE B.user_id = $user_id";

$result = mysqli_query($db, $sql2);
while($row = mysqli_fetch_assoc($result))
{
  $basketid = $row['basket_id'];
  $totalCost = $row['total_cost'];
  $numOfProducts = $row['num_of_products'];
}

$numOfProducts -= $pCount;

$sql_update= "UPDATE basket SET num_of_products = '$numOfProducts' WHERE basket_id = $basketid";
mysqli_query($db, $sql_update);

$totalCost -= ($pCount * $price);

$sql_update= "UPDATE basket SET total_cost = '$totalCost' WHERE basket_id = $basketid";
mysqli_query($db, $sql_update);


$sql_statement= "INSERT INTO basketproducts(basket_id, user_id, product_id, countt)
                  VALUES ($basketid, $user_id, $pID, $pCount)";

$sql_statement = "DELETE FROM  basketproducts WHERE basket_id = $basketid AND product_id = $pID";
mysqli_query($db, $sql_statement);


header('Location:home.php');
exit;
?>
