<?php
    define("HOST", "localhost");
    define("LOGIN", "admin-student");
    define("PASS", "co0ki3SaVerty");
    define("BDD", "cooklearning");

    $mysqli = @new MySQLI(HOST, LOGIN, PASS, BDD);

    if($mysqli->connect_errno) {
        die("<p>Service indisponible </p>");
    } else {
        $mysqli->set_charset("utf8");
    }
?>