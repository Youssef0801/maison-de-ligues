<?php
session_start();
require_once 'model/db.php';

// Rediriger si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Récupérer un collaborateur aléatoire (sauf soi-même)
$idActuel = $_SESSION['user']['id'];
$stmt = $pdo->prepare("SELECT * FROM collaborateur WHERE id != ? ORDER BY RAND() LIMIT 1");
$stmt->execute([$idActuel]);
$collaborateur = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom']) ?> 👋</h1>

    <section>
        <h2>Tu pourrais dire bonjour à :</h2>

        <?php if ($collaborateur): ?>
            <div class="carte-collaborateur">
                <img src="<?= htmlspecialchars($collaborateur['photo']) ?>" alt="Photo de profil" width="150">
                <p><strong><?= htmlspecialchars($collaborateur['nom']) ?></strong></p>
                <p><?= htmlspecialchars($collaborateur['service']) ?> - <?= htmlspecialchars($collaborateur['city']) ?></p>
            </div>
        <?php else: ?>
            <p>Aucun autre collaborateur pour l’instant.</p>
        <?php endif; ?>

        <form method="post">
            <button type="submit">Dire bonjour à quelqu’un d’autre</button>
        </form>
    </section>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
