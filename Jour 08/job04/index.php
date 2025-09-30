<?php
// Gestion de la connexion
if (isset($_POST['connexion']) && !empty(trim($_POST['prenom']))) {
    $prenom = trim($_POST['prenom']);
    setcookie('prenom_utilisateur', $prenom, time() + 3600 * 24 * 30); // 30 jours
    $_COOKIE['prenom_utilisateur'] = $prenom;
}

// Gestion de la déconnexion
if (isset($_POST['deco'])) {
    setcookie('prenom_utilisateur', '', time() - 3600); // Suppression du cookie
    unset($_COOKIE['prenom_utilisateur']);
}

// Vérifier si l'utilisateur est connecté
$estConnecte = isset($_COOKIE['prenom_utilisateur']) && !empty($_COOKIE['prenom_utilisateur']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 04 - Système de connexion (COOKIES)</title>
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>
<body>
    <div class="container">
        <h1> Job 04 - Système de connexion avec COOKIES</h1>
        
        <div class="info">
            <h3> Fonctionnement :</h3>
            <p>• Le prénom est stocké dans un cookie persistant (30 jours)</p>
            <p>• Si connecté : affichage du message de bienvenue + bouton déconnexion</p>
            <p>• Si déconnecté : affichage du formulaire de connexion</p>
        </div>

        <?php if (!$estConnecte): ?>
            <!-- FORMULAIRE DE CONNEXION -->
            <div class="login-form">
                <h2> Connexion</h2>
                <form method="POST">
                    <div>
                        <input type="text" name="prenom" placeholder="Entrez votre prénom" class="form-input" required>
                    </div>
                    <div>
                        <button type="submit" name="connexion" class="btn">
                             Se connecter
                        </button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <!-- SECTION UTILISATEUR CONNECTÉ -->
            <div class="welcome-section">
                <div class="welcome-message">
                     Bonjour <?php echo htmlspecialchars($_COOKIE['prenom_utilisateur']); ?> !
                </div>
                
                <p>Vous êtes maintenant connecté. Votre prénom est stocké dans un cookie.</p>
                
                <form method="POST">
                    <button type="submit" name="deco" class="btn btn-danger">
                         Déconnexion
                    </button>
                </form>
            </div>
        <?php endif; ?>

        <div class="info">
            <h4> État des cookies :</h4>
            <p>Connecté : <?php echo $estConnecte ? 'Oui' : 'Non'; ?></p>
            <?php if ($estConnecte): ?>
                <p>Prénom stocké :<?php echo htmlspecialchars($_COOKIE['prenom_utilisateur']); ?></p>
            <?php endif; ?>
            <pre><?php print_r($_COOKIE); ?></pre>
        </div>

        <div>
            <a href="../job03/index.php"> Job 03</a> |
            <a href="../job05/index.php"> Job 05 - Jeu du Morpion</a>
        </div>
    </div>
</body>
</html>