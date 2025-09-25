<!-- $largeur = au nombre de colonnes(20 par exemple) -->
<!-- $hauteur = au nombre de lignes(10 par exemple) -->
<!-- première boucle gère les lignes -->
<!-- deuxième boucle gère les colonnes -->
<!-- Rectangle avec bordure d'étoiles et intérieur vide -->

<?php
$largeur = 20;
$hauteur = 10;

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
