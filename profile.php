<?php
session_start();
require_once 'model/db.php';

// Vérification admin
if (!isset($_SESSION['user']) || !$_SESSION['user']['isAdmin']) {
    header("Location: login.php");
    exit;
}

// Vérifie qu'un ID est présent
if (!isset($_GET['id'])) {
    echo "Collaborateur introuvable.";
    exit;
}

$id = (int)$_GET['id'];

// Récupère les infos du collaborateur
$stmt = $pdo->prepare("SELECT * FROM collaborateur WHERE id = ?");
$stmt->execute([$id]);
$collab = $stmt->fetch();

if (!$collab) {
    echo "Collaborateur non trouvé.";
    exit;
}

// Mise à jour si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $service = $_POST['service'];

    $update = $pdo->prepare("UPDATE collaborateur SET nom = ?, email = ?, city = ?, country = ?, service = ? WHERE id = ?");
    $update->execute([$nom, $email, $city, $country, $service, $id]);

    header("Location: liste.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier collaborateur</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Modifier le profil : <?= htmlspecialchars($collab['nom']) ?></h1>

    <form method="POST">
        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?= htmlspecialchars($collab['nom']) ?>" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($collab['email']) ?>" required><br><br>

        <label>Ville :</label><br>
        <input type="text" name="city" value="<?= htmlspecialchars($collab['city']) ?>"><br><br>

        <label>Pays :</label><br>
        <input type="text" name="country" value="<?= htmlspecialchars($collab['country']) ?>"><br><br>

        <label>Service :</label><br>
        <input type="text" name="service" value="<?= htmlspecialchars($collab['service']) ?>"><br><br>

        <button type="submit">✅ Enregistrer</button>
    </form>

    <br>
    <a href="liste.php">← Retour à la liste</a>
</body>
</html>
