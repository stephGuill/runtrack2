<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 10 - PHP + SQL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .description {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: center;
            font-size: 1.1em;
        }

        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .job-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border-color: #ffd700;
        }

        .job-title {
            font-size: 1.3em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ffd700;
        }

        .job-description {
            font-size: 0.9em;
            opacity: 0.9;
            line-height: 1.4;
        }

        .nav-section {
            text-align: center;
            margin-top: 30px;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .nav-links a {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }

        .nav-links a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
        }

        .stats {
            background: rgba(46, 204, 113, 0.1);
            border-left: 4px solid #2ecc71;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .completed {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        }

        .completed .job-title {
            color: #fff;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            
            h1 {
                font-size: 2em;
            }
            
            .jobs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐘 Jour 10 - PHP + SQL</h1>
        
        <div class="description">
            <strong>Objectif :</strong> Intégrer PHP avec MySQL en utilisant MySQLi pour créer des interfaces web dynamiques avec des requêtes SQL complexes et l'affichage de données sous forme de tableaux HTML.
        </div>

        <div class="jobs-grid">
            <a href="job01/index.php" class="job-card completed">
                <div class="job-title">✅ Job 01 - SELECT * FROM etudiants</div>
                <div class="job-description">Affichage de tous les étudiants avec MySQLi et génération de tableau HTML</div>
            </a>

            <a href="job02/index.php" class="job-card completed">
                <div class="job-title">✅ Job 02 - SELECT nom, prenom FROM etudiants</div>
                <div class="job-description">Sélection spécifique des colonnes nom et prénom uniquement</div>
            </a>

            <a href="job03/index.php" class="job-card completed">
                <div class="job-title">✅ Job 03 - SELECT nom, prenom WHERE id = 13</div>
                <div class="job-description">Requête avec condition WHERE pour un étudiant spécifique</div>
            </a>

            <a href="job04/index.php" class="job-card completed">
                <div class="job-title">✅ Job 04 - SELECT nom, prenom WHERE prenom LIKE 'M%'</div>
                <div class="job-description">Recherche par motif avec l'opérateur LIKE (prénoms commençant par M)</div>
            </a>

            <a href="job05/index.php" class="job-card completed">
                <div class="job-title">✅ Job 05 - SELECT * FROM salles</div>
                <div class="job-description">Affichage complet de toutes les salles avec leurs caractéristiques</div>
            </a>

            <a href="job06/index.php" class="job-card completed">
                <div class="job-title">✅ Job 06 - SELECT nom, capacite FROM salles</div>
                <div class="job-description">Sélection ciblée des noms et capacités des salles</div>
            </a>

            <a href="job07/index.php" class="job-card completed">
                <div class="job-title">✅ Job 07 - SELECT COUNT(*) FROM etudiants</div>
                <div class="job-description">Fonction d'agrégation COUNT pour compter le nombre total d'étudiants</div>
            </a>

            <a href="job08/index.php" class="job-card completed">
                <div class="job-title">✅ Job 08 - SUM(capacite) FROM salles</div>
                <div class="job-description">Fonction SUM pour calculer la capacité totale de toutes les salles</div>
            </a>

            <a href="job09/index.php" class="job-card completed">
                <div class="job-title">✅ Job 09 - ORDER BY capacite DESC</div>
                <div class="job-description">Tri décroissant des salles par capacité avec système de classement</div>
            </a>

            <a href="job10/index.php" class="job-card completed">
                <div class="job-title">✅ Job 10 - ORDER BY capacite ASC</div>
                <div class="job-description">Tri croissant des salles par capacité avec icônes personnalisées</div>
            </a>

            <a href="job11/index.php" class="job-card completed">
                <div class="job-title">✅ Job 11 - AVG(capacite) FROM salles</div>
                <div class="job-description">Fonction AVG pour calculer la capacité moyenne avec comparaisons détaillées</div>
            </a>

            <a href="job12/index.php" class="job-card completed">
                <div class="job-title">✅ Job 12 - WHERE YEAR(naissance) BETWEEN 1998 AND 2018</div>
                <div class="job-description">Filtrage par plage de dates avec fonction YEAR() et statistiques générationnelles</div>
            </a>

            <a href="job13/index.php" class="job-card completed">
                <div class="job-title">✅ Job 13 - INNER JOIN salles-etages</div>
                <div class="job-description">Jointure entre tables avec analyse de l'intégrité des données</div>
            </a>
        </div>

        <div class="stats">
            <strong>📊 Progression :</strong> 13/13 jobs terminés (100%) ✅<br>
            <strong>🛠️ Technologies :</strong> PHP MySQLi, HTML5, CSS3, SQL avancé<br>
            <strong>📚 Concepts maîtrisés :</strong> Connexions BDD, requêtes complexes, jointures, fonctions d'agrégation, interface utilisateur
        </div>

        <div class="nav-section">
            <div class="nav-links">
                <a href="../Jour 09/">⬅️ Jour 09</a>
                <a href="../">🏠 Accueil RunTrack2</a>
            </div>
        </div>
    </div>
</body>
</html>