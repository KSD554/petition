<?php
header('Content-Type: application/json');

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petition_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die(json_encode(['error' => $conn->connect_error]));
}

// Obtenir le nombre de signatures
$sql = "SELECT COUNT(*) AS count FROM signatures";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$count = $data['count'];

// Obtenir l'objectif de signatures
$sql = "SELECT value FROM config WHERE `key` = 'signature_goal'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$goal = $data['value'];

echo json_encode(['count' => $count, 'goal' => $goal]);

$conn->close();
?>
