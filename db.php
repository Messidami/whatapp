<?php
$con =new mysqli('localhost', 'root', '');

$database="CREATE DATABASE IF NOT EXISTS proxywhatsapp";
$data= mysqli_query($con, $database);

if($data){
    // echo "successful";
}else{
    die;
}
$con-> select_db("proxywhatsapp");

?>