<?php
session_start();
include "config.php";

$orderid = $_SESSION['orderid'];
$orderStatus = $_POST['status'];
echo $orderStatus;

$sql = "UPDATE place_order SET order_status = '$orderStatus' WHERE order_id = $orderid";
mysqli_query($db, $sql);

header('Location:salesManager.php');
exit;
?>