<?php
/**
 * 🔌 Configuration commune pour Jour 10 - PHP + SQL
 * 
 * Ce fichier contient la configuration de connexion et les fonctions utilitaires
 * partagées par tous les jobs du Jour 10
 */

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'jour09');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Établit une connexion MySQLi à la base de données
 * Crée automatiquement la base jour09 si elle n'existe pas
 * @return mysqli|false Instance MySQLi ou false en cas d'erreur
 */
function connecterBDD() {
    // D'abord connexion sans spécifier la base pour vérifier/créer
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
    
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    
    $mysqli->set_charset("utf8");
    
    // Vérifier si la base jour09 existe, sinon la créer
    $result = $mysqli->query("SHOW DATABASES LIKE '" . DB_NAME . "'");
    if ($result->num_rows == 0) {
        // La base n'existe pas, la créer avec toutes les données
        creerBaseDonnees($mysqli);
    }
    
    // Sélectionner la base
    $mysqli->select_db(DB_NAME);
    
    return $mysqli;
}

/**
 * Génère un tableau HTML à partir d'un résultat MySQL
 * @param mysqli_result $result Résultat de la requête
 * @param string $titre Titre du tableau
 * @return string HTML du tableau
 */
function genererTableauHTML($result, $titre = '') {
    $html = '';
    
    if ($titre) {
        $html .= "<h2>$titre</h2>";
    }
    
    if ($result && $result->num_rows > 0) {
        $html .= '<table>';
        
        // En-tête avec noms des champs
        $html .= '<thead><tr>';
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            $html .= '<th>' . htmlspecialchars($field->name) . '</th>';
        }
        $html .= '</tr></thead>';
        
        // Corps du tableau avec données
        $html .= '<tbody>';
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>';
            foreach ($row as $value) {
                $html .= '<td>' . htmlspecialchars($value ?? '') . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        
        $html .= '</table>';
    } else {
        $html .= '<p class="no-data">Aucune donnée trouvée</p>';
    }
    
    return $html;
}

/**
 * Style CSS commun pour tous les jobs
 * @return string CSS styles
 */
function getStylesCSS() {
    return '
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
        }
        
        .container {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        
        h1 {
            text-align: center;
            color: #ffd700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }
        
        h2 {
            color: #ffd700;
            border-bottom: 2px solid #ffd700;
            padding-bottom: 10px;
            margin: 30px 0 20px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: rgba(255,255,255,0.95);
            color: #333;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        th {
            background: #4CAF50;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:nth-child(even) {
            background: rgba(0,0,0,0.05);
        }
        
        tr:hover {
            background: rgba(102, 126, 234, 0.1);
        }
        
        .info-box {
            background: rgba(255,255,255,0.2);
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #ffd700;
        }
        
        .sql-query {
            background: rgba(0,0,0,0.3);
            padding: 15px;
            border-radius: 8px;
            font-family: "Courier New", monospace;
            margin: 15px 0;
            border-left: 4px solid #4CAF50;
        }
        
        .no-data {
            text-align: center;
            color: #ffa502;
            font-style: italic;
            padding: 30px;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
        }
        
        .nav-links {
            text-align: center;
            margin: 30px 0;
        }
        
        .nav-links a {
            color: #ffd700;
            text-decoration: none;
            margin: 0 15px;
            padding: 10px 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }
    </style>';
}

/**
 * Crée la base de données jour09 avec toutes les tables et données
 * @param mysqli $mysqli Connexion MySQL active
 */
function creerBaseDonnees($mysqli) {
    // Créer la base de données
    $mysqli->query("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8 COLLATE utf8_general_ci");
    $mysqli->select_db(DB_NAME);
    
    // Créer la table etage
    $sqlEtage = "CREATE TABLE IF NOT EXISTS etage (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL
    )";
    $mysqli->query($sqlEtage);
    
    // Insérer les données de la table etage
    $insertEtage = "INSERT IGNORE INTO etage (id, nom) VALUES 
        (1, 'RDC'),
        (2, '1er étage'),
        (3, '2ème étage'),
        (4, '3ème étage')";
    $mysqli->query($insertEtage);
    
    // Créer la table salles
    $sqlSalles = "CREATE TABLE IF NOT EXISTS salles (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        id_etage INT(11),
        capacite INT(11) NOT NULL,
        FOREIGN KEY (id_etage) REFERENCES etage(id)
    )";
    $mysqli->query($sqlSalles);
    
    // Insérer les données de la table salles
    $insertSalles = "INSERT IGNORE INTO salles (id, nom, id_etage, capacite) VALUES 
        (1, 'Lounge', 1, 100),
        (2, 'Studio Son', 1, 5),
        (3, 'Broadcasting', 2, 50),
        (4, 'Bocal Peda', 2, 4),
        (5, 'Coworking', 2, 80),
        (6, 'Studio Video', 3, 30)";
    $mysqli->query($insertSalles);
    
    // Créer la table etudiants
    $sqlEtudiants = "CREATE TABLE IF NOT EXISTS etudiants (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        prenom VARCHAR(255) NOT NULL,
        nom VARCHAR(255) NOT NULL,
        naissance DATE NOT NULL,
        sexe VARCHAR(25) NOT NULL,
        email VARCHAR(255) NOT NULL
    )";
    $mysqli->query($sqlEtudiants);
    
    // Insérer les données de la table etudiants
    $insertEtudiants = "INSERT IGNORE INTO etudiants (id, prenom, nom, naissance, sexe, email) VALUES 
        (1, 'Cyril', 'Zimmermann', '1989-01-02', 'Homme', 'cyril@laplateforme.io'),
        (2, 'Jessica', 'Soriano', '1995-09-08', 'Femme', 'jessica@laplateforme.io'),
        (3, 'Roxan', 'Roumégas', '2016-09-08', 'Homme', 'roxan@laplateforme.io'),
        (4, 'Pascal', 'Assens', '1999-12-31', 'Homme', 'pascal@laplateforme.io'),
        (5, 'Florian', 'Palmieri', '1993-02-01', 'Homme', 'florian@laplateforme.io'),
        (6, 'Marie', 'Lebeau', '1985-05-02', 'Femme', 'marie@laplateforme.io'),
        (7, 'Carole', 'Zanetti', '1998-04-13', 'Femme', 'carole@laplateforme.io'),
        (8, 'Francis', 'Guerrero', '2007-03-14', 'Homme', 'francis@laplateforme.io'),
        (9, 'Audrey', 'Borders', '1988-01-05', 'Femme', 'audrey@laplateforme.io'),
        (10, 'Cédric', 'Zaïdi', '2006-09-04', 'Homme', 'cedric@laplateforme.io'),
        (11, 'Samuel', 'Badin', '1998-01-07', 'Homme', 'samuel@laplateforme.io'),
        (12, 'Luka', 'Doncic', '1999-02-28', 'Homme', 'luka@laplateforme.io'),
        (13, 'Melvin', 'Skudra', '2000-01-02', 'Homme', 'melvin@laplateforme.io'),
        (14, 'Laura', 'Vita', '1998-02-27', 'Femme', 'laura@laplateforme.io'),
        (15, 'Michel', 'Mikay', '1998-04-19', 'Homme', 'michel@laplateforme.io')";
    $mysqli->query($insertEtudiants);
}
?>