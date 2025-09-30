

<?php
// Liste des nombres interdits
$exclus = [26, 37, 88, 1111, 3233];

// Fonction manuelle pour remplacer in_array
function manualInArray($needle, $haystack) {
    for ($i = 0; $i < count($haystack); $i++) {
        if ($haystack[$i] === $needle) {
            return true;
        }
    }
    return false;
}
for ($i = 0; $i <= 1337; $i++) {
    // On affiche uniquement si $i n'est pas dans la liste des exclus
    if (!manualInArray($i, $exclus)) {
        echo $i . "<br />";
    }
}
?>


