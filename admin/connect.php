<?php

$serverName = "DUONGNGUYEN\CSDLPT_N8";
$connectionOptions = array(
    "Database" => "QuanLyCHS",
    "Uid" => "sa",
    "PWD" => "123",
    "CharacterSet" => "UTF-8"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);