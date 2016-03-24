<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 24-Mar-16
 * Time: 4:21 PM
 */
session_start();
include_once("php/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wall-Street</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- CORE CSS-->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
        var XMLHttpRequestObject = false;

        if (window.XMLHttpRequest) {
            XMLHttpRequestObject = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            XMLHttpRequestObject = new
                ActiveXObject("Microsoft.XMLHTTP");
        }
        function refresh(divID, comp_name, no) {
            if (XMLHttpRequestObject) {
                var s1 = divID + no;
                var obj = document.getElementById(s1);
                var params = "name=" + comp_name + "&i=" + no;
                var queryString = "php/get_data.php";
                XMLHttpRequestObject.open("POST", queryString, true);
                XMLHttpRequestObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                XMLHttpRequestObject.setRequestHeader("Content-length", params.length);
                XMLHttpRequestObject.setRequestHeader("Connection", "close");
                XMLHttpRequestObject.onreadystatechange = function () {
                    if (XMLHttpRequestObject.readyState == 4 &&
                        XMLHttpRequestObject.status == 200) {
                        obj.innerHTML = XMLHttpRequestObject.responseText;
                    }
                    else {
                        // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                    }
                }

                XMLHttpRequestObject.send(params);
            }
        }
        function sell(divID, comp_name) {
            if (XMLHttpRequestObject) {
                var obj = document.getElementById(divID);
                var queryString = "sell.php?name=" + comp_name;
                XMLHttpRequestObject.open("GET", queryString, true);
                XMLHttpRequestObject.onreadystatechange = function () {
                    if (XMLHttpRequestObject.readyState == 4 &&
                        XMLHttpRequestObject.status == 200) {
                        obj.innerHTML = XMLHttpRequestObject.responseText;
                    }
                    else {

                        // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                    }
                }

                XMLHttpRequestObject.send(null);
            }
        }

        function buy(divID, comp_name) {
            if (XMLHttpRequestObject) {
                var obj = document.getElementById(divID);
                var queryString = "php/buy.php?name=" + comp_name;
                XMLHttpRequestObject.open("GET", queryString, true);
                XMLHttpRequestObject.onreadystatechange = function () {
                    if (XMLHttpRequestObject.readyState == 4 &&
                        XMLHttpRequestObject.status == 200) {
                        obj.innerHTML = XMLHttpRequestObject.responseText;
                    }
                    else {
                        // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                    }
                }
                XMLHttpRequestObject.send(null);
            }
        }

        function get(divID, comp_name) {
            if (XMLHttpRequestObject) {
                var obj = document.getElementById(divID);
                var queryString = "get_detail_comp.php?name=" + comp_name;
                XMLHttpRequestObject.open("GET", queryString, true);
                XMLHttpRequestObject.onreadystatechange = function () {

                    if (XMLHttpRequestObject.readyState == 4 &&
                        XMLHttpRequestObject.status == 200) {
                        obj.innerHTML = XMLHttpRequestObject.responseText;
                    }
                    else {
                        // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                    }
                }

                XMLHttpRequestObject.send(null);
            }
        }

    </script>

</head>

<body>
<!-- START HEADER -->
<header id="header">
    <!-- start header nav-->
    <div class="navbar-fixed page-topbar">
        <nav class="black darken-4">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><h1 class="logo-wrapper"><a href="#" class="brand-logo darken-1"><img src="img/wall1.png"
                                                                                              width="20%"></a></h1></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->
<!-- START MAIN -->
<div id="main" class="white">
    <!-- Start SIDE NAVBAR -->
    <div id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation collapsible collapsible-accordion">
            <li class="user-details">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src='img/UdaanWing.png' alt='' class='circle responsive-img valign profile-image'/>
                    </div>
                    <div class="col col s8 m8 l8">
                        <a class="btn-flat  waves-effect waves-light white-text profile-btn"
                           href="#"><?php echo $_SESSION['player']; ?><i class="mdi-action-verified-user"></i></a>
                    </div>
                </div>
            </li>
            <li class="no-padding"></li>
            <li class="bold active">
                <a href='#' class='waves-effect waves-cyan'><i class='mdi-action-dashboard'></i>My Account</a>
            </li>
            <li class="bold ">
                <a href='#' class='waves-effect waves-cyan'><i class='mdi-action-explore'></i>How to play</a>
            </li>
            <li class="no-padding"></li>
            <li class="bold ">
                <a href='#' class='waves-effect waves-cyan'><i class='mdi-action-announcement'></i>General News</a>
            </li>
            <li class="bold ">
                <a href='#content1' class='waves-effect waves-cyan'><i class='mdi-action-credit-card'></i>Buyer's Place</a>
            </li>
            <li class="bold ">
                <a href='#' class='waves-effect waves-cyan'><i class='mdi-social-group-add'></i>Broker Section</a>
            </li>
            <li class="bold ">
                <a href='#' class='waves-effect waves-cyan'><i class='mdi-action-explore'></i>Transaction Message </a>
            </li>
            <li class="li-hover">
                <div class="divider"></div>
            </li>
            <li><a href="#"><i class='mdi-content-send'></i>Logout</a>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium  hide-on-large-only"><i
                class="mdi-navigation-menu"></i></a>
    </div>
    <!-- END SIDE NAVBAR -->
    <?php
    $player = $_SESSION['player'];
    $get_info = "select stock from main_stock where player='$player'";
    db_connect();
    $get_infos = mysql_query($get_info);
    if (!$get_infos) {
        echo "Could not execute query.";
    } else {
        $ans = mysql_fetch_array($get_infos);
        $stock = $ans["stock"];
    }
    ?>
    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
                <div class="row">
                    <h1 class="center black-text">Balance</h1>

                    <div class="col s12 center">
                        <div class="card ">
                            <div class="card-content  indigo white-text">
                                <h4 class="card-stats-number"><?php echo $stock . ' Rs'; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--card stats end-->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!--end container-->
    </section>
    <section id="content1">
        <!--start container-->
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4 class="center">Buyers<strong class=" blue-text ">Place</strong></h4>
                    <hr>
                </div>
                <?php
                $st = "select status from status";
                db_connect();
                $rt = mysql_query($st);
                if (!$rt) {
                    echo "Could not execute query.";
                } else {
                    $qd = mysql_fetch_array($rt);
                    $status = $qd["status"];
                }
                $us = $_SESSION['player'];
                $q = "select *from comp order by name";
                db_connect();
                $r = mysql_query($q);
                $i = 1;

                ?>
                <div class="col s12 ">
                    <table id="data-table-simple" class="responsive-table display" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Type</th>
                            <th>Shares</th>
                            <th>Rate</th>
                            <th>Open</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($q_d = mysql_fetch_array($r)) {
                            $q1 = $q_d["name"];
                            $q2 = $q_d["group"];
                            $q3 = $q_d["rate"];
                            $q4 = $q_d["share"];
                            $q5 = $q_d["type"];
                            $cir = $q_d["circuit_status"];
                            $q6 = strtolower($q1);
                            $q7 = strtoupper($q1);
                            $qq = "select rate from open_stock where name='$q1'";
                            db_connect();
                            $rr = mysql_query($qq);
                            if (!$rr) {
                            } else {
                                while ($qd = mysql_fetch_array($rr)) {
                                    $open_rate = $qd["rate"];
                                }
                            }
                            $qhigh = "select * from last_transaction where name='$q1'";
                            db_connect();
                            $rhigh = mysql_query($qhigh);
                            if (!$rhigh) {
                            } else {
                                $qdhigh = mysql_fetch_array($rhigh);
                                $high = $qdhigh["high"];
                                $low = $qdhigh["low"];
                            }
                            $diff = $q3 - $open_rate;
                            $calc = ($diff * 100) / $open_rate;
                            $calc = round($calc, 2);
                            if ($cir == 1) {
                                echo "<tr id=\"tr$i\" ><td>$q7</td><td>$q2</td><td>$q5</td><td>$q4</td>";
                                if ($calc < 0) {
                                    echo "<td style=\"color:red;\">------</td><td>";
                                    ?>---
                                    <?php
                                    echo "</td><td style=\"color:red;\">------</td><td style=\"color:red;\">------</td><td style=\"color:red;\">--------</td><td style=\"color:red;\">--------</td>";
                                } else if ($calc >= 0) {
                                    echo "<td style=\"color:green;\">-------</td><td>";
                                    ?>---
                                    <?php
                                    echo "</td><td style=\"color:green;\">------</td><td style=\"color:green;\">------</td><td style=\"color:green;\">----------</td><td style=\"color:green;\">--------</td>";
                                }

                                if ($status == 0) {
                                    echo "<td>-----CIRCUIT-------</td>";
                                    echo "</TR>";
                                } else {
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tR id=\"tr$i\" ><td>$q7</tD><tD>$q2</tD><tD>$q5</td><tD>$q4</td>";
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

                                if ($status == 0) {
                                    echo "<td><a href=\"#\" onclick=\"refresh('tr','$q6','$i')\">Refresh</a>&nbsp;&nbsp;<a href='#' id='ak_sign_in' onClick=\"$.showAkModal('buy.php?name=$q6','$q1',300,200);return false;\">BUY</a>&nbsp;&nbsp;<a href='#' id='ak_sign_in' onClick=\"$.showAkModal('sell.php?name=$q6','$q1',300,200);return false;\">SELL</a></td>";
                                    echo "</TR>";
                                } else {
                                    echo "</tr>";
                                }
                            }//cir
                            $i = $i + 1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end container-->
    </section>


    <!-- END MAIN -->
    <!-- START FOOTER -->
    <footer class="page-footer black darken-4">
        <div class="footer-copyright ">
            <div class="container ">
                &copy;2016 Team Udaan
                <span class="right"> Credits to senior Mohit Shah and Optimized by<a
                        class="orange-text text-lighten-3" href="https://github.com/arvindiyer"> Arvind iyer</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- ================================================
    Scripts
    ================================================ -->
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--Extra-->
    <script type="text/javascript" src="js/plugin.js"></script>


</body>
</html>

