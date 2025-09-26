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
    // Création d'un deuxième tableau avec des informations système
    $systemInfo = [
        ['info' => 'Version PHP', 'value' => phpversion()],
        ['info' => 'Système d\'exploitation', 'value' => PHP_OS],
        ['info' => 'Date/Heure actuelle', 'value' => date('d/m/Y H:i:s')],
        ['info' => 'Timezone', 'value' => date_default_timezone_get()],
        ['info' => 'Mémoire utilisée', 'value' => memory_get_usage(true) . ' octets'],
        ['info' => 'Limite mémoire', 'value' => ini_get('memory_limit')]
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