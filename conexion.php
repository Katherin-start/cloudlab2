<?php

    function conexion(){

    $host = "host=dpg-d723d6gule4c7395ksrg-a.oregon-postgres.render.com";
    $port = "port=5432";
    $dbname = "dbname=render_3rc5";
    $user = "user=render_3rc5_user";
    $password = "password=QU1xfoO7mi3l2mNRCGBvQfBidqreXPiB";

    $db = pg_connect("$host $port $dbname $user $password");

    return $db;
}
?>