<?php

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    require "connect.php";

    $msg = $_POST["N_MSG"];
    echo $id_users = $_SESSION["vale"];

    $slect_users = $coon -> query("SELECT * FROM register WHERE id='$id_users'");
    
    $details_users = $slect_users -> fetch_assoc();
    $name = $details_users["name"];
    $image = $details_users["image"];
    $color = $details_users["color"];

    $insert_msg = $coon -> query("INSERT INTO msg(msg,id_users,name,image,color)
     VALUES('$msg','$id_users','$name','$image','$color')");

     
     
     

}


?>