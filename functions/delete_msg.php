<?php
require 'connect.php';
$id = $_GET["id"];

$delete_msg = $coon -> query("DELETE FROM msg WHERE id='$id'");
if($delete_msg){
header("location:../index.php");
}


?>