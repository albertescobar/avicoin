<?php

define('USER', 'ddb201288');
define('PASSWORD', 'Z}Bd3)0Lg-h');
define('HOST', 'bbdd.ambiens.es');
define('DATABASE', 'ddb201288');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}//echo "Connected successfully \n";
?>
