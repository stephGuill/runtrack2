<!-- $largeur = au nombre de colonnes(20 par exemple) -->
<!-- $hauteur = au nombre de lignes(8 par exemple) -->
<!-- première boucle gère les lignes -->
<!-- deuxième boucle gère les colonnes -->
<!-- Rectangle avec bordure d'étoiles et intérieur vide -->

<?php
$largeur = 20;
$hauteur = 8; 

for ($ligne = 1; $ligne <= $hauteur; $ligne++) {
    for ($colonne = 1; $colonne <= $largeur; $colonne++) {
        if ($ligne == 1 || $ligne == $hauteur || $colonne == 1 || $colonne == $largeur) {
            echo "#";
        } else {
            echo " ";
            //  Un espace vide
        }
    }
    echo "\n";
}
?>
</pre>
</div>
 <div class="info-box">
            <h3>Spécifications du rectangle :</h3>
            <ul>
                <li><strong>Largeur :</strong> <?php echo $largeur; ?> caractères</li>
                <li><strong>Hauteur :</strong> <?php echo $hauteur; ?> lignes</li>
                <li><strong>Bordure :</strong> Dièse ( # )</li>
                <li><strong>Intérieur :</strong> Espaces vides</li>
                <li><strong>Forme :</strong> Rectangle parfait avec bordure uniforme</li>
            </ul>
        </div>
        
        <div class="code-section">
            <h3>Code de génération :</h3>
        <pre>
&lt;<?php
$largeur = <?php echo $largeur; ?>;
$hauteur = <?php echo $hauteur; ?>;

$rectangle = "";
for ($ligne = 1; $ligne &lt;= $hauteur; $ligne++) {
    for ($colonne = 1; $colonne &lt;= $largeur; $colonne++) {
        if ($ligne == 1 || $ligne == $hauteur || $colonne == 1 || $colonne == $largeur) {
            $rectangle .= "#";
        } else {
            $rectangle .= " ";
        }
    }
    $rectangle .= "\n";
}
echo $rectangle;
&gt;
            </pre>
        </div>
        
        <div class="info-box">
            <h3>Fonctionnement de l'algorithme :</h3>
            <ol>
                <li><strong>Boucle externe :</strong> Parcourt les lignes de 1 à <?php echo $hauteur; ?></li>
                <li><strong>Boucle interne :</strong> Parcourt les colonnes de 1 à <?php echo $largeur; ?></li>
                <li><strong>Test de bordure :</strong> Si ligne = 1 ou <?php echo $hauteur; ?> OU colonne = 1 ou <?php echo $largeur; ?></li>
                <li><strong>Affichage :</strong> "#" pour la bordure, espace pour l'intérieur</li>
                <li><strong>Retour ligne :</strong> &lt;br&gt; après chaque rangée complète</li>
            </ol>
        </div>
        
        <h2>Autres exemples de rectangles :</h2>
        
        <h3>Rectangle 8x8 (carré) :</h3>
        <div class="rectangle" style="font-family: monospace; background: black; color: lime; padding: 10px;">
<pre><?php
            $largeur3 = 8;
            $hauteur3 = 8;
            
            for ($ligne = 1; $ligne <= $hauteur3; $ligne++) {
                for ($colonne = 1; $colonne <= $largeur3; $colonne++) {
                    if ($ligne == 1 || $ligne == $hauteur3 || $colonne == 1 || $colonne == $largeur3) {
                        echo "#";
                    } else {
                        echo ".";
                    }
                }
                echo "\n";
            }
?></pre>
        </div>
        
        <h3>Rectangle 25x4 (très large) :</h3>
        <div class="rectangle" style="font-family: monospace; background: black; color: lime; padding: 10px;">
<pre><?php
            $largeur4 = 25;
            $hauteur4 = 4;
            
            for ($ligne = 1; $ligne <= $hauteur4; $ligne++) {
                for ($colonne = 1; $colonne <= $largeur4; $colonne++) {
                    if ($ligne == 1 || $ligne == $hauteur4 || $colonne == 1 || $colonne == $largeur4) {
                        echo "#";
                    } else {
                        echo " ";
                    }
                }
                echo "\n";
            }
?>
</pre>
        </div>
    </div>
</body>
</html>













for ($h = 1; $h <= $hauteur; $h++) {
    for ($l = 1; $l <= $largeur; $l++) {
        // Si on est sur les bords (première/dernière ligne ou première/dernière colonne)
        if ($h == 1 || $h == $hauteur || $l == 1 || $l == $largeur) {
            echo "*";
        } else {
            // Sinon on affiche un espace (rectangle blanc à l'intérieur)
            echo "&nbsp;";
        }
    }
    echo "<br />";
}
?>
