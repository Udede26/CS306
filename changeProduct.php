<?php
session_start();
include "config.php";

$product_id = $_SESSION['productid'];
$product_name = $_POST['name'];
$product_price =$_POST['price'];
$product_description =$_POST['description'];
$product_category = $_POST['category'];


$sql = "UPDATE product SET product_name = '$product_name' WHERE product_id = $product_id";
mysqli_query($db, $sql);

$sql = "UPDATE product SET price = '$product_price' WHERE product_id = $product_id";
mysqli_query($db, $sql);

$sql = "UPDATE product SET product_description = '$product_description' WHERE product_id = $product_id";
mysqli_query($db, $sql);

$sql = "UPDATE productcategory SET category_id = '$product_category' WHERE product_id = $product_id";
mysqli_query($db, $sql);

header('Location:productManager.php');
exit;
?>