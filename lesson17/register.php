<?php

include_once('config.php')
if(isset($_POST['sumbit']))
{
    $emri= $_POST['emri'];
    $username= $_POST['username'];
    $email = $_POST['email'];

    $temPass=$_POST['password'];
    $password= password_hash($tempPass, PASSWORD_DEFAULT);

    $tempConfirm = $_POST["confirm_password"];
    $confirm_password = password_hash($tempConfirm, PASSWORD_DEAFULT);

    if(empty($emri) || empty ($username) || empty ($email) || empty ($password) || empty($confirm_password)){
        echo "You have not filled in all the fields.";
    }else{
        $sql = "INSERT INTO users(emri,username,email,password,confirm_password)
                Values (:name,:username,:email,:password)";

                $inserSql = conn->prepare($sql);
                $insertSql->bindParam('name', $emri);
                $insertSql->bindParam('username', $username);
                $insertSql->bindParam('email', $email);
                $insertSql->bindParam('password', $password);

                $inserSql->execute();

                header("Location:login.php");
    }
}



?>