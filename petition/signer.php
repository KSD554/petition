<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petition_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Sécuriser les données reçues
$name = htmlspecialchars(trim($_POST['name']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

// Validation de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse email invalide");
}

// Vérifier si l'email a déjà signé
$sql = "SELECT COUNT(*) AS count FROM signatures WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data['count'] > 0) {
    echo "Vous avez déjà signé cette pétition.";
    header("Location:confirmation.php");
    exit();
}

// Préparer et exécuter l'insertion
$sql = "INSERT INTO signatures (name, email) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $email);

if ($stmt->execute()) {
    // Envoi de l'email de notification
    $to = "kouassisadok3@gmail.com";
    $subject = "Nouvelle Signature";
    $message = "Une nouvelle signature a été ajoutée :\n\nNom : $name\nEmail : $email";
    $headers = "From: no-reply@votreorganisation.com";

    mail($to, $subject, $message, $headers);

    header("Location:confirmation.php");
    exit();
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
