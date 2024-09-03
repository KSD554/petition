<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pétition contre les Woubi et les Wouba</title>
    <link rel="icon" href="../petition/asserts/images/téléchargement.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../petition/asserts/css/style.css"> <!-- Styles personnalisés -->
</head>
<body>
    <header class="bg-success text-white text-center py-4">
        <h1>Pétition contre les Woubi et les Wouba</h1>
    </header>

    <div class="container my-5">
    <section>
            <h2>Pourquoi cette pétition ?</h2>
            <p>Nous lançons cette pétition pour lutter contre les Woubi et les Wouba. Ces problèmes affectent notre communauté de manière significative, et nous devons agir pour changer les choses. Votre soutien est crucial pour atteindre notre objectif.</p>
        </section>

        <section>
            <h2>Objectif</h2>
            <p>L'objectif est de recueillir 5 000 signatures pour cette pétition.</p>
        </section>

        <section class="mt-4">
            <h2>Signer la Pétition</h2>
            <form action="signer.php" method="post" class="form-group" id="petition-form">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" required pattern="[A-Za-z\s]+" title="Veuillez entrer uniquement des lettres">
        </div>
        <div class="col-md-6 mb-3">
            <label for="email">Adresse Email :</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Signer</button>
</form>

        </section>

        <section class="mt-4">
            <h2>Progrès de la Pétition</h2>
            <div id="progress-container" class="mb-3">
                <div id="progress-bar" class="bg-success text-white text-center"></div>
            </div>
            <p id="signatures-count">0 personnes ont signé</p>
            <p id="remaining-count">Il reste 5000 signatures pour atteindre l'objectif.</p>
        </section>
    </div>

    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 KSD. Tous droits réservés.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./asserts/js/script.js"></script>
</body>
</html>
