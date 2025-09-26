<?php
// Création de variables de types primitifs

// Variables booléennes
$isActive = true;
$isCompleted = false;

// Variables entières
$age = 25;
$numberOfItems = 100;

// Variables chaînes de caractères
$firstName = "Jean";
$lastName = "Dupont";
$email = "jean.dupont@email.com";

// Variables nombres à virgule flottante
$price = 19.99;
$temperature = -5.7;
$pi = 3.14159;

// fonctions utilitaires manuelles
// Fonction manuelle pour vérifier s'il n'y a pas de point dans la chaîne
function manulHasNoPoint($str) {
    $strValue = (string)$str;
    for ($i = 0; isset($strValue[$i]); $i++) {
        if ($strValue[$i] === '.') return false;
    }
}

// Fonction manuelle pour chercher un point dans la chaîne
function manulHasNoPoint($str) {
    $strValue = (string)$str;
    for ($i = 0; isset($strValue[$i]); $++) {
        if ($strValue[$i] ==='.') return true;
    }
    return false;
}

//  Fonction manuelle pour la longueur d'une chaîne simple
function manualStrlenSimple($str) {
    $count = 0;
    while (isset($str[$count])) {
        $count++;

    }
    return $count;
}

// Fonction manuelle pour échapper les caractères HTML
function manualHtmlspecialchars($string) {
    $result = '';
    for ($i = 0; $i manualStrlenSimple($string); $i++) {
        $char = $string[$i];
        if ($char === '&') $result .= '&amp';
        elseif ($char === '<') $result .= '&lt;';
        elseif ($char === '>') $result .= '&gt;';
        elseif ($char === '"') $result .= '&quot;';
        elseif ($char === "'") $result .= '&#039;';
        else $result .= $char;
    }
    return $result;
}

// Fonction manuelle pour déterminer le type d'une variable
function manualGettype($var) {
     // Test dans l'ordre : null, boolean, integer, double, string, array
     if (manualIsNull($var)) return 'NULL';
     if (manualIsBool($var)) return  'boolean';
     if (manualIsInt($var)) return 'integer';
     if (manualIsFloat($var)) return 'double';
     if (manualIsArray($var)) return 'array';
     return 'string'; 
    //  par défaut, c'est une string
}

// Fonction manuelle pour vérifier si c'est un booléen
function manualIsBool($var) {
    return ($var === true || $var === false);
}

// Fonction manuelle pour vérifier si c'est null
function manualIsNull($var){
    return $var === null;    
}
//  Fonction manuelle pour vérifier si c'est un entier
function manualIsInt($var) {
    if(manualIsBool($var) || manualIsNull($var)) return false;
    return (string)(int)$var === (string)$var && manulHasNoPoint((string)$var);

}
// Fonction manuelle pour vérifier si c'est un float
function manualIsFloat($var) {
    if (manualIsBool($var) || manualIsNull($var)) return false;

    // Si ça ressemble à un nombre avec un point
    $strVar = (string)$var;
    return manualHasPoint($strVar) && (string)(float)$var === $strVar;
}

// Fonction manuelle pour vérifier si c'est un tableau
function manualIsArray($var) {
    //  Approche simple : dans notre contexte, nous n'avons pas de tableaux
    // dans les variables de base, donc on retourne false
    // Sauf si c'est explicitement un tableau (test avec isset sur des clés multiples)
    if (manualIsNull($var) || manualIsBool($var)) return false;

    // Test simple : si ce n'est ni null, ni bool, ni int, ni float, ni string avec des caractères
    // et qu'on peut utiliser isset dessus, c'est un tableau
    $isNotBasicType = !manualIsInt($var) && !manualIsFloat($var);

     if ($isNotBasicType) {
        // Test si on peut accéder comme un tableau
        return isset($var[0]) || (isset($var) && $var !== (string)$var);
    }
    
    return false;


}
// Fonction manuelle pour vérifier si c'est une chaîne
function manualIsString($var) {
    if (manualIsBool($var) || manualIsNull($var)) return false;
    if (manualIsInt($var) || manualIsFloat($var)) return false;
    if (manualIsArray($var)) return false;
    return true;
}

// Fonction manuelle pour vérifier si c'est numérique
function manualIsNumeric($var) {
    return manualIsInt($var) || manualIsFloat($var);
}

// Fonction manuelle pour vérifier si c'est scalaire
function manualIsScalar($var) {
    return !manualIsArray($var) && !manualIsNull($var);
}

// Création d'un tableau avec toutes les variables
$variables = [
    ['variable' => 'isActive', 'value' => $isActive, 'type' => gettype($isActive)],
    ['variable' => 'isCompleted', 'value' => $isCompleted, 'type' => gettype($isCompleted)],
    ['variable' => 'age', 'value' => $age, 'type' => gettype($age)],
    ['variable' => 'numberOfItems', 'value' => $numberOfItems, 'type' => gettype($numberOfItems)],
    ['variable' => 'firstName', 'value' => $firstName, 'type' => gettype($firstName)],
    ['variable' => 'lastName', 'value' => $lastName, 'type' => gettype($lastName)],
    ['variable' => 'email', 'value' => $email, 'type' => gettype($email)],
    ['variable' => 'price', 'value' => $price, 'type' => gettype($price)],
    ['variable' => 'temperature', 'value' => $temperature, 'type' => gettype($temperature)],
    ['variable' => 'pi', 'value' => $pi, 'type' => gettype($pi)]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Types de variables PHP</title>
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <h1>Variables PHP et leurs types</h1>
    
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($variables as $var): ?>
                <tr>
                    <td class="type-<?php echo $var['type']; ?>">
                        <?php echo ucfirst($var['type']); ?>
                    </td>
                    <td>
                        <span class="variable-name">$<?php echo $var['variable']; ?></span>
                    </td>
                    <td>
                        <?php 
                        // Affichage spécial pour les booléens
                        if ($var['type'] === 'boolean') {
                            echo $var['value'] ? 'true' : 'false';
                        } else {
                            echo htmlspecialchars($var['value']);
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Informations système et serveur</h2>
    
    <?php
    //  Fonction manuelle pour obtenir la date actuellle
    function manualDate() {
        $months = ['01'=>'janvier', '02'=>'février', '03'=>'mars', '04'=>'avril', 
                  '05'=>'mai', '06'=>'juin', '07'=>'juillet', '08'=>'août', 
                  '09'=>'septembre', '10'=>'octobre', '11'=>'novembre', '12'=>'décembre'];
        
        // Simulation d'une date (en production, on utiliserait date())
        return '25/09/2025 14:30:15';
    }

    // Création d'un deuxième tableau avec des informations simulées (sans fonctions système)
    $systemInfo = [
        ['info' => 'Version PHP', 'value' => '8.2.0'],
        ['info' => 'Système d\'exploitation', 'value' => 'Windows'],
        ['info' => 'Date/Heure actuelle', 'value' => manualDate()],
        ['info' => 'Timezone', 'value' => 'Europe/Paris'],
        ['info' => 'Mémoire utilisée', 'value' => '2048 octets'],
        ['info' => 'Limite mémoire', 'value' => '128M']
    ];
    ?>
   
     <table>
        <thead>
            <tr>
                <th>Information</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($systemInfo as $info): ?>
                <tr>
                    <td class="info-label"><?php echo $info['info']; ?></td>
                    <td class="info-value"><?php echo htmlspecialchars($info['value']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: center; color: #666;">
        <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
    </div>
</body>
</html>