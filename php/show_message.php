<?php

include "connect.php";

$statusFilter = 0;
if (isset($_GET['statusFilter'])) {
    $statusFilter = $_GET['statusFilter'];
}
if (isset($_GET['coupleId'])) {
    $coupleId = $_GET['coupleId'];
}

//echo "<script type='text/javascript'>alert('test " . $statusFilter . $coupleId . "');</script>";

if($statusFilter == 0){
    $sql = "SELECT * FROM aDEUserMessage where coupleId = '" . $coupleId . "' order by createdDate desc";
}elseif($statusFilter == 1){
    $sql = "SELECT * FROM aDEUserMessage where coupleId = '" . $coupleId . "' and IsApproved = 1 order by createdDate desc";
}elseif($statusFilter == 2){
    $sql = "SELECT * FROM aDEUserMessage where coupleId = '" . $coupleId . "' and IsApproved = 0 order by createdDate desc";
}

echo $query;


$result = $db->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo  '<tr>';
        echo '<td style="width:5%;"><input name="chk_id[]" type="checkbox" class="chkbox" value="' . $row['id'] . '"></input></td>';
        echo "<td style=\"width:15%;\">" . $row["sender"] . "</td>";
        if($row["reservation"]=="hadir"){
            echo "<td style=\"width:10%;\">Hadir</td>";
        }else{
            echo "<td style=\"width:10%;\">Tidak Hadir</td>";
        }
        echo "<td style=\"width:45%;\">" . $row["message"] . "</td>";
        echo "<td style=\"width:15%;\">" . $row["dateTimeStr"] . "</td>";
        if ($row['IsApproved'] == 1) {
            echo '<td style="width:10%;">Approved</td>';
        } else {
            echo '<td style="width:10%;">Pending</td>';
        }
        echo '</tr>';
    }
}
