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
                <a href='#' class='waves-effect waves-cyan page-scroll' page-scroll><i class='mdi-action-dashboard'></i>My
                    Account</a>
            </li>
            <li class="bold ">
                <a href='#' class='waves-effect waves-cyan page-scroll'><i class='mdi-action-explore'></i>How to
                    play</a>
            </li>
            <li class="no-padding"></li>
            <li class="bold ">
                <a href='#content1' class='waves-effect waves-cyan page-scroll'><i class='mdi-action-announcement'></i>General
                    News</a>
            </li>
            <li class="bold ">
                <a href='#content2' class='waves-effect waves-cyan page-scroll'><i class='mdi-action-credit-card'></i>Buyer's
                    Place</a>
            </li>

            <li class="bold ">
                <a href='#content5' class='waves-effect waves-cyan page-scroll'><i
                        class='mdi-action-add-shopping-cart'></i>Owned Stock</a>
            </li>
            <li class="bold ">
                <a href='#content3' class='waves-effect waves-cyan page-scroll'><i class='mdi-social-group-add'></i>Broker
                    Section</a>
            </li>
            <li class="bold ">
                <a href='#content4' class='waves-effect waves-cyan page-scroll'><i class='mdi-action-explore'></i>Transaction
                    Message </a>
            </li>
            <li class="li-hover">
                <div class="divider"></div>
            </li>
            <li><a href="logout.php"><i class='mdi-content-send'></i>Logout</a>
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
    <!-- START CONTENT -->
    <section id="content1">
        <!--start container-->
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <div class="card black darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">General News</span>
                            <?php
                            $qu = "select status from status";
                            db_connect();
                            $ru = mysql_query($qu);
                            if (!$ru) {
                                die(mysql_error());
                            } else {
                                while ($quu = mysql_fetch_array($ru)) {
                                    $status = $quu["status"];
                                }
                            }
                            if ($status == 0) {
                                $q = "select * from news where name='name'";
                                db_connect();
                                $r = mysql_query($q);
                                if (!$r) {
                                    die(mysql_error());
                                } else {
                                    while ($q_d = mysql_fetch_array($r)) {
                                        $q1 = $q_d['news'];
                                        ?>
                                        <h5 id="news"><?php echo "$q1"; ?></h5>
                                    <?php
                                    }
                                }
                            } else {
                                echo "Game yet not strated";

                            }
                            ?>
                            <div class="card-action">
                                <button class='btn btn-small waves-effect green center' onclick="news()">Refresh
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="card-stats">
                <div class="row">
                    <h1 class="center black-text"></h1>

                    <div class="col s12 center">
                        <div class="card ">
                            <div class="card-content  indigo white-text">
                                <p id="message" class="card-stats-number">Stock error/success message displayed here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--end container-->
    </section>
    <script type="text/javascript">
        var XMLHttpRequestObject = false;
        if (window.XMLHttpRequest) {
            XMLHttpRequestObject = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            XMLHttpRequestObject = new
                ActiveXObject("Microsoft.XMLHTTP");
        }
        function news() {
            location.href = "dashboard.php";
        }
    </script>
    <section id="content2">
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
                    <table id="data-table-simple" class="responsive-table display" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th align="left">Name</th>
                            <th align="left">Group</th>
                            <th align="left">Type</th>
                            <th align="left">Shares</th>
                            <th align="left">Rate</th>
                            <th align="left"></th>
                            <th align="left">Open</th>
                            <th>Action</th>
                            </th></tr>
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
                                    echo "<td><button class='btn-floating btn-small waves-effect green' onclick=\"refresh('tr','$q6','$i')\">Refresh</button>&nbsp;&nbsp;<button class='btn-floating btn-small waves-effect modal-trigger' data-target='buys' id='buy' onclick=\"gets('$q6')\">BUY</button>&nbsp;&nbsp;<button class='btn-floating btn-small waves-effect modal-trigger indigo' data-target='sells' id='sell' onclick=\"gets('$q6')\">SELL</a></td>";
                                    echo "</tr>";
                                } else {
                                    echo "</tr>";
                                }
                            }//cir
                            $i = $i + 1;
                        }
                        ?>
                        <script type="text/javascript">
                            var XMLHttpRequestObject = false;
                            var msgs;
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
                                        if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
                                            location.href = 'dashboard.php';
                                        }
                                        else {
                                            // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                                        }
                                    }

                                    XMLHttpRequestObject.send(params);
                                }
                            }
                            function gets(value) {
                                localStorage.setItem("name", value);
                                //console.log(value);
                            }
                            function buy() {
                                if (XMLHttpRequestObject) {
                                    var obj = document.getElementById("message");
                                    var x = document.getElementById('share').value;
                                    var y = localStorage.getItem("name");
                                    console.log(x);
                                    console.log(y);
                                    var params = "name=" + y + "&share=" + x;
                                    var queryString = "php/buy.php";
                                    XMLHttpRequestObject.open("POST", queryString, true);
                                    XMLHttpRequestObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    XMLHttpRequestObject.setRequestHeader("Content-length", params.length);
                                    XMLHttpRequestObject.setRequestHeader("Connection", "close");
                                    XMLHttpRequestObject.onreadystatechange = function () {
                                        if (XMLHttpRequestObject.readyState == 4 &&
                                            XMLHttpRequestObject.status == 200) {
                                            // msgs=localStorage.getItem("message");
                                            //console.log("In xml block");
                                            obj.innerHTML = XMLHttpRequestObject.responseText;
                                            console.log(obj);
                                            $('#buys').closeModal();
                                            //location.href = 'dashboard.php';
                                        }
                                        else {
                                            //var msg=localStorage.getItem("message");
                                            //document.getElementById("message").innerHTML = msg;
                                            // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                                        }
                                    };
                                    XMLHttpRequestObject.send(params);
                                    //XMLHttpRequestObject.open("GET","php/buy.php?name="+y,true);
                                    //XMLHttpRequestObject.send();

                                }
                            }

                            function sell() {
                                if (XMLHttpRequestObject) {

                                    var obj = document.getElementById("message");
                                    var x = document.getElementById('sell-share').value;
                                    var y = localStorage.getItem("name");
                                    console.log(x);
                                    console.log(y);
                                    var params = "name=" + y + "&share=" + x;
                                    var queryString = "php/sell.php";
                                    XMLHttpRequestObject.open("POST", queryString, true);
                                    XMLHttpRequestObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    XMLHttpRequestObject.setRequestHeader("Content-length", params.length);
                                    XMLHttpRequestObject.setRequestHeader("Connection", "close");
                                    XMLHttpRequestObject.onreadystatechange = function () {
                                        if (XMLHttpRequestObject.readyState == 4 &&
                                            XMLHttpRequestObject.status == 200) {
                                            obj.innerHTML = XMLHttpRequestObject.responseText;
                                            console.log(obj);
                                            $('#sells').closeModal();
                                            //location.href = 'dashboard.php';
                                        }
                                        else {
                                            // obj.innerHTML="<div style=\"margin-left:100px;\"><img src=\"loading.gif\"/></div>";
                                        }
                                    }
                                    XMLHttpRequestObject.send(params);
                                }
                            }
                        </script>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end container-->
    </section>

    <div id="buys" class="modal">
        <div class="modal-content">
            <h4 class="center">Buy shares</h4>

            <div class="row">
                <div class="col s12" id="buyer">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="share" type="text" class="validate" required="" name="share">
                            <label for="share" data-error="wrong" data-success="right">Share</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 center">
                            <button class="btn waves-effect waves-light center" onclick="buy()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sells" class="modal">
        <div class="modal-content">
            <h4 class="center">Sell shares</h4>

            <div class="row">
                <div class="col s12" id="seller">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="sell-share" type="text" class="validate" required="" name="share">
                            <label for="share" data-error="wrong" data-success="right">Share</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 center">
                            <button class="btn waves-effect waves-light center" name="submit" onclick="sell()">Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="content5">
        <!--start container-->
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4 class="center">Owned <strong class=" blue-text ">Stock</strong></h4>
                    <hr>
                </div>
                <?php
                $gett = "select * from main_stock where player='$player'";
                db_connect();
                $rgett = mysql_query($gett);
                $qdgett = mysql_fetch_array($rgett);
                $stock = $qdgett["stock"];
                echo "<Table><tr><Td>";
                $get_comp = "select name from comp order by name limit 0,10";
                db_connect();
                $rget_comp = mysql_query($get_comp);
                $i = 0;
                echo "<table border=\"1\" width=\"300px\">";
                echo "<tr style=\"background-color: #929DED;\"><th>Company&nbsp;Name</th><Th>Shares</th></tr>";
                while ($qdget_comp = mysql_fetch_array($rget_comp)) {
                    $comp[$i] = $qdget_comp["name"];

                    echo "<tr style=\"background-color:#B8C7C6;\"><td>$comp[$i]</td>";
                    $share1 = "select $comp[$i] from main_stock where player='$player'";
                    db_connect();
                    $rshare = mysql_query($share1);
                    if (!$rshare) {
                        die(mysql_error());
                    } else {
                        $qdshare = mysql_fetch_array($rshare);
                        $share2 = $qdshare[0];
                        echo "<td>$share2</td></tR>";
                    }

                }

                echo "</table>";
                echo "</td><tD>";
                $get_comp = "select name from comp order by name limit 10,10";
                db_connect();
                $rget_comp = mysql_query($get_comp);
                $i = 0;
                echo "<table border=\"1\" width=\"300px\">";
                echo "<tr style=\"background-color: #929DED;\"><th>Company&nbsp;Name</th><Th>Shares</th></tr>";
                while ($qdget_comp = mysql_fetch_array($rget_comp)) {
                    $comp[$i] = $qdget_comp["name"];

                    echo "<tr style=\"background-color:#B8C7C6;\"><td>$comp[$i]</td>";
                    $share1 = "select $comp[$i] from main_stock where player='$player'";
                    db_connect();
                    $rshare = mysql_query($share1);
                    if (!$rshare) {
                        die(mysql_error());
                    } else {
                        $qdshare = mysql_fetch_array($rshare);
                        $share2 = $qdshare[0];
                        echo "<td>$share2</td></tR>";
                    }

                }

                echo "</table>";
                echo "</tD></tr></table>";
                ?>

            </div>
        </div>
        <!--end container-->
    </section>

    <section id="content3">
        <!--start container-->
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <div class="card grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Broker Section</span>

                            <div id='broker'>
                                <?php

                                $qu = "select status from status";
                                db_connect();
                                $ru = mysql_query($qu);
                                if (!$ru) {
                                    die(mysql_error());
                                } else {
                                    while ($quu = mysql_fetch_array($ru)) {
                                        $status = $quu["status"];
                                    }

                                }
                                if ($status == 0) {
                                    $pl = $_SESSION['player'];
                                    $q = "select broker_status from main_stock where player='$pl'";

                                    db_connect();
                                    $r = mysql_query($q);
                                    if (!$r) {
                                        die(mysql_error());
                                    } else {
                                        while ($q_d = mysql_fetch_array($r)) {
                                            $q1 = $q_d['broker_status'];
                                        }
                                        if ($q1 == 1) {
                                            $q_bn = "select news from news where name='broker'";
                                            db_connect();
                                            $r_bn = mysql_query($q_bn);
                                            if (!$r_bn) {
                                                echo "Could not execute query.";
                                            } else {
                                                $qdn = mysql_fetch_array($r_bn);
                                                $bnews = $qdn["news"];
                                                echo $bnews;
                                                echo "<br><br><button class='btn btn-small waves-effect green' name=\"buttom\" value=\"Refresh\" onclick=\"broker('broker')\" class=\"button\">Refresh</button>";
                                                /*echo "Discard Broker :<input type=\"button\" name=\"assign\" id=\"assign\" value=\"Assign\" onclick=\"assign('broker')\"/>";*/
                                            }
                                        } else if ($q1 == 0) {

                                            echo "<button class='btn btn-small waves-effect green' name=\"assign\" id=\"assign\" value=\"Assign\" onclick=\"assign('broker')\">Assign</button>";
                                        }
                                    }
                                } else {
                                    echo "You cant play..Game has been stopped.";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end container-->
        </div>
    </section>
    <script type="text/javascript">
        var XMLHttpRequestObject = false;

        if (window.XMLHttpRequest) {
            XMLHttpRequestObject = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            XMLHttpRequestObject = new
                ActiveXObject("Microsoft.XMLHTTP");
        }
        function assign(divID) {

            if (XMLHttpRequestObject) {

                var obj = document.getElementById(divID);
                var temp = 'mohit';
                var params = "name=" + temp;
                var queryString = "php/change_b_status.php";
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
        function broker(divID) {

            if (XMLHttpRequestObject) {

                var obj = document.getElementById(divID);
                var temp = 'mohit';
                var params = "name=" + temp;
                var queryString = "php/read_news.php";
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
        function read_news(divID) {

            if (XMLHttpRequestObject) {

                var obj = document.getElementById(divID);
                var temp = 'mohit';
                var params = "name=" + temp;
                var queryString = "php/read_news.php";
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
    </script>
    <section id="content4">
        <div class="container">
            <div class="card black">
                <div class="card-content white-text ">
                    <p class="card-title center">Transactions Done So far</p>
                    <?php
                    if (isset($_SESSION['player'])) {
                        $st = "select status from status";
                        db_connect();
                        $rt = mysql_query($st);
                        if (!$rt) {
                            echo "Could not execute query.";
                        } else {
                            $qd = mysql_fetch_array($rt);
                            $status = $qd["status"];
                        }
                        if ($status == 1) {
                            echo "Game has been stopped.";
                        } else {
                            $player_name = $_SESSION['player'];
                            $getting = "select part_no from main_stock where player='$player_name'";
                            db_connect();
                            $rgetting = mysql_query($getting);
                            $query_data = mysql_fetch_array($rgetting);
                            $part_no = $query_data["part_no"];
                            $q = "select * from status_message where player='$part_no' order by time desc";
                            db_connect();
                            $r = mysql_query($q);
                            if (!$r) {
                                die(mysql_error());
                            } else {
                                $i = 0;
                                while ($qd = mysql_fetch_array($r)) {
                                    $time = $qd["time"];
                                    $msg = $qd["message"];
                                    if ($i == 0) {
                                        echo "<p><span>Last Message :</span><span style=\"color:blue\">$msg at $time.</span></p><br>";
                                    } else {
                                        echo "<p>$msg at $time.</p><br>";
                                    }
                                    $i = $i + 1;
                                }
                            }
                        }
                    } else {
                        //redirect
                    }
                    ?>
                </div>
            </div>
        </div>
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

