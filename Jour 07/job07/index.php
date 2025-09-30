<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformateur de Texte - Jour 07 Job 07</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1> Transformateur de Texte</h1>
        <p>Appliquez différentes transformations à vos chaînes de caractères</p>
        
        <?php
        // Fonction gras: met en gras les mots commençant par une majuscule
        function gras($str) {
            // Diviser la chaîne en mots
            $words = explode(' ', $str);
            $result = [];
            
            foreach ($words as $word) {
                // Vérifier si le mot commence par une majuscule
                if (strlen($word) > 0 && ctype_upper($word[0])) {
                    $result[] = '<b>' . $word . '</b>';
                } else {
                    $result[] = $word;
                }
            }
            
            return implode(' ', $result);
        }
        
        // Fonction cesar: décale chaque caractère selon le décalage
        function cesar($str, $decalage = 2) {
            $result = '';
            $length = strlen($str);
            
            for ($i = 0; $i < $length; $i++) {
                $char = $str[$i];
                
                // Traiter les lettres minuscules
                if ($char >= 'a' && $char <= 'z') {
                    $shifted = (ord($char) - ord('a') + $decalage) % 26;
                    $result .= chr($shifted + ord('a'));
                }
                // Traiter les lettres majuscules
                elseif ($char >= 'A' && $char <= 'Z') {
                    $shifted = (ord($char) - ord('A') + $decalage) % 26;
                    $result .= chr($shifted + ord('A'));
                }
                // Garder les autres caractères tels quels
                else {
                    $result .= $char;
                }
            }
            
            return $result;
        }
        
        // Fonction plateforme: ajoute un "_" aux mots finissant par "me"
        function plateforme($str) {
            // Diviser la chaîne en mots
            $words = explode(' ', $str);
            $result = [];
            
            foreach ($words as $word) {
                // Vérifier si le mot se termine par "me"
                if (strlen($word) >= 2 && substr($word, -2) === 'me') {
                    $result[] = $word . '_';
                } else {
                    $result[] = $word;
                }
            }
            
            return implode(' ', $result);
        }
        ?>
        
        <!-- Formulaire -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label for="str"> Texte à transformer :</label>
                    <input type="text" 
                           id="str" 
                           name="str" 
                           placeholder="Entrez votre texte ici..." 
                           value="<?php echo isset($_POST['str']) ? htmlspecialchars($_POST['str']) : ''; ?>"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="fonction"> Choisissez la transformation :</label>
                    <select id="fonction" name="fonction" required>
                        <option value="">-- Sélectionnez une fonction --</option>
                        <option value="gras" <?php echo (isset($_POST['fonction']) && $_POST['fonction'] === 'gras') ? 'selected' : ''; ?>>
                             Gras (mots avec majuscule)
                        </option>
                        <option value="cesar" <?php echo (isset($_POST['fonction']) && $_POST['fonction'] === 'cesar') ? 'selected' : ''; ?>>
                             César (décalage +2)
                        </option>
                        <option value="plateforme" <?php echo (isset($_POST['fonction']) && $_POST['fonction'] === 'plateforme') ? 'selected' : ''; ?>>
                             Plateforme (ajouter _ aux mots en "me")
                        </option>
                    </select>
                </div>
                
                <button type="submit"> Transformer le texte</button>
            </form>
        </div>
        
        <?php
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['str']) && !empty($_POST['fonction'])) {
            $inputText = $_POST['str'];
            $selectedFunction = $_POST['fonction'];
            $result = '';
            
            switch ($selectedFunction) {
                case 'gras':
                    $result = gras($inputText);
                    $functionName = 'Gras';
                    $description = 'Mots commençant par une majuscule mis en gras';
                    break;
                    
                case 'cesar':
                    $result = cesar($inputText, 2);
                    $functionName = 'César (décalage +2)';
                    $description = 'Chaque lettre décalée de 2 positions dans l\'alphabet';
                    break;
                    
                case 'plateforme':
                    $result = plateforme($inputText);
                    $functionName = 'Plateforme';
                    $description = 'Underscore ajouté aux mots se terminant par "me"';
                    break;
                    
                default:
                    $result = 'Fonction non reconnue';
                    $functionName = 'Erreur';
                    $description = '';
            }
            
            echo '<div class="result-container">';
            echo '<h3> Résultat de la transformation</h3>';
            echo '<p>Fonction appliquée : ' . $functionName . '</p>';
            echo '<p>Description : ' . $description . '</p>';
            echo '<p>Texte original : ' . htmlspecialchars($inputText) . '</p>';
            echo '<div class="result-text">' . $result . '</div>';
            echo '</div>';
        }
        ?>
        
        <!-- Documentation des fonctions -->
        <h2> Documentation des fonctions</h2>
        
        <div class="examples-grid">
            <div class="example-card">
                <h4> Fonction gras($str)</h4>
                <p>Description : Met en gras les mots commençant par une majuscule</p>
                <div class="code-example">
function gras($str) {
    $words = explode(' ', $str);
    foreach ($words as $word) {
        if (ctype_upper($word[0])) {
            $result[] = '&lt;b&gt;' . $word . '&lt;/b&gt;';
        }
    }
    return implode(' ', $result);
}
                </div>
                <div class="input-example">Input: "Bonjour le Monde"</div>
                <div class="output-example">Output: <b>Bonjour</b> le <b>Monde</b></div>
            </div>
            
            <div class="example-card">
                <h4> Fonction cesar($str, $decalage)</h4>
                <p>Description : Décale chaque lettre de $decalage positions (défaut: 2)</p>
                <div class="code-example">
function cesar($str, $decalage = 2) {
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i])) {
            $shifted = (ord($str[$i]) + $decalage) % 26;
            $result .= chr($shifted);
        }
    }
    return $result;
}
                </div>
                <div class="input-example">Input: "hello" (décalage +2)</div>
                <div class="output-example">Output: jgnnq</div>
            </div>
            
            <div class="example-card">
                <h4> Fonction plateforme($str)</h4>
                <p>Description : Ajoute "_" aux mots se terminant par "me"</p>
                <div class="code-example">
function plateforme($str) {
    $words = explode(' ', $str);
    foreach ($words as $word) {
        if (substr($word, -2) === 'me') {
            $result[] = $word . '_';
        }
    }
    return implode(' ', $result);
}
                </div>
                <div class="input-example">Input: "La plateforme est comme un programme"</div>
                <div class="output-example">Output: La plateforme_ est comme_ un programme_</div>
            </div>
        </div>
        
        <!-- Exemples d'utilisation -->
        <div class="function-info">
            <h4> Exemples de tests à essayer :</h4>
            <ul>
                <li><p>Pour "gras" :</p> "Bonjour le Monde de PHP"</li>
                <li><p>Pour "cesar" :</p> "Hello World"</li>
                <li><p>Pour "plateforme" :</p> "J'aime la plateforme comme un programme"</li>
            </ul>
        </div>
        
        <div>
            <p> Transformateur de texte complet !</p>
             <?php echo date('d/m/Y H:i:s'); ?>
        </div>
    </div>
</body>
</html>
