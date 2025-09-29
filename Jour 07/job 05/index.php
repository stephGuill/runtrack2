<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction occurrences($str, $char)</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>🔍 Fonction occurrences($str, $char)</h1>
        
        <?php
        // Créer la fonction occurrences() qui compte les occurrences d'un caractère
        function occurrences($str, $char) {
            $count = 0;
            $length = strlen($str);
            
            // Parcourir chaque caractère de la chaîne
            for ($i = 0; $i < $length; $i++) {
                if ($str[$i] === $char) {
                    $count++;
                }
            }
            
            return $count;
        }
        ?>
        
        <div class="example-highlight">
            <h3>📋 Exemple de l'énoncé :</h3>
            <p>Chaîne : "Bonjour"</p>
            <p>Caractère recherché : "o"</p>
            <div class="string-analysis">
                B<span class="char-highlight">o</span>nj<span class="char-highlight">o</span>ur
            </div>
            <p>Résultat : <span class="result"><?php echo occurrences("Bonjour", "o"); ?></span> occurrences</p>
        </div>
        
        <div class="info-box">
            <h3>📝 Code de la fonction :</h3>
            <div class="code-block">
&lt;?php<br>
function occurrences($str, $char) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$count = 0;<br>
&nbsp;&nbsp;&nbsp;&nbsp;$length = strlen($str);<br>
&nbsp;&nbsp;&nbsp;&nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;// Parcourir chaque caractère de la chaîne<br>
&nbsp;&nbsp;&nbsp;&nbsp;for ($i = 0; $i &lt; $length; $i++) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($str[$i] === $char) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$count++;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $count;<br>
}<br>
?&gt;
            </div>
        </div>
        
        <h2>🧪 Tests de la fonction :</h2>
        
        <div class="test-case">
            <h4>Test 1 : Exemple de l'énoncé</h4>
            <p>Code : <code>occurrences("Bonjour", "o")</code></p>
            <div class="string-analysis">B<span class="char-highlight">o</span>nj<span class="char-highlight">o</span>ur</div>
            <p>Résultat : <span class="result"><?php echo occurrences("Bonjour", "o"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 2 : Caractère fréquent</h4>
            <p>Code : <code>occurrences("Hello", "l")</code></p>
            <div class="string-analysis">He<span class="char-highlight">l</span><span class="char-highlight">l</span>o</div>
            <p>Résultat : <span class="result"><?php echo occurrences("Hello", "l"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 3 : Caractère unique</h4>
            <p>Code : <code>occurrences("PHP", "P")</code></p>
            <div class="string-analysis"><span class="char-highlight">P</span>H<span class="char-highlight">P</span></div>
            <p>Résultat : <span class="result"><?php echo occurrences("PHP", "P"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 4 : Caractère absent</h4>
            <p>Code : <code>occurrences("Bonjour", "x")</code></p>
            <div class="string-analysis">Bonjour</div>
            <p>Résultat : <span class="result"><?php echo occurrences("Bonjour", "x"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 5 : Espace</h4>
            <p>Code : <code>occurrences("Hello World", " ")</code></p>
            <div class="string-analysis">Hello<span class="char-highlight"> </span>World</div>
            <p>Résultat : <span class="result"><?php echo occurrences("Hello World", " "); ?></span></p>
        </div>
        
        <div class="advanced-tests">
            <h3>🚀 Tests avancés :</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div>
                    <p>"LaPlateforme" avec "a"</p>
                    <div class="string-analysis">L<span class="char-highlight">a</span>Pl<span class="char-highlight">a</span>teforme</div>
                    <p>Résultat : <span class="result"><?php echo occurrences("LaPlateforme", "a"); ?></span></p>
                </div>
                
                <div>
                    <p>"Programming" avec "m"</p>
                    <div class="string-analysis">Progra<span class="char-highlight">m</span><span class="char-highlight">m</span>ing</div>
                    <p>Résultat : <span class="result"><?php echo occurrences("Programming", "m"); ?></span></p>
                </div>
                
                <div>
                    <p>"aaaaaa" avec "a"</p>
                    <div class="string-analysis"><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span></div>
                    <p>Résultat : <span class="result"><?php echo occurrences("aaaaaa", "a"); ?></span></p>
                </div>
                
                <div>
                    <p>"123321" avec "2"</p>
                    <div class="string-analysis">1<span class="char-highlight">2</span>33<span class="char-highlight">2</span>1</div>
                    <p>Résultat : <span class="result"><?php echo occurrences("123321", "2"); ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="methods-comparison">
            <div class="method-card">
                <h4>📊 Méthode manuelle (implémentée)</h4>
                <div class="code-block">
function occurrences($str, $char) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$count = 0;<br>
&nbsp;&nbsp;&nbsp;&nbsp;for ($i = 0; $i &lt; strlen($str); $i++) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($str[$i] === $char) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$count++;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $count;<br>
}
                </div>
                <p>Avantages : Contrôle total, pédagogique</p>
            </div>
            
            <div class="method-card">
                <h4>⚡ Méthode PHP native</h4>
                <div class="code-block">
function occurrences($str, $char) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return substr_count($str, $char);<br>
}
                </div>
                <p>Avantages : Plus rapide, plus concise</p>
                <p>Test : substr_count("Bonjour", "o") = <?php echo substr_count("Bonjour", "o"); ?></p>
            </div>
        </div>
        
        <div class="info-box">
            <h3>🔍 Spécifications de la fonction :</h3>
            <ul>
                <li><p>Nom :<p> occurrences()</li>
                <li><p>Paramètre 1 :<p> $str (string) - Chaîne de caractères à analyser</li>
                <li><p>Paramètre 2 :</p> $char (string) - Caractère à rechercher</li>
                <li><p>Retour :</p> Nombre d'occurrences (entier)</li>
                <li><p>Algorithme :</p> Parcours caractère par caractère avec compteur</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3>💡 Points techniques :</h3>
            <ul>
                <li>✅ <p>Boucle for :</p> Parcours de 0 à strlen($str) - 1</li>
                <li>✅ <p>Comparaison stricte :</p> Utilisation de === pour la comparaison</li>
                <li>✅ <p>Accès par index :</p> $str[$i] pour accéder au caractère</li>
                <li>✅ <p>Compteur :</p> Incrémentation de $count à chaque match</li>
                <li>✅ <p>Sensible à la casse :</p> Distinction majuscules/minuscules</li>
            </ul>
        </div>
        
       
    </div>
</body>
</html>
