<?php

$host = 'localhost';

$db = 'reservation_db';

$user = 'root';

$pass = '';



$dsn = "mysql:host=$host;dbname=$db";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

];



try {

    $pdo = new PDO($dsn, $user, $pass, $options);



    $stmt = $pdo->query('SELECT name AS title, start_date AS start, end_date AS end FROM reservations');



    $events = $stmt->fetchAll();

    echo json_encode($events);
} catch (PDOException $e) {

    echo 'Connection failed: ' . $e->getMessage();
}
