<?php
session_start();

include "config.php";


$var1 = $_SESSION['users_id'];
$var2 = $_SESSION['productt_id'];

if(!empty($_POST['comments']))
{
   $var_comments = $_POST['comments'];
   $sql_statement= "INSERT INTO Comments(user_comment, user_id, product_id)
                 VALUES ('$var_comments', '$var1', '$var2')";

   mysqli_query($db, $sql_statement);

if($sql_statement)
  echo "Your comment has been received successfully";

else
	echo "A problem has occured. Please try again later";              
} 



if(!empty($_POST['selectRating']))
{
   $var_rating=$_POST['selectRating'];
   $sql_statement2= "UPDATE Ratings
                     SET user_rating = '$var_rating'
                     WHERE user_id='$var1' AND product_id='$var2'";

 mysqli_query($db, $sql_statement2);

 if($sql_statement2)
  echo "Your rating has been received successfully";

 else
	echo "A problem has occured. Please try again later";

} 



if(!empty($_POST['editcomments']))
{
   $var_user_comment = $_POST['editcomments'];
   $sql_statement3= "UPDATE Comments
                     SET user_comment = '$var_user_comment'
                     WHERE user_id='$var1' AND product_id='$var2'";

   mysqli_query($db, $sql_statement3);

  if($sql_statement3)
  echo "Your comment has been edited successfully";

  else
	echo "A problem has occured. Please try again later";


} 



echo("<script>window.location = 'productinfo.php';</script>");

?>