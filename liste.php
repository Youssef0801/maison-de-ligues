<?php
session_start();
require_once 'model/db.php';

// Vérification de la connexion
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Récupération des collaborateurs
$stmt = $pdo->query("SELECT * FROM collaborateur");
$collaborateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des collaborateurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Liste des collaborateurs</h1>

    <section class="liste-collaborateurs">
        <?php foreach ($collaborateurs as $c): ?>
            <div class="carte">
                <img src="<?= htmlspecialchars($c['photo']) ?>" alt="photo" width="120">
                <h3><?= htmlspecialchars($c['nom']) ?></h3>
                <p>Email : <?= htmlspecialchars($c['email']) ?></p>
                <p>Ville : <?= htmlspecialchars($c['city']) ?> | Pays : <?= htmlspecialchars($c['country']) ?></p>
                <p>Service : <?= htmlspecialchars($c['service']) ?></p>

                <?php if ($_SESSION['user']['isAdmin']): ?>
                    <a href="#">✏️ Modifier</a>
                    <a href="#">🗑️ Supprimer</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <a href="accueil.php">← Retour à l’accueil</a>
</body>
</html>
