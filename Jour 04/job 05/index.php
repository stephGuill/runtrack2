<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>🔐 Connexion</h1>
        
        <?php
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            
            // Logique de validation
            if ($username === "John" && $password === "Rambo") {
                echo '<div class="message success">';
                echo '✅ C\'est pas ma guerre';
                echo '</div>';
            } else {
                echo '<div class="message error">';
                echo '💀 Votre pire cauchemar';
                echo '</div>';
            }
        }
        ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            
            <input type="submit" value="Se connecter">
        </form>
        
        <div class="credentials">
            <p> Identifiants de test :</p><br>
            Nom d'utilisateur : <code>John</code><br>
            Mot de passe : <code>Rambo</code>
        </div>
        
        <div class="info-box">
            <h3>Pourquoi POST et pas GET ?</h3>
            <ul>
                <li><p>Sécurité</p> : Les mots de passe ne doivent jamais apparaître dans l'URL</li>
                <li><p>Confidentialité</p> : Les données POST ne restent pas dans l'historique</li>
                <li><p>Cache</p> : Les requêtes POST ne sont pas mises en cache</li>
                <li><p>Logs</p> : Les serveurs web n'enregistrent pas les données POST dans les logs d'accès</li>
                <li><p>Partage</p> : Une URL avec GET peut être partagée accidentellement avec les identifiants</li>
            </ul>
            
            <p>Avec GET : <code>site.com/login.php?username=John&password=Rambo</code> ❌</p>
            <p>Avec POST : Les données sont invisibles dans l'URL ✅</p>
        </div>
        
        
    </div>
</body>
</html>