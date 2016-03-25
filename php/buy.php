<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 24-Mar-16
 * Time: 9:03 PM
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
        /*if($share>500)
        {
            $iserror=true;
            echo "You cant buy more than 500 shares";
        }*/
        $q_rate = "select rate from open_stock where name='$name'";
        $connect = db_connect();
        $r_rate = mysqli_query($connect, $q_rate);
        if (!$r_rate) {
            echo "Could not execute query.";
        } else {
            $qdrate = mysqli_fetch_array($r_rate);
            $open_rate1 = $qdrate["rate"];
        }


        $q_rate = "select rate from comp where name='$name'";
        $connect = db_connect();
        $r_rate = mysqli_query($connect, $q_rate);
        if (!$r_rate) {
            echo "Could not execute query.";
        } else {
            $qdrate = mysqli_fetch_array($r_rate);
            $rate = $qdrate["rate"];
        }
        if (!$iserror) {

            $player_name = $_SESSION['player'];
            $getting = "select part_no from main_stock where player='$player_name'";
            $connect = db_connect();
            $rgetting = mysqli_query($connect, $getting);
            $query_data = mysqli_fetch_array($rgetting);
            $part_no = $query_data["part_no"];
            $q2 = "select * from main_stock where part_no='$part_no'";
            $connect = db_connect();
            $r2 = mysqli_query($connect, $q2);
            $qd2 = mysqli_fetch_array($r2);
            $your_stock = $qd2["stock"];
            $broker_status = $qd2["broker_status"];
            $share_of = $qd2["$name"];
            $stock = $qd2["stock"];
            $c = $rate * $share;
            $stock = $stock - $c;

            if ($stock < 0) {
                echo "You do not have enough stock";
            } else {

                $q1 = "select * from comp where name='$name'";
                $connect = db_connect();
                $r1 = mysqli_query($connect, $q1);
                if (!$r1) {
                    echo "Could not execute query.";
                } else {
                    $qd1 = mysqli_fetch_array($r1);
                    $main_rate = $qd1["rate"];
                    $comp_broker = $qd1["broker_status"];
                    $share_comp = $qd1["share"];

                }

                $temp_share = $share_comp - $share;
                if ($temp_share < 0) {
                    echo "Company do not have enough shares.";
                } else {
                    $share_of = $share_of + $share;
                    if ($broker_status == 1 && $comp_broker == '1') {
                        $temp_calc = ($c * 5) / 100;
                        $stock = $stock - $temp_calc;
                    }
                    if ($c < 0) {
                        echo "You do not have enough stock.";
                    } else {
                        $up_player = "update main_stock set stock='$stock',$name='$share_of' where part_no='$part_no'";
                        $connect = db_connect();
                        $rup_player = mysqli_query($connect, $up_player);
                        if (!$rup_player) {
                            echo "Could not execute query.";
                        } else {

                            $t = ($share / 2) * ($rate / 8) * 0.00005;
                            $temp = $rate;
                            $rate = $rate + $t;


                            $upp = "update comp set rate='$rate',share='$temp_share' where name='$name'";
                            $connect = db_connect();
                            $rupp = mysqli_query($connect, $upp);
                            if (!$rupp) {
                                echo "Could not execute query.";
                            } else {
                                echo "Transaction completed for $share of $name";
                                $msg = 'Transaction completed for ' . $share . ' shares of ' . $name . ' with rate Rs. ' . $temp;
                                $insert_status = "insert into status_message(player,message,time) values ('$part_no','$msg',CURTIME())";
                                $connect = db_connect();
                                $rinsert_status = mysqli_query($connect, $insert_status);
                                if (!$insert_status) {
                                    echo "Could not execute query.";
                                } else {

                                }
                            }
                        }
                    }
                }
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
    echo "You are not login.";
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