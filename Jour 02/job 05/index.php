<!-- affiche les nombres premiers jusqu'à 1000 -->
 

<?php
for ($i = 2; $i <= 1000; $i++) {
    $estPremier = true;

    // Vérifier la divisibilité
    for ($j = 2; $j * $j <= $i; $j++) {
        if ($i % $j == 0) {
            $estPremier = false;
            break;
        }
    }

    if ($estPremier) {
        echo $i . "<br />";
    }
}
?> 
<!-- ceci est le job 05/jour 02 -->
