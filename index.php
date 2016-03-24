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
    <!-- CSS -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="js/jquery.js"></script>
</head>
<body>
<div class="center name">
    <img src="img/Logo.png" width="40%"><br>
    <p class="white-text">Presents</p>
    <img src="img/wall1.png" width="40%">
</div>
<div class="bottom-sheet login center">
    <button class="btn btn-flat blue waves-effect modal-trigger hide " data-target="logins" id="login">Login</button>
    <p class="white-text show" id="text">Game yet to start</p>
</div>
<?php
if (!isset($_SESSION['player'])) {
    extract($_POST);
if (isset($submit)) {
    $query = "select * from main_stock where player='$name' AND password='$password'";
    db_connect();
    $result = mysql_query($query);
if (!$result) {
    echo "Query error"; //
}
else {
if (mysql_fetch_row($result)) {
    $ans = mysqli_fetch_array($result);
    $_SESSION['player'] = $name;
    ?>
    <script type="text/javascript">
        setTimeout('Redirect()', 500);
        function Redirect() {
            location.href = 'dashboard.php';
        }
    </script>
<?php
}
else {
    echo "<script>alert('Invalid Combinations.Try again')</script>";
}
}

}
}
else
{
?>
    <script type="text/javascript">
        setTimeout('Redirect()', 500);
        function Redirect() {
            location.href = 'dashboard.php';
        }
    </script>
<?php
}
?>
<!-- Modal Structure -->
<div id="logins" class="modal ">
    <div class="modal-content">
        <h4 class="center">Login</h4>
        <div class="row">
            <form class="col s12" action="index.php" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="text" class="validate" required="" name="name">
                        <label for="email" data-error="wrong" data-success="right">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" required="" name="password">
                        <label for="password" data-error="wrong" data-success="right">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center">
                        <button class="btn waves-effect waves-light center" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
db_connect();
    $status = "SELECT status FROM status";
    $result = mysql_query($status);
    if (!$result) {
        echo "Could not execute query.";
    } else {
        $ans = mysql_fetch_array($result);
        if (!$ans['status']) {
            ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    login = document.getElementById('login');
                    text = document.getElementById('text');
                    $(login).removeClass('hide');
                    $(login).addClass('show');
                    $(text).removeClass('show');
                    $(text).addClass('hide');
                    $('.modal-trigger').leanModal();
                });
                console.log("Query is working");
            </script>
        <?php
        }
    }

?>


<div class="container">
    <p class="center-align white-text">&copy;2016 Made by <a class="orange-text text-lighten-3"
                                                             href="http://udaan16.in/">Team Udaan</a></p>

    <p class="center-align white-text"> Credits to senior Mohit Shah and Optimized by <a
            class="orange-text text-lighten-3" href="https://github.com/arvindiyer">Arvind iyer</a></p>
    </div>


<!--  Scripts -->
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
