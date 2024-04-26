<?php

$serverName = "DESKTOP-6PAU455\\CSDLPT_N8";
$connectionOptions = array(
    "Database" => "QLCHS",
    "Uid" => "sa",
    "PWD" => "123",
    "CharacterSet" => "UTF-8"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);