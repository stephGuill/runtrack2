<?php
$hauteur = 15; 

// $i correspond au numéro de la ligne (de 1 à $hauteur).
// $j correspond au nombre d'étoiles à afficher sur cette ligne.
// Donc pour chaque ligne $i, on affiche $i étoiles.
// pour cet exemple, on a 5 lignes, donc $i va de 1 à 5.
// *
// **
// ***
// ****
// *****

for ($i = 1; $i <= $hauteur; $i++) {            
    // afficher $i caractères (étoiles sur les bords, espaces à l'intérieur)
    for ($j = 1; $j <= $i; $j++) {
        // Si on est sur les bords ou sur la dernière ligne
        if ($j == 1 || $j == $i || $i == $hauteur) {
            echo "*";
        } else {
            // Sinon on affiche un espace (triangle blanc à l'intérieur)
            echo "&nbsp;";
        }
    }
    echo "<br />";
}
?>
