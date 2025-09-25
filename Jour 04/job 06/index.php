<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test nombre pair/impair</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>🔢 Test nombre pair/impair</h1>
        
        <?php
        // Vérifier si le formulaire a été soumis
        if (isset($_GET['nombre'])) {
            $nombre = $_GET['nombre'];
            
            // Vérifier si la valeur est un nombre valide
            if (is_numeric($nombre)) {
                // Convertir en entier pour le test de parité
                $nombre = (int)$nombre;
                
                // Tester si le nombre est pair ou impair
                if ($nombre % 2 == 0) {
                    echo '<div class="result pair">';
                    echo '✅ Nombre pair';
                    echo '<br><small>Le nombre ' . $nombre . ' est divisible par 2</small>';
                    echo '</div>';
                } else {
                    echo '<div class="result impair">';
                    echo '🔸 Nombre impair';
                    echo '<br><small>Le nombre ' . $nombre . ' n\'est pas divisible par 2</small>';
                    echo '</div>';
                }
            } else {
                echo '<div class="result error">';
                echo '❌ Erreur : "' . htmlspecialchars($nombre) . '" n\'est pas un nombre valide';
                echo '<br><small>Veuillez entrer un nombre entier</small>';
                echo '</div>';
            }
        }
        ?>
        
        <form method="GET" action="">
            <div class="form-group">
                <label for="nombre">Entrez un nombre :</label>
                <input type="text" 
                       id="nombre" 
                       name="nombre" 
                       placeholder="Ex: 42, -15, 0..." 
                       value="<?php echo isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : ''; ?>"
                       required>
            </div>
            
            <input type="submit" value="Tester le nombre">
        </form>
        
        <div class="examples">
            <h4>🎯 Exemples de test :</h4>
            <div class="example-item">
                <strong>Nombres pairs :</strong> 2, 4, 6, 8, 10, 42, 100, -4, 0
            </div>
            <div class="example-item">
                <strong>Nombres impairs :</strong> 1, 3, 5, 7, 9, 13, 99, -3, -1
            </div>
        </div>
        
        <div class="info-box">
            <h3>📝 Comment ça marche :</h3>
            <ul>
                <li><strong>Méthode GET :</strong> La valeur apparaît dans l'URL (ex: <code>?nombre=42</code>)</li>
                <li><strong>Test de parité :</strong> On utilise l'opérateur modulo <code>%</code></li>
                <li><strong>Nombre pair :</strong> <code>nombre % 2 == 0</code> (reste de la division par 2 est 0)</li>
                <li><strong>Nombre impair :</strong> <code>nombre % 2 == 1</code> (reste de la division par 2 est 1)</li>
                <li><strong>Validation :</strong> <code>is_numeric()</code> vérifie si c'est un nombre</li>
            </ul>
            
            <h4>Pourquoi GET ici ?</h4>
            <p>GET est approprié car :</p>
            <ul>
                <li>Pas de données sensibles (juste un nombre)</li>
                <li>Résultat peut être partagé via l'URL</li>
                <li>Opération de lecture/consultation seulement</li>
                <li>Peut être mis en favoris ou rafraîchi</li>
            </ul>
        </div>
        
        <div style="margin-top: 20px; text-align: center; color: #666;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>