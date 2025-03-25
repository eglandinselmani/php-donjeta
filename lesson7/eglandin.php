<?php 

$host= "localhost";
$user="root";
$pass="";

try{
    $con  = new PDO("mysql:host=$host",$user,$pass);
    $sql="create database eglidb";
    $con->exec($sql);
    echo "connected";

}catch(Exception $e){
    echo "not connected";
}


?>