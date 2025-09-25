<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de maison ASCII</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>🏠 Générateur de maison ASCII</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="largeur">Largeur :</label>
                <input type="text" 
                       id="largeur" 
                       name="largeur" 
                       placeholder="Ex: 10" 
                       value="<?php echo isset($_POST['largeur']) ? htmlspecialchars($_POST['largeur']) : ''; ?>"
                       required>
            </div>
            
            <div class="form-group">
                <label for="hauteur">Hauteur :</label>
                <input type="text" 
                       id="hauteur" 
                       name="hauteur" 
                       placeholder="Ex: 5" 
                       value="<?php echo isset($_POST['hauteur']) ? htmlspecialchars($_POST['hauteur']) : ''; ?>"
                       required>
            </div>
            
            <input type="submit" value="Générer la maison">
        </form>
        
        <?php
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $largeur = isset($_POST['largeur']) ? $_POST['largeur'] : '';
            $hauteur = isset($_POST['hauteur']) ? $_POST['hauteur'] : '';
            
            // Valider les données
            if (is_numeric($largeur) && is_numeric($hauteur)) {
                $largeur = (int)$largeur;
                $hauteur = (int)$hauteur;
                
                // Vérifier les limites raisonnables
                if ($largeur >= 5 && $largeur <= 50 && $hauteur >= 3 && $hauteur <= 30) {
                    echo '<div class="maison">';
                    
                    // Algorithme pour dessiner la maison
                    
                    // 1. Dessiner le toit (triangle)
                    $hauteurToit = ceil($largeur / 2);
                    for ($i = 0; $i < $hauteurToit; $i++) {
                        // Calculer les espaces avant le toit
                        $espaces = $hauteurToit - $i - 1;
                        $largeurToit = 2 * $i + 1;
                        
                        // Afficher les espaces
                        echo str_repeat(' ', $espaces);
                        
                        // Première ligne du toit
                        if ($i == 0) {
                            echo '/';
                            if ($largeurToit > 1) {
                                echo str_repeat('_', $largeurToit - 2);
                                echo '\\';
                            }
                        } else {
                            // Autres lignes du toit
                            echo '/';
                            if ($largeurToit > 2) {
                                echo str_repeat(' ', $largeurToit - 2);
                            }
                            echo '\\';
                        }
                        
                        echo "\n";
                    }
                    
                    // 2. Dessiner le corps de la maison
                    for ($i = 0; $i < $hauteur; $i++) {
                        if ($i == 0) {
                            // Première ligne du corps (connexion avec le toit)
                            echo '|';
                            echo str_repeat('_', $largeur - 2);
                            echo '|';
                        } else if ($i == $hauteur - 1) {
                            // Dernière ligne du corps
                            echo '|';
                            echo str_repeat('_', $largeur - 2);
                            echo '|';
                        } else {
                            // Lignes du milieu
                            echo '|';
                            
                            // Ajouter une porte au milieu de la maison
                            if ($i >= $hauteur - 3 && $largeur >= 8) {
                                $milieuGauche = floor(($largeur - 4) / 2);
                                echo str_repeat(' ', $milieuGauche);
                                echo '[]';
                                echo str_repeat(' ', $largeur - 4 - $milieuGauche);
                            } else {
                                echo str_repeat(' ', $largeur - 2);
                            }
                            
                            echo '|';
                        }
                        echo "\n";
                    }
                    
                    echo '</div>';
                    
                    echo '<div class="info-box">';
                    echo '<h3>🎯 Maison générée :</h3>';
                    echo '<p><strong>Largeur :</strong> ' . $largeur . ' caractères</p>';
                    echo '<p><strong>Hauteur :</strong> ' . $hauteur . ' lignes (corps de la maison)</p>';
                    echo '<p><strong>Hauteur du toit :</strong> ' . $hauteurToit . ' lignes</p>';
                    echo '<p><strong>Hauteur totale :</strong> ' . ($hauteur + $hauteurToit) . ' lignes</p>';
                    echo '</div>';
                    
                } else {
                    echo '<div class="error">';
                    echo '❌ Erreur : Les dimensions doivent être entre 5-50 pour la largeur et 3-30 pour la hauteur';
                    echo '</div>';
                }
            } else {
                echo '<div class="error">';
                echo '❌ Erreur : Veuillez entrer des valeurs numériques valides';
                echo '</div>';
            }
        }
        ?>
        
        <div class="examples">
            <h4>🎯 Exemples de test :</h4>
            <p><strong>Petite maison :</strong> Largeur = 10, Hauteur = 5</p>
            <p><strong>Grande maison :</strong> Largeur = 20, Hauteur = 10</p>
            <p><strong>Maison étroite :</strong> Largeur = 8, Hauteur = 6</p>
            <p><strong>Maison large :</strong> Largeur = 25, Hauteur = 8</p>
        </div>
        
        <div class="info-box">
            <h3>📝 Comment ça marche :</h3>
            <ul>
                <li><strong>Toit :</strong> Triangle formé avec <code>/</code> et <code>\</code></li>
                <li><strong>Corps :</strong> Rectangle formé avec <code>|</code> et <code>_</code></li>
                <li><strong>Porte :</strong> Représentée par <code>[]</code> au centre</li>
                <li><strong>Hauteur du toit :</strong> Calculée selon la largeur</li>
                <li><strong>Validation :</strong> Limites raisonnables pour éviter les maisons trop grandes</li>
            </ul>
        </div>
        
        <div style="margin-top: 20px; text-align: center; color: #666;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>