<?php
require_once '../config.php';

// Connexion à la base de données avec MySQLi
$mysqli = connecterBDD();

// Requête SQL pour récupérer les étudiantes
$sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 03 - Étudiantes de sexe féminin</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>👩 Job 03 - Étudiantes de sexe féminin</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>mysqli</code></p>
            <p>• Filtrage avec <strong>WHERE sexe = 'Femme'</strong></p>
            <p>• Sélection des champs prénom, nom et date de naissance</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        // Génération du tableau HTML
        echo genererTableauHTML($result, "👩‍🎓 Étudiantes féminines");
        
        // Statistiques
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo "<strong>📊 Statistiques :</strong><br>";
            echo "• Nombre d'étudiantes : <strong>" . $result->num_rows . "</strong><br>";
            
            // Calcul des âges
            $result->data_seek(0);
            $ages = [];
            while ($row = $result->fetch_assoc()) {
                $naissance = new DateTime($row['naissance']);
                $maintenant = new DateTime();
                $age = $maintenant->diff($naissance)->y;
                $ages[] = $age;
            }
            
            if (!empty($ages)) {
                echo "• Âge moyen : <strong>" . round(array_sum($ages) / count($ages), 1) . " ans</strong><br>";
                echo "• Âge minimum : <strong>" . min($ages) . " ans</strong><br>";
                echo "• Âge maximum : <strong>" . max($ages) . " ans</strong>";
            }
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job02/index.php">⬅️ Job 02</a>
            <a href="../job04/index.php">➡️ Job 04</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>