<?php 

    include_once("eglandin.php");

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        $sql ="insert into user(name,surname,email) values(:name, :surname, :email)";

        $sqlQuery= $conn->prepare($sql);


        $sqlQuery->bindParam(":name", $name);
        $sqlQuery->bindParam(":name", $name);
        $sqlQuery->bindParam(":name", $name);

        $sqlQuery->execute();

        echo"data is addedd";
    }





?>