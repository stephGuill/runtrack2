<?php
// Créer la variable string avec le texte donné
$str = "Dans l'espace, personne ne vous entend crier";

echo "Texte original :<br />";
echo $str . "<br /><br />";

// Méthode 1 : Utiliser strlen() (plus simple)
echo "Méthode 1 - avec strlen() :<br />";
$nombreCaracteres = strlen($str);
echo "Nombre de caractères : " . $nombreCaracteres . "<br /><br />";

// Méthode 2 : Algorithme manuel avec boucle (comme demandé)
echo "Méthode 2 - algorithme manuel :<br />";
$compteur = 0;

// Parcourir la chaîne caractère par caractère
for ($i = 0; $i < strlen($str); $i++) {
    $compteur++;
    echo "Caractère " . $compteur . " : '" . $str[$i] . "'<br />";
}

echo "<br />Nombre total de caractères (algorithme manuel) : " . $compteur . "<br />";
?>