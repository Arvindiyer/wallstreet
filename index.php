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
<div class="bottom-sheet login center">
    <button class="btn btn-flat blue waves-effect hide">Login</button>
    <p class="white-text show">Game yet to start</p>
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
