<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 10 - PHP + SQL</title>
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>
<body>
    <div class="container">
        <h1> Jour 10 - PHP + SQL</h1>
        
        <div class="description">
            <strong>Objectif :</strong> Intégrer PHP avec MySQL en utilisant MySQLi pour créer des interfaces web dynamiques avec des requêtes SQL complexes et l'affichage de données sous forme de tableaux HTML.
        </div>

        <div class="jobs-grid">
            <a href="job01/index.php" class="job-card completed">
                <div class="job-title"> Job 01 - SELECT * FROM etudiants</div>
                <div class="job-description">Affichage de tous les étudiants avec MySQLi et génération de tableau HTML</div>
            </a>

            <a href="job02/index.php" class="job-card completed">
                <div class="job-title"> Job 02 - SELECT nom, prenom FROM etudiants</div>
                <div class="job-description">Sélection spécifique des colonnes nom et prénom uniquement</div>
            </a>

            <a href="job03/index.php" class="job-card completed">
                <div class="job-title"> Job 03 - SELECT nom, prenom WHERE id = 13</div>
                <div class="job-description">Requête avec condition WHERE pour un étudiant spécifique</div>
            </a>

            <a href="job04/index.php" class="job-card completed">
                <div class="job-title"> Job 04 - SELECT nom, prenom WHERE prenom LIKE 'M%'</div>
                <div class="job-description">Recherche par motif avec l'opérateur LIKE (prénoms commençant par M)</div>
            </a>

            <a href="job05/index.php" class="job-card completed">
                <div class="job-title"> Job 05 - SELECT * FROM salles</div>
                <div class="job-description">Affichage complet de toutes les salles avec leurs caractéristiques</div>
            </a>

            <a href="job06/index.php" class="job-card completed">
                <div class="job-title"> Job 06 - SELECT nom, capacite FROM salles</div>
                <div class="job-description">Sélection ciblée des noms et capacités des salles</div>
            </a>

            <a href="job07/index.php" class="job-card completed">
                <div class="job-title"> Job 07 - SELECT COUNT(*) FROM etudiants</div>
                <div class="job-description">Fonction d'agrégation COUNT pour compter le nombre total d'étudiants</div>
            </a>

            <a href="job08/index.php" class="job-card completed">
                <div class="job-title"> Job 08 - SUM(capacite) FROM salles</div>
                <div class="job-description">Fonction SUM pour calculer la capacité totale de toutes les salles</div>
            </a>

            <a href="job09/index.php" class="job-card completed">
                <div class="job-title"> Job 09 - ORDER BY capacite DESC</div>
                <div class="job-description">Tri décroissant des salles par capacité avec système de classement</div>
            </a>

            <a href="job10/index.php" class="job-card completed">
                <div class="job-title"> Job 10 - ORDER BY capacite ASC</div>
                <div class="job-description">Tri croissant des salles par capacité avec icônes personnalisées</div>
            </a>

            <a href="job11/index.php" class="job-card completed">
                <div class="job-title"> Job 11 - AVG(capacite) FROM salles</div>
                <div class="job-description">Fonction AVG pour calculer la capacité moyenne avec comparaisons détaillées</div>
            </a>

            <a href="job12/index.php" class="job-card completed">
                <div class="job-title"> Job 12 - WHERE YEAR(naissance) BETWEEN 1998 AND 2018</div>
                <div class="job-description">Filtrage par plage de dates avec fonction YEAR() et statistiques générationnelles</div>
            </a>

            <a href="job13/index.php" class="job-card completed">
                <div class="job-title"> Job 13 - INNER JOIN salles-etages</div>
                <div class="job-description">Jointure entre tables avec analyse de l'intégrité des données</div>
            </a>
        </div>

        <div class="stats">
            <p> Progression :</p> 13/13 jobs terminés (100%) <br>
            <p> Technologies :</p> PHP MySQLi, HTML5, CSS3, SQL avancé<br>
            <p> Concepts maîtrisés :</p> Connexions BDD, requêtes complexes, jointures, fonctions d'agrégation, interface utilisateur
        </div>

        <div class="nav-section">
            <div class="nav-links">
                <a href="../Jour 09/"> Jour 09</a>
                <a href="../"> Accueil RunTrack2</a>
            </div>
        </div>
    </div>
</body>
</html>