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
        $date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        //echo $date->format('d F Y H:i') . "<br>";
        $dateTimeStr = date("d F Y") . " " . date("h:i");
        $dateTimeStr = $date->format('d F Y H:i');
		$stmt = $conn->prepare("insert into atguusermessage(coupleId, sender, reservation, message, dateTimeStr) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $coupleId, $sender, $reservation, $message, $dateTimeStr);
		$execval = $stmt->execute();
        if ($execval = 1){
            $messageShow = "Message sent";
        } else {
             $messageShow = "Message not sent"; 
        }
        echo $messageShow;
		$stmt->close();
		$conn->close();
	}
