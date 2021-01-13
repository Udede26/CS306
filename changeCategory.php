<?php
session_start();
include "config.php";

$category_id = $_SESSION['categoryid'];
$categoryname =$_POST['name'];


$sql = "UPDATE category SET category_name= '$categoryname' WHERE category_id = $category_id";
mysqli_query($db, $sql);

header('Location:category.php');
exit;
?>