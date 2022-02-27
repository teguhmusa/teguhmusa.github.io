<?php

include "connect.php";
$prev_page = $_SERVER['HTTP_REFERER'] ;
$menu = $_GET['menu'];
$acy = $_GET['act'];
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
$dateTimeStr = date("d F Y") . " " . date("h:i");
$dateTimeStr = $date->format('d F Y H:i');
if($menu=='guest' and $act = 'simpan'){
    mysqli_query($db, "insert into aDEUserMessage(coupleId, sender, reservation, message, dateTimeStr) 
                        values('$_POST[coupleId]', '$_POST[sender]', '$_POST[reservation]', '$_POST[message]', '$dateTimeStr')");
    header("location:../sample02/index.php");
}
