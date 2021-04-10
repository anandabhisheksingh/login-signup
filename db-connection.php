<?php 
    // Database server url and port
    define('DB_SERVER', 'localhost');

    // Database server username
    define('DB_USERNAME', 'root');

    // Database user password
    define('DB_PASSWORD', '');

    // Database name
    define('DB_DATABASE', 'test');
    
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
