<?php
function conexion() {
    $host = "dpg-cr6bdj1u0jms73bn1teg-a.oregon-postgres.render.com";
    $port = "5432";
    $dbname = "render_3rc5";
    $user = "render_3rc5_user";
    $password = "QU1xfoO7mi3l2mNRCGBvQfBidqreXPiB";
    $sslmode = "require";   // obligatorio en Render

    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=$sslmode";
    $db = @pg_connect($conn_string);

    if (!$db) {
        error_log("ERROR pg_connect: " . pg_last_error());
        return false;
    }
    return $db;
}