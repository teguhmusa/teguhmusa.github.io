<?php
	$coupleId = $_POST['coupleId'];
	$sender = $_POST['sender'];
	$reservation = $_POST['reservation'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','global_tgu');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(coupleId, sender, reservation, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $coupleId, $sender, $reservation, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>