<?php
// Créer la variable string avec le texte donné
$str = "Les choses que l'on possède finissent par nous posséder.";

echo "Texte original :<br />";
echo $str . "<br /><br />";

// Méthode 1 : Utiliser strrev() (plus simple)
echo "Méthode 1 - avec strrev() :<br />";
$chaineInversee = strrev($str);
echo $chaineInversee . "<br /><br />";

// Méthode 2 : Algorithme manuel avec boucle (comme demandé)
echo "Méthode 2 - algorithme manuel :<br />";

// Parcourir la chaîne de la fin vers le début
$longueur = strlen($str);
$resultat = "";

for ($i = $longueur - 1; $i >= 0; $i--) {
    $resultat .= $str[$i];
}

echo $resultat . "<br /><br />";

// Méthode 3 : Affichage direct caractère par caractère (sans stockage)
echo "Méthode 3 - affichage direct :<br />";

for ($i = strlen($str) - 1; $i >= 0; $i--) {
    echo $str[$i];
}

echo "<br />";
?>