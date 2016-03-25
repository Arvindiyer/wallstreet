<?php
session_start();
include_once("functions.php");
extract($_POST);
$q = "select news from news where name='broker'";
$connect = db_connect();
$r = mysqli_query($connect, $q);
if (!$r) {
    echo "Could not execute query.";
} else {
    $qd = mysqli_fetch_array($r);
    $bn = $qd["news"];
    echo "$bn";
}
echo "<br><button class='btn btn-small waves-effect green' name=\"buttom\" value=\"Refresh\" onclick=\"broker('broker')\" class=\"button\">Refresh</button>";
?>