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


$sql_invoice = "INSERT INTO Invoice(invoice_date, invoice_address, invoice_sum, order_id, user_id)
VALUES (CURDATE(),  '$var_invoice_address', $sum,  $latest_order_id, $var1)";
mysqli_query($db, $sql_invoice);

header('Location: home_after_payment.php');

?>
