<?php
session_start();

include "config.php";

$var1 = $_SESSION['users_id'];



$var_passagain = $_POST['changepassagain'];

if(!empty($_POST['changename']))
{
   $var_name = $_POST['changename'];

   $sql_statement1= "UPDATE Users
                     SET first_name = '$var_name'
                     WHERE user_id='$var1'";

 mysqli_query($db, $sql_statement1);
}

if(!empty($_POST['changesurname']))
{
   $var_surname = $_POST['changesurname'];

   $sql_statement2= "UPDATE Users
                     SET last_name = '$var_surname'
                     WHERE user_id='$var1'";

 mysqli_query($db, $sql_statement2);
}

if(!empty($_POST['changeaddress']))
{
   $var_address = $_POST['changeaddress'];

   $sql_statement3= "UPDATE Users
                     SET address = '$var_address'
                     WHERE user_id='$var1'";

 mysqli_query($db, $sql_statement3);
}

if(!empty($_POST['changepass']) && !empty($_POST['changepassagain']))
{
   if($_POST['changepass']==$_POST['changepassagain'])
   {

       $var_pass = $_POST['changepass'];


      $sql_statement4= "UPDATE RegisteredUserInfo
                      SET password = '$var_pass'
                     WHERE user_id='$var1'";

       mysqli_query($db, $sql_statement4);


   } 
}

if(!empty($_POST['changeemail']))
{
   $var_email = $_POST['changeemail'];

   $sql_statement5= "UPDATE RegisteredUserInfo
                     SET email = '$var_email'
                     WHERE user_id='$var1'";

 mysqli_query($db, $sql_statement5);
}

if(!empty($_POST['changephone']))
{
   $var_phone = $_POST['changephone'];

   $sql_statement6= "UPDATE RegisteredUserInfo
                     SET phone_number = '$var_phone'
                     WHERE user_id='$var1'";

 mysqli_query($db, $sql_statement6);
}


header('Location: edit_user_info.php');
    exit;
?>