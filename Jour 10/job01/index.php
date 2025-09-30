<?php
require_once '../config.php';

// Connexion à la base de données avec MySQLi
$mysqli = connecterBDD();

// Requête SQL pour récupérer tous les étudiants
$sql = "SELECT * FROM etudiants";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 01 - Tous les étudiants (MySQLi)</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>📋 Job 01 - Tous les étudiants avec MySQLi</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>mysqli</code></p>
            <p>• Récupération de <strong>tous les champs</strong> de la table étudiants</p>
            <p>• Affichage dans un tableau HTML structuré avec thead et tbody</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        // Génération du tableau HTML
        echo genererTableauHTML($result, "👨‍🎓 Liste complète des étudiants");
        
        // Statistiques
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo "<strong>📊 Statistiques :</strong><br>";
            echo "• Nombre total d'étudiants : <strong>" . $result->num_rows . "</strong><br>";
            echo "• Nombre de colonnes : <strong>" . $result->field_count . "</strong>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job02/index.php">➡️ Job 02</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>