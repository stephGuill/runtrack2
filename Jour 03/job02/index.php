<?php
// Créer la variable string avec le texte donné
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

echo "Texte original :<br />";
echo $str . "<br /><br />";

echo "Un caractère sur deux :<br />";

// Parcourir la chaîne en affichant un caractère sur deux
for ($i = 0; $i < strlen($str); $i += 2) {
    echo $str[$i];
}

echo "<br />";
?>