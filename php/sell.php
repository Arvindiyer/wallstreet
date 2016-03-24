<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 24-Mar-16
 * Time: 11:31 PM
 */
session_start();
include("functions.php");

if (isset($_SESSION['player'])) {
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        extract($_POST);
        $iserror = false;
        if ($share <= 0 || $share == "" || !is_numeric($share)) {
            $iserror = true;
            echo "Please enter valid share value";
        }

        $q_rate = "select rate from open_stock where name='$name'";
        db_connect();
        $r_rate = mysql_query($q_rate);
        if (!$r_rate) {
            echo "Could not execute query.";
        } else {
            $qdrate = mysql_fetch_array($r_rate);
            $open_rate1 = $qdrate["rate"];
        }
        $q_rate = "select rate from comp where name='$name'";
        db_connect();
        $r_rate = mysql_query($q_rate);
        if (!$r_rate) {
            echo "Could not execute query.";
        } else {
            $qdrate = mysql_fetch_array($r_rate);
            $rate = $qdrate["rate"];
        }
        if (!$iserror) {

            $player_name = $_SESSION['player'];

            $getting = "select part_no from main_stock where player='$player_name'";
            db_connect();
            $rgetting = mysql_query($getting);

            $query_data = mysql_fetch_array($rgetting);
            $part_no = $query_data["part_no"];
            $q2 = "select * from main_stock where part_no='$part_no'";
            db_connect();
            $r2 = mysql_query($q2);
            $qd2 = mysql_fetch_array($r2);
            $stock = $qd2["stock"];
            $broker_status = $qd2["broker_status"];
            $share_of = $qd2["$name"];
            //echo "$share_of";
            if ($share_of < $share) {
                echo "You do not have enough shares.";
            } else {

                $c = $rate * $share;
                $stock = $stock + $c;
                $q1 = "select * from comp where name='$name'";
                db_connect();
                $r1 = mysql_query($q1);
                if (!$r1) {
                    echo "Could not execute query.";
                } else {
                    $qd1 = mysql_fetch_array($r1);
                    $main_rate = $qd1["rate"];
                    $comp_broker = $qd1["broker_status"];
                    $share_comp = $qd1["share"];

                }

                $temp_share = $share_comp + $share;
                $share_of = $share_of - $share;
                if ($broker_status == 1 && $comp_broker == '1') {
                    $temp_calc = ($c * 5) / 100;
                    $stock = $stock - $temp_calc;
                }
                $up_player = "update main_stock set stock='$stock',$name='$share_of' where part_no='$part_no'";
                db_connect();
                $rup_player = mysql_query($up_player);
                if (!$rup_player) {
                    echo "Could not execute query.";
                } else {

                    $t = ($share / 2) * ($rate / 8) * 0.0001;
                    $temp = $rate;
                    $rate = $rate - $t;
                    $q = "SELECT rate FROM open_stock WHERE name='$name'";
                    $zr = mysql_query($q);
                    $zzr = mysql_fetch_array($zr);
                    if ($rate < 0.1 * $zzr['rate'])
                        $rate = 0.1 * $zzr['rate'];
                    $upp = "update comp set rate='$rate',share='$temp_share' where name='$name'";
                    db_connect();
                    $rupp = mysql_query($upp);
                    if (!$rupp) {
                        echo "Could not execute query.";
                    } else {
                        //echo 'Transaction completed for'.$name;
                        $msg = 'Transaction completed for ' . $share . ' shares of ' . $name . ' at rate Rs. ' . $temp;
                        echo $msg;
                        $insert_status = "insert into status_message(player,message,time) values ('$part_no','$msg',CURTIME())";
                        db_connect();
                        $rinsert_status = mysql_query($insert_status);
                        if (!$insert_status) {
                            echo "Could not execute query.";
                        } else {

                        }
                    }
                }
                //}
                //}
            }
        }
    }//method
    else {
        ?>

        <script type="text/javascript"><!--
            setTimeout('Redirect()', 500);
            function Redirect() {
                location.href = 'dashboard.php';
            }
            // --></script>
    <?php
    }
}//player
else {
    ?>

    <script type="text/javascript"><!--
        setTimeout('Redirect()', 2000);
        function Redirect() {
            location.href = 'index.php';
        }
        // --></script>
<?php
}
?>