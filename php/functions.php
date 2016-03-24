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

?>

