<?php
session_start();
include "config.php";

$productid = $_REQUEST['product_id'];

$sql = "DELETE FROM  product WHERE product_id = $productid";
mysqli_query($db, $sql);


header('Location:productManager.php');
exit;
?>