<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptage voyelles et consonnes</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <h1>Analyse des voyelles et consonnes</h1>
    
    <?php
    // Créer la variable string avec le texte donné
    $str = "On n'est pas le meilleur quand on le croit mais quand on le sait";
    
    // Créer le dictionnaire avec les keys demandées
    $dic = [
        "voyelles" => 0,
        "consonnes" => 0
    ];
    
    // Définir les voyelles (minuscules et majuscules)
    $voyelles = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    
    echo '<div class="texte-original">';
    echo '"' . $str . '"';
    echo '</div>';
    
    // Parcourir la chaîne et compter voyelles et consonnes
    for ($i = 0; $i < strlen($str); $i++) {
        $caractere = $str[$i];
        
        // Vérifier si c'est une lettre (pas un espace, apostrophe, etc.)
        if (ctype_alpha($caractere)) {
            if (in_array($caractere, $voyelles)) {
                $dic["voyelles"]++;
            } else {
                $dic["consonnes"]++;
            }
        }
    }
    ?>
    
    <table>
        <thead>
            <tr>
                <th>Voyelles</th>
                <th>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="voyelles"><?php echo $dic["voyelles"]; ?></td>
                <td class="consonnes"><?php echo $dic["consonnes"]; ?></td>
            </tr>
        </tbody>
    </table>

   
</body>
</html>