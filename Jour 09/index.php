<?php
// Configuration de la base de données
$host = 'localhost';
$dbname = 'jour09';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Fonction pour exécuter et afficher une requête
function executerRequete($pdo, $sql, $titre, $description = '') {
    try {
        $stmt = $pdo->query($sql);
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<div class='job-result'>";
        echo "<h3>$titre</h3>";
        if ($description) {
            echo "<p class='description'>$description</p>";
        }
        
        if (empty($resultats)) {
            echo "<p class='no-result'>Aucun résultat trouvé</p>";
        } else {
            echo "<table>";
            // En-têtes
            echo "<tr>";
            foreach (array_keys($resultats[0]) as $colonne) {
                echo "<th>" . htmlspecialchars($colonne) . "</th>";
            }
            echo "</tr>";
            
            // Données
            foreach ($resultats as $ligne) {
                echo "<tr>";
                foreach ($ligne as $valeur) {
                    echo "<td>" . htmlspecialchars($valeur ?? '') . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        
        echo "<div class='sql-query'><strong>SQL:</strong> <code>" . htmlspecialchars($sql) . "</code></div>";
        echo "</div>";
        
    } catch(PDOException $e) {
        echo "<div class='error'>Erreur : " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 09 - HELLO SQL - Tests Interactifs</title>
    <link rel="stylesheet" href="assets/css/index.css">
   
</head>
<body>
    <div class="container">
        <div class="intro">
            <h1> Jour 09 - HELLO SQL</h1>
            <p>Tests interactifs de toutes les requêtes SQL</p>
        </div>

        <?php
        // Statistiques générales
        echo "<div class='stats'>";
        
        $stats = [
            "Nombre d'étudiants" => "SELECT COUNT(*) as total FROM etudiants",
            "Nombre de salles" => "SELECT COUNT(*) as total FROM salles",
            "Nombre d'étages" => "SELECT COUNT(*) as total FROM etage",
            "Capacité totale" => "SELECT SUM(capacite) as total FROM salles"
        ];
        
        foreach ($stats as $label => $sql) {
            $stmt = $pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<div class='stat-card'>";
            echo "<div class='stat-number'>" . $result['total'] . "</div>";
            echo "<div>$label</div>";
            echo "</div>";
        }
        echo "</div>";

        // Job 03 - Tous les étudiants
        executerRequete($pdo, 
            "SELECT * FROM etudiants", 
            " Job 03 - Tous les étudiants",
            "Sélection complète de la table étudiants"
        );

        // Job 04 - Nom et capacité des salles
        executerRequete($pdo,
            "SELECT nom, capacite FROM salles",
            " Job 04 - Nom et capacité des salles",
            "Affichage sélectif de colonnes spécifiques"
        );

        // Job 05 - Étudiantes
        executerRequete($pdo,
            "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'",
            " Job 05 - Étudiantes de sexe féminin",
            "Filtrage par condition WHERE"
        );

        // Job 06 - Prénoms en T
        executerRequete($pdo,
            "SELECT * FROM etudiants WHERE prenom LIKE 'T%'",
            " Job 06 - Prénoms commençant par 'T'",
            "Utilisation de LIKE pour pattern matching"
        );

        // Job 07 - Plus de 18 ans
        executerRequete($pdo,
            "SELECT * FROM etudiants WHERE YEAR(CURDATE()) - YEAR(naissance) > 18 OR (YEAR(CURDATE()) - YEAR(naissance) = 18 AND DAYOFYEAR(CURDATE()) > DAYOFYEAR(naissance))",
            " Job 07 - Étudiants de plus de 18 ans",
            "Calcul d'âge avec conditions complexes"
        );

        // Job 08 - Compter les étudiants
        executerRequete($pdo,
            "SELECT COUNT(*) as nombre_etudiants FROM etudiants",
            " Job 08 - Nombre d'étudiants",
            "Fonction d'agrégation COUNT"
        );

        // Job 09 - Moins de 18 ans
        executerRequete($pdo,
            "SELECT * FROM etudiants WHERE YEAR(CURDATE()) - YEAR(naissance) < 18 OR (YEAR(CURDATE()) - YEAR(naissance) = 18 AND DAYOFYEAR(CURDATE()) < DAYOFYEAR(naissance))",
            " Job 09 - Étudiants de moins de 18 ans",
            "Condition inverse du Job 07"
        );

        // Job 10 - Superficie totale
        executerRequete($pdo,
            "SELECT SUM(superficie) as superficie_totale FROM etage",
            " Job 10 - Superficie totale des étages",
            "Fonction d'agrégation SUM"
        );

        // Job 11 - Capacité totale des salles
        executerRequete($pdo,
            "SELECT SUM(capacite) as capacite_totale FROM salles",
            " Job 11 - Capacité totale des salles",
            "Somme des capacités"
        );

        // Job 12 - Salles triées par capacité
        executerRequete($pdo,
            "SELECT * FROM salles ORDER BY capacite DESC",
            " Job 12 - Salles par capacité décroissante",
            "Tri avec ORDER BY DESC"
        );

        // Job 13 - Capacité moyenne
        executerRequete($pdo,
            "SELECT AVG(capacite) as capacite_moyenne FROM salles",
            " Job 13 - Capacité moyenne des salles",
            "Fonction d'agrégation AVG"
        );

        // Job 14 - Étudiants nés entre 1998 et 2018
        executerRequete($pdo,
            "SELECT prenom, nom, naissance FROM etudiants WHERE YEAR(naissance) BETWEEN 1998 AND 2018",
            " Job 14 - Étudiants nés entre 1998-2018",
            "Condition BETWEEN pour plage de dates"
        );

        // Job 15 - Jointure salles-étages
        executerRequete($pdo,
            "SELECT salles.nom as nom_salle, etage.nom as nom_etage FROM salles INNER JOIN etage ON salles.id_etage = etage.id",
            " Job 15 - Jointure salles et étages",
            "INNER JOIN entre deux tables"
        );

        // Job 16 - Plus grande salle
        executerRequete($pdo,
            "SELECT etage.nom as nom_etage, salles.nom as 'Biggest Room', salles.capacite FROM salles INNER JOIN etage ON salles.id_etage = etage.id WHERE salles.capacite = (SELECT MAX(capacite) FROM salles)",
            " Job 16 - Salle avec plus grande capacité",
            "Sous-requête avec MAX et jointure"
        );
        ?>

        <div>
            <h3> Compétences SQL Maîtrisées</h3>
            <div class="stats">
                <div class="stat-card"> SELECT basique</div>
                <div class="stat-card"> WHERE conditions</div>
                <div class="stat-card"> LIKE patterns</div>
                <div class="stat-card"> Fonctions agrégation</div>
                <div class="stat-card"> ORDER BY tri</div>
                <div class="stat-card"> INNER JOIN</div>
                <div class="stat-card"> Sous-requêtes</div>
                <div class="stat-card"> Calculs dates</div>
            </div>
        </div>
    </div>
</body>
</html>