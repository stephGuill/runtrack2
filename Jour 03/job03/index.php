<?php
// Créer la variable string avec le texte donné
$str = "I'm sorry Dave I'm afraid I can't do that";

echo "Texte original :<br />";
echo $str . "<br /><br />";

echo "Voyelles trouvées :<br />";

// Définir les voyelles (minuscules et majuscules)
$voyelles = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

// Parcourir la chaîne et afficher uniquement les voyelles
for ($i = 0; $i < strlen($str); $i++) {
    $caractere = $str[$i];
    
    // Vérifier si le caractère est une voyelle
    if (in_array($caractere, $voyelles)) {
        echo $caractere;
    }
}

echo "<br />";
?>