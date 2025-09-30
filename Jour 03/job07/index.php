<?php
// Créer la variable string avec le texte donné
$str = "Certaines choses changent, et d'autres ne changeront jamais.";

echo "Texte original :<br />";
echo $str . "<br /><br />";

echo "Explication de l'algorithme :<br />";
echo "- Position 0 prend la valeur de position 1<br />";
echo "- Position 1 prend la valeur de position 2<br />";
echo "- Position 2 prend la valeur de position 3<br />";
echo "- ...<br />";
echo "- Dernière position prend la valeur de position 0<br /><br />";

// Algorithme de rotation des caractères
$longueur = strlen($str);
$nouvelleChaine = "";

// Sauvegarder le premier caractère car il sera écrasé
$premierCaractere = $str[0];

// Parcourir la chaîne et effectuer la rotation
for ($i = 0; $i < $longueur; $i++) {
    if ($i == $longueur - 1) {
        // Le dernier caractère prend la valeur du premier
        $nouvelleChaine .= $premierCaractere;
    } else {
        // Chaque position prend la valeur de la position suivante
        $nouvelleChaine .= $str[$i + 1];
    }
}

echo "Texte après rotation :<br />";
echo $nouvelleChaine . "<br /><br />";

// Affichage détaillé pour comprendre la transformation
echo "Transformation détaillée :<br />";
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><th>Position</th><th>Avant</th><th>Après</th><th>Explication</th></tr>";

for ($i = 0; $i < $longueur; $i++) {
    echo "<tr>";
    echo "<td style='padding: 5px; text-align: center;'>" . $i . "</td>";
    echo "<td style='padding: 5px; text-align: center;'>'" . $str[$i] . "'</td>";
    echo "<td style='padding: 5px; text-align: center;'>'" . $nouvelleChaine[$i] . "'</td>";
    
    if ($i == $longueur - 1) {
        echo "<td style='padding: 5px;'>Prend le caractère de position 0</td>";
    } else {
        echo "<td style='padding: 5px;'>Prend le caractère de position " . ($i + 1) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>