<?php
/**
 * Created by PhpStorm.
 * User: Arvind
 * Date: 25-Mar-16
 * Time: 3:59 AM
 */
?>
<?php
session_start();
include_once("php/functions.php");
?>

<html>
<head>
    <title>The Wall Street</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Wall-street</title>
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
<div class="center white-text">
    <?php
    if (isset($_SESSION['player'])) {
        $user = $_SESSION['player'];
        $result_dest = session_destroy();//destroying session
    }
    if (!empty($user))// checking if $user is empty or contain some data
    {
        if ($result_dest) {
            // if they were logged in and are now logged out
            echo "<div align=\"center\" style=\"margin-top:10px;\">$user Logged out.&nbsp;Go&nbsp;to&nbsp;<a href=\"index.php\">Home&nbsp;page.</a><br>";
            ?>
            <?php
            echo "</div>";
        } else {
            //  logged in and could not be logged out
            echo "Oops some error.<br>";
        }
    } else {
        // if they weren't logged in but came to this page somehow
        echo "You were not logged in, and so you have  been logged out.<br>";
        echo "Go to <a href=\"index.php\">Login Page</a>";//link for login pagee
    }


    ?>


</div>
<!-- end main -->
</body>
</html>
