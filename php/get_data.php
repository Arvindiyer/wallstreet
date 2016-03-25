<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 24-Mar-16
 * Time: 7:10 PM
 */
?>
<?php
session_start();
include_once("functions.php");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    extract($_POST);
    $q = "select * from comp where name='$name'";
    $connect = db_connect();
    $r = mysqli_query($connect, $q);
    $q_d = mysqli_fetch_array($r);
    $q1 = $q_d["name"];
    $q2 = $q_d["group"];
    $q3 = $q_d["rate"];
    $q4 = $q_d["share"];
    $q5 = $q_d["type"];
    $cir = $q_d["circuit_status"];
    $q6 = strtolower($q1);
    $q7 = strtoupper($q1);
    $qq = "select rate from open_stock where name='$q1'";
    $connect = db_connect();
    $rr = mysqli_query($connect, $qq);
    if (!$rr) {
    } else {
        while ($qd = mysqli_fetch_array($rr)) {
            $open_rate = $qd["rate"];
        }
    }
    $qhigh = "select * from last_transaction where name='$q1'";
    $connect = db_connect();
    $rhigh = mysqli_query($connect, $qhigh);
    if (!$rhigh) {
    } else {
        $qdhigh = mysqli_fetch_array($rhigh);
        $high = $qdhigh["high"];
        $low = $qdhigh["low"];
    }

    $diff = $q3 - $open_rate;
    $calc = ($diff * 100) / $open_rate;
    $calc = round($calc, 2);
    if ($cir == 1) {
        echo "<td>$q7</tD><tD>$q2</tD><tD>$q5</td><tD>$q4</td>";
        if ($calc < 0) {
            echo "<td style=\"color:red;\">------</td><td>";
            ?>
            ---
            <?php
            echo "</tD><td style=\"color:red;\">------</td><td style=\"color:red;\">------</td><td style=\"color:red;\">--------</td><td style=\"color:red;\">--------</tD>";
        } else if ($calc >= 0) {
            echo "<td style=\"color:green;\">-------</td><td>";
            ?>
            ---
            <?php
            echo "</tD><td style=\"color:green;\">------</td><td style=\"color:green;\">------</td><td style=\"color:green;\">----------</td><td style=\"color:green;\">--------</tD>";
        }


        echo "<td>-----CIRCUIT-------</td>";


    } else {
        echo "<td>$q7</tD><tD>$q2</tD><tD>$q5</td><tD>$q4</td>";
        if ($calc < 0) {
            echo "<td style=\"color:red;\">$q3</td><td>";
            ?>
            <img src="img/stock_down.gif"/>
            <?php
            echo "</tD><td style=\"color:red;\">$open_rate</td>";
        } else if ($calc >= 0) {
            echo "<td style=\"color:green;\">$q3</td><td>";
            ?>
            <img src="img/stock_up.gif"/>
            <?php
            echo "</tD><td style=\"color:green;\">$open_rate</td>";
        }
        echo "<td><button class='btn-floating btn-small waves-effect green' onclick=\"refresh('tr','$q6','$i')\">Refresh</button>&nbsp;&nbsp;<button class='btn-floating btn-small waves-effect modal-trigger' data-target='buys' id='buy' onclick=\"gets('$q6')\">BUY</button>&nbsp;&nbsp;<button class='btn-floating btn-small waves-effect modal-trigger indigo' data-target='sells' id='sell' onclick=\"gets('$q6')\">SELL</a></td>";
        echo "</tr>";
    }
} else {
    ?>

    <script type="text/javascript"><!--
        setTimeout('Redirect()', 500);
        function Redirect() {
            location.href = 'dashboard.php';
        }
        // --></script>
<?php
}
?>