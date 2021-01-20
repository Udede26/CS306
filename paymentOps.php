<?php
session_start();

include "config.php";

$var1 = $_SESSION['users_id'];


$manager_query ="SELECT COUNT(S.manager_id) AS COUNT FROM salesmanager S";
$result_man = mysqli_query($db, $manager_query);

//$start = 0;
while ($row = mysqli_fetch_assoc($result_man)) {

    $manager = rand(1, $row['COUNT']);
}

$basket_query ="SELECT B.basket_id, B.total_cost
FROM Basket B 
WHERE B.user_id=$var1";
$result_basket = mysqli_query($db, $basket_query);
while ($row = mysqli_fetch_assoc($result_basket)) {
     $basket = $row['basket_id'];
     $sum = $row['total_cost'];
   
}



//if(!empty($_POST['invoiceaddress']))
//{
   $var_invoice_address = $_POST['invoiceaddress'];
//}



$sql_order= "INSERT INTO Place_Order(user_id, manager_id, basket_id, order_date, order_status)
VALUES ($var1, $manager, $basket, CURDATE() , 'ordered')";

mysqli_query($db, $sql_order);

$latest_order_id = mysqli_insert_id($db);

$basketproducts_query ="SELECT *
FROM BasketProducts B, Product P
WHERE B.basket_id=$basket AND B.product_id = P.product_id";
$result_basketproducts = mysqli_query($db, $basketproducts_query);
while ($row10 = mysqli_fetch_assoc($result_basketproducts)) {
     
     $product_id_basket = $row10['product_id'];
     $counttt = $row10['countt'];
     $total_price = $row10['price']*$counttt;

     $sql_orderedbasket = "INSERT INTO OrderedBasketProducts(basket_id, user_id, order_id, product_id, total_price, counttt)
VALUES($basket, $var1, $latest_order_id, $product_id_basket, $total_price, $counttt)";
mysqli_query($db, $sql_orderedbasket);
   
}





$sql_invoice = "INSERT INTO Invoice(invoice_date, invoice_address, invoice_sum, order_id, user_id)
VALUES (CURDATE(),  '$var_invoice_address', $sum,  $latest_order_id, $var1)";
mysqli_query($db, $sql_invoice);

header('Location: home_after_payment.php');

?>
