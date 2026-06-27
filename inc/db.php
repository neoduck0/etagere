<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "etagere";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        $conn = null;
    }
} catch (mysqli_sql_exception) {
    $conn = null;
}
