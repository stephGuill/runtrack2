<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction calcule() - Calculatrice</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>🧮 Fonction calcule() - Calculatrice</h1>
        
        <?php
        // Créer la fonction calcule() avec 3 paramètres
        function calcule($a, $operation, $b) {
            switch ($operation) {
                case '+':
                    return $a + $b;
                case '-':
                    return $a - $b;
                case '*':
                    return $a * $b;
                case '/':
                    if ($b != 0) {
                        return $a / $b;
                    } else {
                        return "Erreur: Division par zéro";
                    }
                case '%':
                    if ($b != 0) {
                        return $a % $b;
                    } else {
                        return "Erreur: Modulo par zéro";
                    }
                default:
                    return "Erreur: Opération inconnue";
            }
        }
        ?>
        
        <div class="info-box">
            <h3>📝 Code de la fonction :</h3>
            <div class="code-block">
&lt;?php<br>
function calcule($a, $operation, $b) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;switch ($operation) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case '+':<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $a + $b;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case '-':<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $a - $b;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case '*':<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $a * $b;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case '/':<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($b != 0) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $a / $b;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "Erreur: Division par zéro";<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case '%':<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($b != 0) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return $a % $b;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "Erreur: Modulo par zéro";<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;default:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return "Erreur: Opération inconnue";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
?&gt;
            </div>
        </div>
        
        <div class="test-section">
            <h2>🧪 Tests de la fonction :</h2>
            
            <div class="operations-grid">
                <div class="operation-card">
                    <h4>➕ Addition</h4>
                    <p><strong>calcule(10, '+', 5)</strong></p>
                    <div class="result"><?php echo calcule(10, '+', 5); ?></div>
                </div>
                
                <div class="operation-card">
                    <h4>➖ Soustraction</h4>
                    <p><strong>calcule(10, '-', 5)</strong></p>
                    <div class="result"><?php echo calcule(10, '-', 5); ?></div>
                </div>
                
                <div class="operation-card">
                    <h4>✖️ Multiplication</h4>
                    <p><strong>calcule(10, '*', 5)</strong></p>
                    <div class="result"><?php echo calcule(10, '*', 5); ?></div>
                </div>
                
                <div class="operation-card">
                    <h4>➗ Division</h4>
                    <p><strong>calcule(10, '/', 5)</strong></p>
                    <div class="result"><?php echo calcule(10, '/', 5); ?></div>
                </div>
                
                <div class="operation-card">
                    <h4>📐 Modulo</h4>
                    <p><strong>calcule(10, '%', 3)</strong></p>
                    <div class="result"><?php echo calcule(10, '%', 3); ?></div>
                </div>
                
                <div class="operation-card">
                    <h4>⚠️ Division par zéro</h4>
                    <p><strong>calcule(10, '/', 0)</strong></p>
                    <div class="error"><?php echo calcule(10, '/', 0); ?></div>
                </div>
            </div>
        </div>
        
        <div class="calculator">
            <h3>🖩 Calculatrice Interactive</h3>
            <div style="text-align: center;">
                <?php
                // Tests supplémentaires avec des nombres décimaux
                echo "15.5 + 4.3 = " . calcule(15.5, '+', 4.3) . "<br>";
                echo "20 - 8 = " . calcule(20, '-', 8) . "<br>";
                echo "7 * 6 = " . calcule(7, '*', 6) . "<br>";
                echo "25 / 5 = " . calcule(25, '/', 5) . "<br>";
                echo "17 % 5 = " . calcule(17, '%', 5) . "<br>";
                echo "100 / 3 = " . calcule(100, '/', 3) . "<br>";
                ?>
            </div>
        </div>
        
        <div class="test-section">
            <h2>🚨 Tests de gestion d'erreurs :</h2>
            
            <div class="test-case">
                <h4>Test 1: Division par zéro</h4>
                <p><strong>Code:</strong> <code>calcule(15, '/', 0)</code></p>
                <p><strong>Résultat:</strong> <span class="error"><?php echo calcule(15, '/', 0); ?></span></p>
            </div>
            
            <div class="test-case">
                <h4>Test 2: Modulo par zéro</h4>
                <p><strong>Code:</strong> <code>calcule(15, '%', 0)</code></p>
                <p><strong>Résultat:</strong> <span class="error"><?php echo calcule(15, '%', 0); ?></span></p>
            </div>
            
            <div class="test-case">
                <h4>Test 3: Opération inconnue</h4>
                <p><strong>Code:</strong> <code>calcule(15, '^', 2)</code></p>
                <p><strong>Résultat:</strong> <span class="error"><?php echo calcule(15, '^', 2); ?></span></p>
            </div>
        </div>
        
        <div class="info-box">
            <h3>🔍 Spécifications de la fonction :</h3>
            <ul>
                <li><strong>Nom :</strong> calcule()</li>
                <li><strong>Paramètre 1 :</strong> $a (nombre) - Premier opérande</li>
                <li><strong>Paramètre 2 :</strong> $operation (string) - Type d'opération (+, -, *, /, %)</li>
                <li><strong>Paramètre 3 :</strong> $b (nombre) - Deuxième opérande</li>
                <li><strong>Retour :</strong> Résultat de l'opération ou message d'erreur</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3>💡 Fonctionnalités implémentées :</h3>
            <ul>
                <li>✅ <strong>Addition (+) :</strong> Additionne deux nombres</li>
                <li>✅ <strong>Soustraction (-) :</strong> Soustrait le deuxième du premier</li>
                <li>✅ <strong>Multiplication (*) :</strong> Multiplie deux nombres</li>
                <li>✅ <strong>Division (/) :</strong> Divise le premier par le deuxième</li>
                <li>✅ <strong>Modulo (%) :</strong> Reste de la division entière</li>
                <li>🛡️ <strong>Gestion d'erreurs :</strong> Division/modulo par zéro, opération inconnue</li>
            </ul>
        </div>
        
        <div style="margin-top: 30px; text-align: center; color: #666;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>
