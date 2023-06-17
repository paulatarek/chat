<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require "connect.php";

   $email = $_POST["email"];
  $password = $_POST["password"];

 $select_users = $coon -> query("SELECT * FROM register WHERE email ='$email'");
 
 $details_users =  $select_users -> fetch_assoc();

 $count_email = $select_users -> num_rows;
 
 if($count_email > 0){

 $password_sql = $details_users ["password"];
$id_sql = $details_users ["id"];
 if(password_verify($password,$password_sql)){

    $_SESSION["vale"] = $id_sql;

    header("location:../index.php");

 }
 else{
   header("location:../login.php?error =password incorrect ");
 }


}else{
    header("location:../login.php?error =email incorrect ");
}

}



?>