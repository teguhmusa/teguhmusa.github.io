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
        echo  '<tr class="theMessages">';

        //echo "<td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id'];
        echo '<td><input name="chk_id[]" type="checkbox" class="chkbox" value="' . $row['id'] . '"></input></td>';
        echo "<td>" . $row["sender"] . "</td>";
        echo "<td>" . $row["reservation"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>" . $row["dateTimeStr"] . "</td>";
        if ($row['IsApproved'] == 1) {
            echo '<td>Approved</td>';
        } else {
            echo '<td>Pending</td>';
        }
        echo '</tr>';
    }
}
