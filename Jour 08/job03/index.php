<?php
session_start();

// Gestion du reset
if (isset($_POST['reset'])) {
    unset($_SESSION['prenoms']);
}

// Initialiser la liste des prénoms si elle n'existe pas
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}

// Ajouter un prénom s'il est envoyé
if (isset($_POST['prenom']) && !empty(trim($_POST['prenom']))) {
    $nouveauPrenom = trim($_POST['prenom']);
    $_SESSION['prenoms'][] = $nouveauPrenom;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 03 - Liste de prénoms (SESSION)</title>
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>
<body>
    <div class="container">
        <h1> Job 03 - Liste de prénoms avec SESSION</h1>
        
        <div class="info">
            <h3> Fonctionnement :</h3>
            <p>• Chaque prénom ajouté est stocké dans <code>$_SESSION['prenoms'][]</code></p>
            <p>• La liste persiste pendant toute la session</p>
            <p>• Le bouton "Reset" vide complètement la liste</p>
        </div>

        <form method="POST">
            <div class="form-group">
                <input type="text" name="prenom" placeholder="Entrez un prénom" class="form-input" required>
                <button type="submit" class="btn">➕ Ajouter Prénom</button>
            </div>
        </form>

        <div class="prenoms-list">
            <h3> Liste des prénoms (<?php echo count($_SESSION['prenoms']); ?> prénom<?php echo count($_SESSION['prenoms']) > 1 ? 's' : ''; ?>) :</h3>
            
            <?php if (empty($_SESSION['prenoms'])): ?>
                <p>Aucun prénom ajouté pour le moment...</p>
            <?php else: ?>
                <?php foreach ($_SESSION['prenoms'] as $index => $prenom): ?>
                    <span class="prenom-item">
                        <?php echo ($index + 1) . '. ' . htmlspecialchars($prenom); ?>
                    </span>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <form method="POST">
            <button type="submit" name="reset" class="btn btn-danger">
                 Reset Liste
            </button>
        </form>

        <div class="info">
            <h4> Variables de session :</h4>
            <pre><?php print_r($_SESSION); ?></pre>
        </div>

        <div>
            <a href="../job02/index.php"> Job 02</a> |
            <a href="../job04/index.php"> Job 04 - Système de connexion</a>
        </div>
    </div>
</body>
</html>