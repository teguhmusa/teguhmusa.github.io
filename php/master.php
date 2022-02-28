<?php

include "connect.php";
$prev_page = $_SERVER['HTTP_REFERER'];
$menu = $_GET['menu'];
$acy = $_GET['act'];
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$dateTimeStr = date("d F Y") . " " . date("h:i");
$dateTimeStr = $date->format('d F Y H:i');
if ($menu == 'guest' and $act = 'simpan') {

    $theCoupleId = $_POST['coupleId'];
    $theSender = $_POST['sender'];
    $theReservation = $_POST['reservation'];
    $theMessage =  $_POST['message'];
    //mysqli_query($db, "insert into aDEUserMessage(coupleId, sender, reservation, message, dateTimeStr) 
    //                    values('$_POST[coupleId]', '$_POST[sender]', '$_POST[reservation]', '$_POST[message]', '$dateTimeStr')");
    //header("location:".$prev_page);
    $sql = "insert into aDEUserMessage(coupleId, sender, reservation, message, dateTimeStr) values('$theCoupleId', '$theSender', '$theReservation', '$theMessage', '$dateTimeStr')";
    if (mysqli_query($db, $sql)) {
        echo "Ucapan berhasil dikirim, menunggu aproval pengantin";
    }else{
        echo "Ucapan gagal dikirim, silahkan coba kembali";
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }

}
