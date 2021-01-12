<?php
include "config.php";

$orderid = $_REQUEST['orderid'];

$sql = "UPDATE place_order SET order_status = 'Cancelled' WHERE order_id = $orderid";
mysqli_query($db, $sql);

header('Location:salesManager.php');
exit;
?>