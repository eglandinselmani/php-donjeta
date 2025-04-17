<?php

	include_once('eglandin.php');	

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];

		
        $sql = "INSERT into user (name, surname, email) values (:name, :surname, :email)";
        $sqlQuery = $conn->prepare($sql);
    
        $sqlQuery->bindParam(':name', $name); 
        $sqlQuery->bindParam(':surname', $surname); 
        $sqlQuery->bindParam(':email', $email);

        $sqlQuery->execute();

        echo "Data saved successfully ...<br>";
	}
?>

