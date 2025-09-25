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
            <p><strong>Chaîne :</strong> "Bonjour"</p>
            <p><strong>Caractère recherché :</strong> "o"</p>
            <div class="string-analysis">
                B<span class="char-highlight">o</span>nj<span class="char-highlight">o</span>ur
            </div>
            <p><strong>Résultat :</strong> <span class="result"><?php echo occurrences("Bonjour", "o"); ?></span> occurrences</p>
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
            <p><strong>Code :</strong> <code>occurrences("Bonjour", "o")</code></p>
            <div class="string-analysis">B<span class="char-highlight">o</span>nj<span class="char-highlight">o</span>ur</div>
            <p><strong>Résultat :</strong> <span class="result"><?php echo occurrences("Bonjour", "o"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 2 : Caractère fréquent</h4>
            <p><strong>Code :</strong> <code>occurrences("Hello", "l")</code></p>
            <div class="string-analysis">He<span class="char-highlight">l</span><span class="char-highlight">l</span>o</div>
            <p><strong>Résultat :</strong> <span class="result"><?php echo occurrences("Hello", "l"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 3 : Caractère unique</h4>
            <p><strong>Code :</strong> <code>occurrences("PHP", "P")</code></p>
            <div class="string-analysis"><span class="char-highlight">P</span>H<span class="char-highlight">P</span></div>
            <p><strong>Résultat :</strong> <span class="result"><?php echo occurrences("PHP", "P"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 4 : Caractère absent</h4>
            <p><strong>Code :</strong> <code>occurrences("Bonjour", "x")</code></p>
            <div class="string-analysis">Bonjour</div>
            <p><strong>Résultat :</strong> <span class="result"><?php echo occurrences("Bonjour", "x"); ?></span></p>
        </div>
        
        <div class="test-case">
            <h4>Test 5 : Espace</h4>
            <p><strong>Code :</strong> <code>occurrences("Hello World", " ")</code></p>
            <div class="string-analysis">Hello<span class="char-highlight"> </span>World</div>
            <p><strong>Résultat :</strong> <span class="result"><?php echo occurrences("Hello World", " "); ?></span></p>
        </div>
        
        <div class="advanced-tests">
            <h3>🚀 Tests avancés :</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div>
                    <p><strong>"LaPlateforme"</strong> avec <strong>"a"</strong></p>
                    <div class="string-analysis">L<span class="char-highlight">a</span>Pl<span class="char-highlight">a</span>teforme</div>
                    <p>Résultat : <span class="result"><?php echo occurrences("LaPlateforme", "a"); ?></span></p>
                </div>
                
                <div>
                    <p><strong>"Programming"</strong> avec <strong>"m"</strong></p>
                    <div class="string-analysis">Progra<span class="char-highlight">m</span><span class="char-highlight">m</span>ing</div>
                    <p>Résultat : <span class="result"><?php echo occurrences("Programming", "m"); ?></span></p>
                </div>
                
                <div>
                    <p><strong>"aaaaaa"</strong> avec <strong>"a"</strong></p>
                    <div class="string-analysis"><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span><span class="char-highlight">a</span></div>
                    <p>Résultat : <span class="result"><?php echo occurrences("aaaaaa", "a"); ?></span></p>
                </div>
                
                <div>
                    <p><strong>"123321"</strong> avec <strong>"2"</strong></p>
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
                <p><strong>Avantages :</strong> Contrôle total, pédagogique</p>
            </div>
            
            <div class="method-card">
                <h4>⚡ Méthode PHP native</h4>
                <div class="code-block">
function occurrences($str, $char) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return substr_count($str, $char);<br>
}
                </div>
                <p><strong>Avantages :</strong> Plus rapide, plus concise</p>
                <p><strong>Test :</strong> substr_count("Bonjour", "o") = <?php echo substr_count("Bonjour", "o"); ?></p>
            </div>
        </div>
        
        <div class="info-box">
            <h3>🔍 Spécifications de la fonction :</h3>
            <ul>
                <li><strong>Nom :</strong> occurrences()</li>
                <li><strong>Paramètre 1 :</strong> $str (string) - Chaîne de caractères à analyser</li>
                <li><strong>Paramètre 2 :</strong> $char (string) - Caractère à rechercher</li>
                <li><strong>Retour :</strong> Nombre d'occurrences (entier)</li>
                <li><strong>Algorithme :</strong> Parcours caractère par caractère avec compteur</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3>💡 Points techniques :</h3>
            <ul>
                <li>✅ <strong>Boucle for :</strong> Parcours de 0 à strlen($str) - 1</li>
                <li>✅ <strong>Comparaison stricte :</strong> Utilisation de === pour la comparaison</li>
                <li>✅ <strong>Accès par index :</strong> $str[$i] pour accéder au caractère</li>
                <li>✅ <strong>Compteur :</strong> Incrémentation de $count à chaque match</li>
                <li>✅ <strong>Sensible à la casse :</strong> Distinction majuscules/minuscules</li>
            </ul>
        </div>
        
        <div style="margin-top: 30px; text-align: center; color: #666;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>
