<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 24-Mar-16
 * Time: 1:30 PM
 */

function db_connect()
{
    if (!$connect = mysql_connect("localhost", "root", ""))
        die("Sorry could not connect to the server.");
    if (!$db = mysql_select_db("udan_vsm", $connect))
        die("Sorry could not connect to the database");
}

function up($rate, $share, $count_stock, $name)
{
    $get_detail = "select * from last_transaction where name='$name'";
    db_connect();
    $rget_detail = mysql_query($get_detail);
    if (!$rget_detail) {
        echo "Could not execute query.";
    } else {
        $qdget_detail = mysql_fetch_array($rget_detail);
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
    db_connect();
    $rupdate_last = mysql_query($update_last);
    if (!$rupdate_last) {
        echo "Could not execute query.";
    } else {
        //$t=$share*$rate*0.001;
        //$rate=$rate-$t;

        $upp = "update comp set rate='$rate' where name='$name'";
        db_connect();
        $rupp = mysql_query($upp);
        if (!$rupp) {
            echo "Could not execute query.";
        } else {

        }
    }
}


function up_buy($rate, $share, $count_stock, $name)
{
    $get = "select * from last_transaction where name='$name'";
    db_connect();
    $rget = mysql_query($get);
    if (!$rget) {
        echo "Could not execute query.";
    } else {
        while ($qdget = mysql_fetch_array($rget)) {
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
    db_connect();
    $rupdate_last = mysql_query($update_last);
    if (!$rupdate_last) {
        echo "Could not execute query.";
    } else {
        //$t=$share*$rate*0.001;
        //$rate=$rate+$t;
        $upp = "update comp set rate='$rate' where name='$name'";
        db_connect();
        $rupp = mysql_query($upp);
        if (!$rupp) {
            echo "Could not execute query.";
        } else {

        }
    }
}

function update_circuit($name)
{
    $qu = "update comp set circuit_status=1 where name='$name'";
    db_connect();
    $ru = mysql_query($qu);
    if (!$ru) {
        echo "Could not execute query.";
    } else {
        $clr = "delete from $name";
        db_connect();
        $rclr = mysql_query($clr);
        if (!$rclr) {
            die(mysql_error());
        } else {
        }
    }
}


?>

