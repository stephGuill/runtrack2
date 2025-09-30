<!-- De 0 à 20 inclus je mets en italique -->
<!-- De 25 à 50 inclus je souligne -->
<!-- Pour 42 j’écris LaPlateforme_ -->
<!-- Pour les autres nombres, je les affiche normalement suivis d'un <br /> -->

<?php
for ($i = 0; $i <= 100; $i++) {
    if ($i == 42) {
        echo "La Plateforme_<br />";
    } elseif ($i >= 0 && $i <= 20) {
        echo "<i>$i</i><br />";
    } elseif ($i >= 25 && $i <= 50) {
        echo "<u>$i</u><br />";
    } else {
        echo $i . "<br />";
    }
}
?>
