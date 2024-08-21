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



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];

    $start = $_POST['start'];

    $end = $_POST['end'];



    try {

        $pdo = new PDO($dsn, $user, $pass, $options);



        $stmt = $pdo->prepare('INSERT INTO reservations (name, start_date, end_date) VALUES (?, ?, ?)');

        $stmt->execute([$name, $start, $end]);



        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {

        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
