<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 23-Mar-16
 * Time: 12:58 PM
 */

session_start();
include_once("php/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Wall-Street</title>
    <!-- CSS  -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div class="center name">
    <img src="img/Logo.png" width="40%"><br>
    <p class="white-text">Presents</p>
    <img src="img/wall1.png" width="40%">
</div>
<?php
if (!isset($_SESSION['player1'])) {
    echo "Error";
} else {
    //db_connect();
    $connect = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("udan_vsm", $connect);
    $status = "SELECT status FROM status";
    $result = mysql_query($status);
    $status = 0;
    if (!$result) {
        echo "Could not execute query.";
    } else {
        $st = mysql_fetch_array($result);
        $status = $st["status"];
    }
    if ($status == 0) {
        echo "Welcome";
        ?>
        <script type="text/javascript">
            login = document.getElementById('login');
            text = document.getElementById('text');
            login.addClass("show");
            text.addClass("hide");
        </script>
    <?php
    } else {
        echo "Error";
    }
}
?>
<div class="bottom-sheet login center">
    <button class="btn btn-flat blue waves-effect hide" id="login">Login</button>
    <p class="white-text show" id="text">Game yet to start</p>
</div>


<footer>
    <div class="footer-copyright">
        <div class="container">
            <p class="center white-text">Made by <a class="orange-text text-lighten-3" href="#">Team Udaan</a>
            <p class="center white-text">Optimized by <a class="orange-text text-lighten-3" href="#">Arvind iyer</a>
            <p>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="js/jquery.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
