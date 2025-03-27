<?php 



  $host = "localhost";
  $db ="dbeglandin";
  $user="root";
  $pass="";

  try{
    $pdo= new PDO("mysql:host=$host; dbname=$db",$user, $pass);

    $username= "egli";
    $password= "egli123";

    $sql= "INSERT INTO users (id,username,password) Values (1,'$username','$password')"; 

    $pdo->exec($sql);
    echo "user is added";
    
  }catch (Exception $e){
    echo "Error createin table". $e->getMessage();
  }



?>