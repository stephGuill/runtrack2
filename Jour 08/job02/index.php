<?php
// Gestion du reset
if (isset($_POST['reset'])) {
    setcookie('nbvisites', '0', time() + 3600 * 24 * 30); // 30 jours
    $_COOKIE['nbvisites'] = 0;
}

// Initialiser le cookie s'il n'existe pas
if (!isset($_COOKIE['nbvisites'])) {
    $_COOKIE['nbvisites'] = 0;
}

// Incrémenter à chaque visite
$nouvelleLeurValeur = $_COOKIE['nbvisites'] + 1;
setcookie('nbvisites', $nouvelleLeurValeur, time() + 3600 * 24 * 30); // 30 jours
$_COOKIE['nbvisites'] = $nouvelleLeurValeur;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 02 - Compteur de visites (COOKIES)</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1> Job 02 - Compteur de visites avec COOKIES</h1>
        
        <div class="info">
            <h3> Fonctionnement :</h3>
            <p>• Un cookie <code>nbvisites</code> stocké dans le navigateur</p>
            <p>• Persistance sur 30 jours même après fermeture du navigateur</p>
            <p>• Le compteur s'incrémente automatiquement à chaque visite</p>
        </div>

        <div class="refresh-notice">
             <p>Note : Après reset, rechargez la page pour voir le changement !</p>
        </div>

        <div class="counter">
             Nombre de visites : <?php echo $_COOKIE['nbvisites']; ?>
        </div>

        <form method="POST">
            <button type="submit" name="reset" class="btn">
                 Reset Compteur
            </button>
        </form>

        <div class="info">
            <h4> Cookies actuels :</h4>
            <pre><?php print_r($_COOKIE); ?></pre>
        </div>

        <div class="info">
            <h4> Différence SESSION vs COOKIES :</h4>
            <p>• SESSION : Stocké sur le serveur, temporaire</p>
            <p>• COOKIES : Stocké dans le navigateur, persistant</p>
        </div>

        <div>
            <a href="../job01/index.php"> Job 01</a> |
            <a href="../job03/index.php"> Job 03 - Liste de prénoms</a>
        </div>
    </div>
</body>
</html>