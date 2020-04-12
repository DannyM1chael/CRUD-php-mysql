<?php
    $host = "localhost:3333";
    $user = "root";
    $password = "HackerU2018";

    $connection = new mysqli($host, $user, $password);
    if ($connection->connect_error){
        die("connection failed:" . $connection->connect_error);
    }
    echo "connected";