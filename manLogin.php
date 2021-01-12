<?php

include "config.php";
session_start();

if(!empty($_POST['managerid']) && !empty($_POST['managerPassword']))
{
   $manager_id =$_POST['managerid'];
   $manager_password =$_POST['managerPassword'];
   $manager_type = $_POST['managerType'];

  $sql4= "SELECT M.manager_first_name, M.manager_last_name, M.manager_password, M.manager_id
          FROM manager M";
  $result = mysqli_query($db, $sql4);
   while($row = mysqli_fetch_assoc($result))
   {
     
      if($manager_id==$row['manager_id'] && $manager_password==$row['manager_password'])
      {
        //storing the name and surname for further use
        $_SESSION["managername"] = $row['manager_first_name'];;
        $_SESSION["managersurname"] = $row['manager_last_name'];
        $_SESSION["managerid"] = $manager_id;
        if($manager_type == 'salesManager')
        {
          header('Location: salesManager.php');
        }
        else
        {
          header('Location: productManager.php');
        }
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