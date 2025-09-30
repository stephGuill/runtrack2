<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction bonjour($jour)</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1> Fonction bonjour($jour)</h1>
        
        <?php
        // Créer la fonction bonjour($jour)
        function bonjour($jour) {
            if ($jour === true) {
                echo "Bonjour";
            } else {
                echo "Bonsoir";
            }
        }
        ?>
        
        <div class="info-box">
            <h3> Code de la fonction :</h3>
            <div class="code-block">
&lt;?php<br>
function bonjour($jour) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;if ($jour === true) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "Bonjour";<br>
&nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "Bonsoir";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
?&gt;
            </div>
        </div>
        
        <h2> Tests de la fonction :</h2>
        
        <div class="test-case">
            <h4>Test 1 : bonjour(true)</h4>
            <p>Paramètre : <code>$jour = true</code></p>
            <p>Résultat attendu : "Bonjour"</p>
            <div class="result jour">
                <?php bonjour(true); ?>
            </div>
        </div>
        
        <div class="test-case">
            <h4>Test 2 : bonjour(false)</h4>
            <p>Paramètre : <code>$jour = false</code></p>
            <p>Résultat attendu : "Bonsoir"</p>
            <div class="result nuit">
                <?php bonjour(false); ?>
            </div>
        </div>
        
        <div class="info-box">
            <h3> Explication :</h3>
            <ul>
                <li><p>Fonction avec paramètre :</p> <code>function bonjour($jour)</code></li>
                <li><p>Paramètre booléen :</p> <code>$jour</code> peut être <code>true</code> ou <code>false</code></li>
                <li><p>Condition :</p> <code>if ($jour === true)</code> teste la valeur exacte</li>
                <li><p>Branchement :</p> Affiche "Bonjour" si true, "Bonsoir" si false</li>
                <li><p>Comparaison stricte :</p> <code>===</code> vérifie le type et la valeur</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3> Utilisations pratiques :</h3>
            <div class="code-block">
// Exemples d'appels<br>
bonjour(true);   // Affiche "Bonjour"<br>
bonjour(false);  // Affiche "Bonsoir"<br>
<br>
// Avec une variable<br>
$estJour = true;<br>
bonjour($estJour); // Affiche "Bonjour"<br>
<br>
// Avec une condition<br>
$heure = date('H');<br>
bonjour($heure &lt; 18); // "Bonjour" avant 18h, "Bonsoir" après
            </div>
        </div>
        
        <h2> Test avancé :</h2>
        <div class="test-case">
            <h4>Test avec l'heure actuelle</h4>
            <?php
            $heureActuelle = (int)date('H');
            $estJour = ($heureActuelle >= 6 && $heureActuelle < 18);
            ?>
            <p>Heure actuelle : <?php echo date('H:i'); ?></p>
            <p>Est-ce le jour ? : <?php echo $estJour ? 'true' : 'false'; ?></p>
            <div class="result <?php echo $estJour ? 'jour' : 'nuit'; ?>">
                <?php bonjour($estJour); ?>
            </div>
        </div>
        
        
    </div>
</body>
</html>
