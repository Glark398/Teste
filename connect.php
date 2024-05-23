<?php
	$ticketName = $_POST['ticketName'];
	$ticketDescription = $_POST['ticketDescription'];
	$ticketPrice = $_POST['ticketPrice'];
	$ticketImage = $_POST['ticketImage'];

	// Database connection
	
	$conn = new mysqli('localhost','root','','u368457673_bordeus');
	
	
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into cadastro_ingresso(nome, descricao, preco, img) values(?, ?, ?, ?)");
		$stmt->bind_param("ssib", $ticketName, $ticketDescription, $ticketPrice, $ticketImage);
		$execval = $stmt->execute();
		echo $execval;
		echo "<h1>Registration successfully...</h1>";
		$stmt->close();
		$conn->close();
	}
?>