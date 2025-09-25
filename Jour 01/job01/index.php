<?php
// --- Partie 1 : variables de type string ---
$str = "LaPlateforme";
echo $str . "<br />"; // affichage de str

$str2 = "Vive";
$str3 = "!";
echo $str2 . " " . $str . " " . $str3 . "<br /><br />"; // affichage : Vive LaPlateforme !

// --- Partie 2 : variable numérique ---
$val = 6;
echo $val . "<br />"; // affiche 6

$val = $val + 4;
echo $val . "<br /><br />"; // affiche 10

// --- Partie 3 : variable booléenne ---
$myBool = true;
echo $myBool . "<br />"; // affichera 1 (car true = 1 en PHP)

$myBool = false;
echo $myBool . "<br />"; // affichera rien (car false = vide en PHP)
?>
