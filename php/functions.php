<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 24-Mar-16
 * Time: 1:30 PM
 */


function db_connect()
{
    if (!$connect = mysqli_connect("localhost", "root", ""))
        die("Sorry could not connect to the server.");
    if (!$db = mysqli_select_db($connect, "udan_vsm")) ;

    return $connect;
}
function up($rate, $share, $count_stock, $name)
{
    $get_detail = "select * from last_transaction where name='$name'";
    $connect = db_connect();
    $rget_detail = mysqli_query($connect, $get_detail);
    if (!$rget_detail) {
        echo "Could not execute query.";
    } else {
        $qdget_detail = mysqli_fetch_array($rget_detail);
        $trades = $qdget_detail["trades"];
        $sell = $qdget_detail["sell"];
        $high = $qdget_detail["high"];
        $low = $qdget_detail["low"];

    }
    if ($rate > $high) {
        $high = $rate;
    }
    if ($rate < $low) {
        $low = $rate;
    }
    $sell = $sell + $count_stock;
    $trades = $trades + 1;
    $update_last = "update last_transaction set rate='$rate',high='$high',low='$low',share='$share',sell='$sell',trades='$trades' where name='$name'";
    $connect = db_connect();
    $rupdate_last = mysqli_query($connect, $update_last);
    if (!$rupdate_last) {
        echo "Could not execute query.";
    } else {
        //$t=$share*$rate*0.001;
        //$rate=$rate-$t;

        $upp = "update comp set rate='$rate' where name='$name'";
        $connect = db_connect();
        $rupp = mysqli_query($connect, $upp);
        if (!$rupp) {
            echo "Could not execute query.";
        } else {

        }
    }
}


function up_buy($rate, $share, $count_stock, $name)
{
    $get = "select * from last_transaction where name='$name'";
    $connect = db_connect();
    $rget = mysqli_query($connect, $get);
    if (!$rget) {
        echo "Could not execute query.";
    } else {
        while ($qdget = mysqli_fetch_array($rget)) {
            $trades = $qdget["trades"];
            $buy = $qdget["buy"];
            $high = $qdget["high"];
            $low = $qdget["low"];
        }
    }
    if ($rate > $high) {
        $high = $rate;
    }
    if ($rate < $low) {
        $low = $rate;
    }
    $buy = $buy + $count_stock;
    $trades = $trades + 1;
    $update_last = "update last_transaction set rate='$rate',high='$high',low='$low',share='$share',buy='$buy',trades='$trades' where name='$name'";
    $connect = db_connect();
    $rupdate_last = mysqli_query($connect, $update_last);
    if (!$rupdate_last) {
        echo "Could not execute query.";
    } else {
        //$t=$share*$rate*0.001;
        //$rate=$rate+$t;
        $upp = "update comp set rate='$rate' where name='$name'";
        $connect = db_connect();
        $rupp = mysqli_query($connect, $upp);
        if (!$rupp) {
            echo "Could not execute query.";
        } else {

        }
    }
}

function update_circuit($name)
{
    $qu = "update comp set circuit_status=1 where name='$name'";
    $connect = db_connect();
    $ru = mysqli_query($connect, $qu);
    if (!$ru) {
        echo "Could not execute query.";
    } else {
        $clr = "delete from $name";
        $connect = db_connect();
        $rclr = mysqli_query($connect, $clr);
        if (!$rclr) {
            die(mysqli_error($connect));
        } else {
        }
    }
}


?>

