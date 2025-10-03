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
        <h1> Job 03 - Étudiantes de sexe féminin</h1>
        
        <div class="info-box">
            <h3> Fonctionnement :</h3>
            <p>• Connexion à la base jour09 avec <code>mysqli</code></p>
            <p>• Filtrage avec WHERE sexe = 'Femme'</p>
            <p>• Sélection des champs prénom, nom et date de naissance</p>
        </div>

        <div class="sql-query">
            <p> Requête SQL :</p><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        // Génération du tableau HTML
        echo genererTableauHTML($result, " Étudiantes féminines");
        
        // Statistiques
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo " Statistiques :<br>";
            echo "• Nombre d'étudiantes : " . $result->num_rows . "<br>";
            
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
                echo "• Âge moyen : " . round(array_sum($ages) / count($ages), 1) . " ans<br>";
                echo "• Âge minimum : " . min($ages) . " ans<br>";
                echo "• Âge maximum : " . max($ages) . " ans";
            }
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job02/index.php"> Job 02</a>
            <a href="../job04/index.php"> Job 04</a>
            <a href="../"> Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>