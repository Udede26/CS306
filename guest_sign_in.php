<?php
session_start();
//if(isset($_POST['']))
include "config.php";

//if(!empty($_POST['user_f_name']) && !empty($_POST['user_l_name']) && !empty($_POST['user_email']) && !empty($_POST['phone']) && !empty($_POST['user_address']) && !empty($_POST['user_password']) )
if(!empty($_POST['inputName']) && !empty($_POST['inputSurname']) )
{

$fname =$_POST['inputName'];
$lname =$_POST['inputSurname'];
$addresss =$_POST['inputAddress'];


$countSuccess = 0;
$sql_statement= "INSERT INTO Users(address, first_name, last_name)
                 VALUES ('$addresss', '$fname', '$lname')";

mysqli_query($db, $sql_statement);
 if ($sql_statement) 
    {
      $countSuccess++;
    }

$latest_user_id = mysqli_insert_id($db);

 $sql_statement3 = "INSERT INTO Basket(user_id, total_cost, num_of_products)
                    VALUES('$latest_user_id', 0, 0)";
 mysqli_query($db, $sql_statement3);
 if ($sql_statement3) 
    {
      $countSuccess++;
    }
 
   //echo "Your account has been successfully created!"."<br>"."Redirecting to home page...";
    //header("Location: http://newPath/newPage.php/");
   $_SESSION['user_signin_name'] = $fname ;
   $_SESSION['user_signin_surname'] =$lname;
   $_SESSION['users_id'] = $latest_user_id;

   header('Location: home.php');
    exit;
  


}

else
{
   echo "Please enter the same password twice";
   //echo ("<script>alert('Please enter the same password twice!"."<br>"."Redirecting to login page...')</script");
   
   //echo("<script>window.location = 'index.html';</script>");

  //  echo "'Please fill in all the areas!"."<br>"."Redirecting to login page...";
  //sleep(5);
}



?>
