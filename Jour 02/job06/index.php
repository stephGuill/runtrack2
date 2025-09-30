<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rectangle parfait avec étoiles</title>
    
</head>
<body>
    <div class="container">
        <h1> Rectangle parfait avec étoiles</h1>
        
    <?php
    // Dimensions du rectangle (ajustées pour un rendu parfait)
    $largeur = 30;
    $hauteur = 12;
    ?>
        
        <div class="dimensions">
            <div class="dimension-card">
                <h3>Largeur</h3>
                <div class="dimension-value"><?php echo $largeur; ?></div>
                <p>caractères</p>
            </div>
            <div class="dimension-card">
                <h3>Hauteur</h3>
                <div class="dimension-value"><?php echo $hauteur; ?></div>
                <p>lignes</p>
            </div>
        </div>
        


        
            <?php
            // Rectangle parfait avec bordures seulement
            echo '<pre style="margin:0;">';
            for ($ligne = 1; $ligne <= $hauteur; $ligne++) {
                for ($colonne = 1; $colonne <= $largeur; $colonne++) {
                    if ($ligne == 1 || $ligne == $hauteur || $colonne == 1 || $colonne == $largeur) {
                        echo "*";
                    } else {
                        echo " ";
                    }
                }
                echo "\n";
            }
            echo '</pre>';
            ?>
        </pre>
        </div>
        
        <div class="info-box">
            <h3>Spécifications du rectangle :</h3>
            <ul>
                <li><p>Largeur :</p> <?php echo $largeur; ?> caractères</li>
                <li><p>Hauteur :</p> <?php echo $hauteur; ?> lignes</li>
                <li><p>Bordure :</p> Etoiles ( * )</li>
                <li><p>Intérieur :</p> Espaces vides</li>
                <li><p>Forme :</p> Rectangle parfait avec bordure uniforme</li>
            </ul>
        </div>
        
        <div class="code-section">
            
  <pre>
&lt;

    <?php
    $largeur = 30;
    $hauteur = 12;

$rectangle = "";
for ($ligne = 1; $ligne <= $hauteur; $ligne++) {
    for ($colonne = 1; $colonne <= $largeur; $colonne++) {
        if ($ligne == 1 || $ligne == $hauteur || $colonne == 1 || $colonne == $largeur) {
            $rectangle .= "#";
        } else {
            $rectangle .= " ";
        }
    }
    $rectangle .= "\n";
}
?>

&gt;       
        
        <div class="info-box">
            <h3>Fonctionnement de l'algorithme :</h3>
            <ol>
                <li><p>Boucle externe :</p> Parcourt les lignes de 1 à <?php echo $hauteur; ?></li>
                <li><p>Boucle interne :</p> Parcourt les colonnes de 1 à <?php echo $largeur; ?></li>
                <li><p>Test de bordure :</p> Si ligne = 1 ou <?php echo $hauteur; ?> OU colonne = 1 ou <?php echo $largeur; ?></li>
                <li><p>Affichage :</p> "#" pour la bordure, espace pour l'intérieur</li>
                <li><p>pathinfo>Retour ligne :</p> &lt;br&gt; après chaque rangée complète</li>
            </ol>
        </div>
        
        
        <h2>Autres exemples de rectangles :</h2>
        
        <h3>Rectangle 8x8 (carré) :</h3>
       

    <?php
            $largeur3 = 8;
            $hauteur3 = 8;
            echo '<pre style="margin:0;">';
            for ($ligne = 1; $ligne <= $hauteur3; $ligne++) {
                for ($colonne = 1; $colonne <= $largeur3; $colonne++) {
                    if ($ligne == 1 || $ligne == $hauteur3 || $colonne == 1 || $colonne == $largeur3) {
                        echo "*";
                    } else {
                        echo " ";
                    }
                }
                echo "\n";
            }
            echo '</pre>';
    ?>
</pre>
        </div>
        
        <h3>Rectangle 25x4 (très large) :</h3>
        
<pre>
    <?php
            $largeur4 = 25;
            $hauteur4 = 4;
            echo '<pre style="margin:0;">';
            for ($ligne = 1; $ligne <= $hauteur4; $ligne++) {
                for ($colonne = 1; $colonne <= $largeur4; $colonne++) {
                    if ($ligne == 1 || $ligne == $hauteur4 || $colonne == 1 || $colonne == $largeur4) {
                        echo "*";
                    } else {
                        echo " ";
                    }
                }
                echo "\n";
            }
            echo '</pre>';
    ?>
</pre>
        </div>
    </div>
</body>
</html>
