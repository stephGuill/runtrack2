

<?php
// Liste des nombres interdits
$exclus = [26, 37, 88, 1111, 3233];

for ($i = 0; $i <= 1337; $i++) {
    // On affiche uniquement si $i n’est pas dans la liste des exclus
    if (!in_array($i, $exclus)) {
        echo $i . "<br />";
    }
}
?>


