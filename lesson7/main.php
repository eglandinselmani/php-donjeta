<?php 

$host= "localhost";
$user="root";
$pass="";

try{
    $con  = new PDO("mysql:host=$host",$user,$pass);
    echo "connected";

}catch(Exception $e){
    echo "not connected";
}


?>