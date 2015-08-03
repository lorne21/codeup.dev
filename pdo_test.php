<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'employees');
define('DB USER', 'codeup');
define('DB_PASS', 'password');

REQUIRE "db_connect.php";

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";




?>