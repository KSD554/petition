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

// Obtenir le nombre total de signatures
$sql = "SELECT COUNT(*) AS total FROM signatures";
$result = $conn->query($sql);
$totalSignatures = $result->fetch_assoc()['total'];

// Obtenir les signatures par jour
$sql = "SELECT DATE(date_added) AS date, COUNT(*) AS count FROM signatures GROUP BY DATE(date_added)";
$result = $conn->query($sql);
$dailySignatures = [];
while ($row = $result->fetch_assoc()) {
    $dailySignatures[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analyse des Signatures</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container my-5">
        <h1>Analyse des Signatures</h1>
        <p>Total de signatures : <?php echo $totalSignatures; ?></p>

        <canvas id="dailySignaturesChart" width="400" height="200"></canvas>

        <script>
            const ctx = document.getElementById('dailySignaturesChart').getContext('2d');
            const data = {
                labels: <?php echo json_encode(array_column($dailySignatures, 'date')); ?>,
                datasets: [{
                    label: 'Signatures par Jour',
                    data: <?php echo json_encode(array_column($dailySignatures, 'count')); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            new Chart(ctx, config);
        </script>
    </div>
</body>
</html>
