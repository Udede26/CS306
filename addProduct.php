<?php

//if(isset($_POST['']))
include "config.php";

$pname =$_POST['name'];
$pdescription =$_POST['description'];
$pprice =$_POST['price'];
$pbrand =$_POST['brand'];
$pcategory =$_POST['category'];
$pictureLink = $_Post['picture']
$foo = true;

$sql1= "SELECT P.product_name, P.brand 
        FROM product P";

$result = mysqli_query($db, $sql1);
while($row = mysqli_fetch_assoc($result))
{
 if($pname==$row['product_name'] && $pbrand==$row['brand'])
  {
    $foo = false;
    $result -> free_result();
  }
}
 

if($foo)
{
  $sql_statement= "INSERT INTO product(product_name, product_description, price, brand, rating, product_picture)
                 VALUES ('$pname', '$pdescription', $pprice, '$pbrand', 0, '$pictureLink')";
  mysqli_query($db, $sql_statement);
  echo("<script>alert('New product has been successfully added!"."<br>"."Redirecting to home page...')</script>");
}
else
{
  echo("<script>alert('Something went wrong :( Try again"."<br>"."Redirecting to add product page...')</script>");
  header('Location: productManager.php');
  exit;
}


$sql2= "SELECT P.product_name, P.product_id
          FROM product P
          WHERE P.product_name = '$pname'";

$result = mysqli_query($db, $sql2);
while($row = mysqli_fetch_assoc($result))
{
  if($pname==$row['product_name'])
  {
    $productID = $row['product_id'];
  }
}


$sql3= "SELECT C.category_id, C.category_name
      FROM category C";
$result = mysqli_query($db, $sql3);

$found = false;
while($row = mysqli_fetch_assoc($result))
{
  if($pcategory==$row['category_name'])
  {
    $found = true;
    $catID = $row['category_id'];
  }
}

if($found)
{
  $sql_statement= "INSERT INTO productCategory(product_id,category_id)
                  VALUES ('$productID','$catID')";
  mysqli_query($db, $sql_statement);
}
else
{
  $sql_statement= "INSERT INTO category(category_name)
                  VALUES ('$pcategory')";
  mysqli_query($db, $sql_statement);
  $sql4= "SELECT C.category_id, C.category_name
      FROM category C
      WHERE C.category_name = '$pcategory' " ;
  $result = mysqli_query($db, $sql4);
  while($row = mysqli_fetch_assoc($result))
  {
    if($pcategory==$row['category_name'])
    {
      $catID = $row['category_id'];
    }
  }
  $sql_statement= "INSERT INTO productCategory(product_id, category_id)
                  VALUES ('$productID', '$catID')";
  mysqli_query($db, $sql_statement);
}
header('Location: productManager.php');
exit;

?>