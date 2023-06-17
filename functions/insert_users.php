<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require "connect.php";

    $name = $_POST["name"];
  $email = $_POST["email"];
   $password =  $_POST["password"];
   $image = $_FILES["image"]["name"];

   move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$image);

   $color = $_POST["color"];




   $password_hash = password_hash($password,PASSWORD_DEFAULT);


 

    $insert_users = $coon -> query("INSERT INTO register (name,email,password,image,color) 
    VALUES ('$name','$email','$password_hash','$image','$color')");

    if($insert_users){

        header("location:../login.php");

    }

}


?>