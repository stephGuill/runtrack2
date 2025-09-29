<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle parfait avec étoiles</title>
    
</head>
<body>
    <div class="container">
        <h1>Triangle parfait avec étoiles</h1>
        
        <?php
        // Hauteur du triangle
        $hauteur = 12;
        ?>
        
        <div class="dimension-card">
            <h3>Hauteur du triangle</h3>
            <div class="dimension-value">8</div>
            <p>lignes</p>
        </div>
        
        <div class="triangle">
<pre><?php
// Triangle isocèle (sapin) - version corrigée
$hauteur = 8; // Réduisons la hauteur pour tester

for ($ligne = 1; $ligne <= $hauteur; $ligne++) {
    // Espaces pour centrer
    for ($i = 1; $i <= ($hauteur - $ligne); $i++) {
        echo " ";
    }
    
    // Première étoile
    echo "*";
    
    // Intérieur du triangle (si pas la première ligne)
    if ($ligne > 1) {
        for ($j = 1; $j <= (2 * $ligne - 3); $j++) {
            if ($ligne == $hauteur) {
                echo "*"; // Base remplie
            } else {
                echo " "; // Intérieur avec espaces vides
            }
        }
        
        // Dernière étoile (si pas la première ligne)
        if ($ligne > 1) {
            echo "*";
        }
    }
    
    echo "\n";
}
?></pre>
        </div>
        
        <div class="info-box">
            <h3>Spécifications du triangle :</h3>
            <ul>
                <li><p>Hauteur :</p> 8 lignes</li>
                <li><p>Type :</p> Triangle isocèle creux (sapin)</li>
                <li><p>Largeur base :</p> 15 caractères</li>
                <li><p>Bordures :</p> Étoiles ( * )</li>
                <li><p>Intérieur :</p> Espaces vides</li>
                <li><p>Forme :</p> Sapin complet centré</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3>Fonctionnement de l'algorithme :</h3>
            <ol>
                <li><p>Boucle externe :</p> Parcourt les lignes de 1 à 8</li>
                <li><p>Espaces de centrage :</p> (hauteur - ligne) espaces avant chaque ligne</li>
                <li><p>Première étoile :</p> Toujours affichée</li>
                <li><p>Intérieur :</p> Espaces vides pour les lignes du milieu, étoiles pour la base</li>
                <li><p>Dernière étoile :</p> Affichée sauf pour la première ligne</li>
                <li><p>Résultat :</p> Triangle isocèle parfaitement centré</li>
            </ol>
        </div>
        
        <h2>Autres exemples de triangles :</h2>
        
        <h3>Triangle 5 lignes :</h3>
        <div class="triangle">
<pre><?php
$h2 = 5;
for ($ligne = 1; $ligne <= $h2; $ligne++) {
    // Espaces pour centrer
    for ($i = 1; $i <= ($h2 - $ligne); $i++) {
        echo " ";
    }
    
    // Première étoile
    echo "*";
    
    // Intérieur (si pas la première ligne)
    if ($ligne > 1) {
        for ($j = 1; $j <= (2 * $ligne - 3); $j++) {
            if ($ligne == $h2) {
                echo "*"; // Base remplie
            } else {
                echo " "; // Intérieur avec espaces vides
            }
        }
        
        // Dernière étoile
        echo "*";
    }
    
    echo "\n";
}
?></pre>
        </div>
        
        <h3>Triangle 10 lignes :</h3>
        <div class="triangle">
<pre><?php
$h3 = 10;
for ($ligne = 1; $ligne <= $h3; $ligne++) {
    // Espaces pour centrer
    for ($i = 1; $i <= ($h3 - $ligne); $i++) {
        echo " ";
    }
    
    // Première étoile
    echo "*";
    
    // Intérieur (si pas la première ligne)
    if ($ligne > 1) {
        for ($j = 1; $j <= (2 * $ligne - 3); $j++) {
            if ($ligne == $h3) {
                echo "*"; // Base remplie
            } else {
                echo " "; // Intérieur avec espaces vides
            }
        }
        
        // Dernière étoile
        echo "*";
    }
    
    echo "\n";
}
?></pre>
        </div>
    </div>
</body>
</html>
