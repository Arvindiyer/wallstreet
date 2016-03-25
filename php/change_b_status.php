<?php
session_start();
include_once("functions.php");
extract($_POST);
if (isset($_SESSION['player'])) {
    $pl = $_SESSION['player'];
    $n = 1;
    $q = "update main_stock set broker_status='$n' where player='$pl'";
    $connect = db_connect();
    $r = mysqli_query($connect, $q);
    if (!$r) {
        echo "Could not execute query.";
    } else {
        echo "Broker has been assigned to you.<button class='btn btn-small waves-effect green' onclick=\"read_news('broker')\" value=\"Read News\" id=\"bn\">Refresh</button>";
    }
} else {
}
