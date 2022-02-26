<?php
include "connect.php";
$sql = "select sender, reservation, message, dateTimeStr FROM atguusermessage order by createdDate desc";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo "<tr><td>" . $row["sender"] . "</td><td>" . $row["message"] . "</td></tr>";
        $nameToDisp = str_replace(" ", "-", $row["sender"]);
        echo "<div class=\"col-md-12 mb-3\">";
        echo "<div class=\"media px-3 media-comment\">";
        echo "<img class=\"rounded-circle mr-3 d-none d-sm-block d-md-block d-lg-block\" src=https://na.ui-avatars.com/api/?name=" . $nameToDisp . "&size=50&background=111&color=ffffff alt=\"Image Avatar\">";
        echo "<div class=\"media-body\">";
        echo "<div class=\"mb-2\">";
        echo "<h5 class=\"h6 mb-0 text-secondary\">" . $row["sender"] . "</h5>";
        echo "<small class=\"text-muted\">" . $row["dateTimeStr"] . "</small>";
        echo "</div>";
        echo "<p>" . $row["message"] . "</p>";
        echo "</div></div></div>";
    }
}
