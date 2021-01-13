<?php
session_start();
//if(isset($_POST['']))
include "config.php";
$user_id = $_SESSION['users_id'];
$pID =$_POST['product_id'];
$pCount = $_POST['countt'];

$sql4= "SELECT *
          FROM basketproducts B";
$result = mysqli_query($db, $sql4);

$found = false;
while($row = mysqli_fetch_assoc($result))
{
    
  if($user_id==$row['user_id'] && $pID == $row['product_id'])
  {
    $found = true;
  }
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

$numOfProducts += $pCount;

$sql_update= "UPDATE basket SET num_of_products = '$numOfProducts' WHERE basket_id = $basketid";
mysqli_query($db, $sql_update);

$totalCost += ($pCount * $price);

$sql_update= "UPDATE basket SET total_cost = '$totalCost' WHERE basket_id = $basketid";
mysqli_query($db, $sql_update);

if($found)
{
	$sql1= "SELECT B.countt 
        	FROM basketproducts B
        	WHERE B.product_id = $pID AND B.basket_id = $basketid";
	$result = mysqli_query($db, $sql1);
	while($row = mysqli_fetch_assoc($result))
	{
  		$count = $row['countt'];
	}
	$pCount += $count;
	$sql_update= "UPDATE basketproducts SET countt = $pCount WHERE product_id = $pID AND user_id = $user_id";
	mysqli_query($db, $sql_update);
}
else
{
	$sql_statement= "INSERT INTO basketproducts(basket_id, user_id, product_id, countt)
                  VALUES ($basketid, $user_id, $pID, $pCount)";

	mysqli_query($db, $sql_statement);
}



header('Location:products.php');
exit;
?>