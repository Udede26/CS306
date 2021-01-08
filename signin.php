<?php

include "config.php";

if(!empty($_POST['sign_in_email']) && !empty($_POST['sign_in_password']))
{
   $user_signin_email =$_POST['sign_in_email'];
   $user_signin_password =$_POST['sign_in_password'];


  $sql4= "SELECT U.first_name, U.last_name, R.email, R.password
          FROM Users U, registereduserinfo R
          WHERE U.user_id = R.user_id ";
  $result = mysqli_query($db, $sql4);
   while($row = mysqli_fetch_assoc($result))
   {
     
      if($user_signin_email==$row['email'] && $user_signin_password==$row['password'])
      {
         //storing the name and surname for further use
         $user_signin_name = $row['first_name'];
         $user_signin_surname = $row['last_name'];

         header('Location: home.html');
         exit;
        

      }
   }
   echo("<script>alert('Login unsuccesful, please try again"."<br>"."Redirecting to login page...')</script>");
   echo("<script>window.location = 'index.html';</script>");

}

else
{

   //echo ("<script>alert('Please fill in all the areas!"."<br>"."Redirecting to login page...')</script");
   //echo("<script>window.location = 'index.php';</script>");
   echo "'Please fill in all the areas!"."<br>"."Redirecting to login page...";
}