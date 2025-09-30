<?php
session_start();

// Gestion du reset
if (isset($_POST['reset'])) {
    $_SESSION['nbvisites'] = 0;
}

// Initialiser le compteur s'il n'existe pas
if (!isset($_SESSION['nbvisites'])) {
    $_SESSION['nbvisites'] = 0;
}

// Incrémenter à chaque visite
$_SESSION['nbvisites']++;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 01 - Compteur de visites (SESSION)</title>
    <link rel="stylesheet" href="assets/css/index.css">
   
</head>
<body>
    <div class="container">
        <h1> Job 01 - Compteur de visites avec SESSION</h1>
        
        <div class="info">
            <h3> Fonctionnement :</h3>
            <p>• Une variable de session <code>$_SESSION['nbvisites']</code> compte chaque visite</p>
            <p>• Le compteur s'incrémente automatiquement à chaque rechargement</p>
            <p>• Le bouton "Reset" remet le compteur à zéro</p>
        </div>

        <div class="counter">
             Nombre de visites :<?php echo $_SESSION['nbvisites']; ?>
        </div>

        <form method="POST">
            <button type="submit" name="reset" class="btn">
                 Reset Compteur
            </button>
        </form>

        <div class="info">
            <h4> Variables de session actuelles :</h4>
            <pre><?php print_r($_SESSION); ?></pre>
        </div>

        <div>
            <a href="../job02/index.php">
                 Job 02 - Compteur avec COOKIES
            </a>
        </div>
    </div>
</body>
</html>