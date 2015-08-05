<?php 
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');
require_once 'db_connect.php';

$dbc->exec('TRUNCATE national_parks');

$parks = [
    ['name' => 'Acadia',   'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => 47389.67, 'description' => 'cool park'],
    ['name' => 'American Samoa',   'location' => 'American Samoa', 'date_established' => '1988-10-31', 'area_in_acres' => 9000.00, 'description' => 'nice park'],
    ['name' => 'Arches',   'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => 76518.98, 'description' => 'great park'],
    ['name' => 'Badlands',   'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94, 'description' => 'bad park'],
    ['name' => 'Big Bend',   'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21, 'description' => 'big park'],
    ['name' => 'Biscayne',   'location' => 'Florida', 'date_established' => '1980-06-28', 'area_in_acres' => 172924.07, 'description' => 'hot park'],
    ['name' => 'Bryce Canyon',   'location' => 'Utah', 'date_established' => '1928-02-25', 'area_in_acres' => 35835.08, 'description' => 'righteous park'],
    ['name' => 'Canyonlands',   'location' => 'Utah', 'date_established' => '1964-09-26', 'area_in_acres' => 337597.83, 'description' => 'radical park'],
    ['name' => 'Congaree',   'location' => 'South Carolina', 'date_established' => '2003-11-10', 'area_in_acres' => 26545.86, 'description' => 'yolo park'],
    ['name' => 'Denali',   'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => 4740911.72, 'description' => 'best park']
];

// PREPARES FOREACH FOR PROTECTED STATEMENTS
$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :loc, :dateest, :area, :descr)');

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':loc', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':dateest', $park['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area', $park['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':descr', $park['description'], PDO::PARAM_STR);
    // INSERT ALL VALUES HERE
    $stmt->execute();
}