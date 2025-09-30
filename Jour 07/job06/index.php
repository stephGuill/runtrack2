<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction leetSpeak($str)</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1 class="leet-title">1337 5P34K C0NV3R73R</h1>
        <p>Fonction leetSpeak($str)</p>
        
        <?php
        // Créer la fonction leetSpeak() qui convertit du texte en leet speak
        function leetSpeak($str) {
            // Définir les règles de conversion
            $conversions = [
                'A' => '4', 'a' => '4',
                'B' => '8', 'b' => '8',
                'E' => '3', 'e' => '3',
                'G' => '6', 'g' => '6',
                'L' => '1', 'l' => '1',
                'S' => '5', 's' => '5',
                'T' => '7', 't' => '7'
            ];
            
            // Convertir la chaîne caractère par caractère
            $result = '';
            $length = strlen($str);
            
            for ($i = 0; $i < $length; $i++) {
                $char = $str[$i];
                
                // Si le caractère a une conversion, l'appliquer
                if (isset($conversions[$char])) {
                    $result .= $conversions[$char];
                } else {
                    // Sinon, garder le caractère original
                    $result .= $char;
                }
            }
            
            return $result;
        }
        ?>
        
        <div class="info-box">
            <h3> Règles de conversion Leet Speak :</h3>
            <div class="conversion-rules">
                <div class="rule-card">A/a → 4</div>
                <div class="rule-card">B/b → 8</div>
                <div class="rule-card">E/e → 3</div>
                <div class="rule-card">G/g → 6</div>
                <div class="rule-card">L/l → 1</div>
                <div class="rule-card">S/s → 5</div>
                <div class="rule-card">T/t → 7</div>
            </div>
        </div>
        
        <div class="technical-info">
            <h3> Code de la fonction :</h3>
            <div class="code-block">
&lt;?php<br>
function leetSpeak($str) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;// Définir les règles de conversion<br>
&nbsp;&nbsp;&nbsp;&nbsp;$conversions = [<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'A' =&gt; '4', 'a' =&gt; '4',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'B' =&gt; '8', 'b' =&gt; '8',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'E' =&gt; '3', 'e' =&gt; '3',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'G' =&gt; '6', 'g' =&gt; '6',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'L' =&gt; '1', 'l' =&gt; '1',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'S' =&gt; '5', 's' =&gt; '5',<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'T' =&gt; '7', 't' =&gt; '7'<br>
&nbsp;&nbsp;&nbsp;&nbsp;];<br>
&nbsp;&nbsp;&nbsp;&nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;$result = '';<br>
&nbsp;&nbsp;&nbsp;&nbsp;for ($i = 0; $i &lt; strlen($str); $i++) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$char = $str[$i];<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if (isset($conversions[$char])) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$result .= $conversions[$char];<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$result .= $char;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $result;<br>
}<br>
?&gt;
            </div>
        </div>
        
        <h2> Démonstrations de conversion</h2>
        
        <div class="demo-section">
            <h3> Exemples basiques</h3>
            
            <div class="test-case">
                <h4>Test 1 : Mot simple</h4>
                <p>Code : <code>leetSpeak("Hello")</code></p>
                <div class="before-after">
                    <div class="original-text">Hello</div>
                    <div class="arrow">→</div>
                    <div class="leet-text"><?php echo leetSpeak("Hello"); ?></div>
                </div>
            </div>
            
            <div class="test-case">
                <h4>Test 2 : Phrase complète</h4>
                <p>Code : <code>leetSpeak("Bonjour les amis")</code></p>
                <div class="before-after">
                    <div class="original-text">Bonjour les amis</div>
                    <div class="arrow">→</div>
                    <div class="leet-text"><?php echo leetSpeak("Bonjour les amis"); ?></div>
                </div>
            </div>
            
            <div class="test-case">
                <h4>Test 3 : Majuscules et minuscules</h4>
                <p>Code : <code>leetSpeak("LEET SPEAK")</code></p>
                <div class="before-after">
                    <div class="original-text">LEET SPEAK</div>
                    <div class="arrow">→</div>
                    <div class="leet-text"><?php echo leetSpeak("LEET SPEAK"); ?></div>
                </div>
            </div>
            
            <div class="test-case">
                <h4>Test 4 : Texte mixte</h4>
                <p>Code : <code>leetSpeak("The Best Game Ever")</code></p>
                <div class="before-after">
                    <div class="original-text">The Best Game Ever</div>
                    <div class="arrow">→</div>
                    <div class="leet-text"><?php echo leetSpeak("The Best Game Ever"); ?></div>
                </div>
            </div>
        </div>
        
        
            <h3> Tests avancés</h3>
            
            
                    <h4>Programmation :</h4>
                   
                        <?php $test1 = "Programming Language"; echo $test1; ?>
                    
                    <div class="result-box">
                        <?php echo leetSpeak($test1); ?>
                    </div>
                </div>
                
                <div>
                    <h4>École :</h4>
                    
                        <?php $test2 = "La Plateforme"; echo $test2; ?>
                    
                    <div class="result-box">
                        <?php echo leetSpeak($test2); ?>
                    </div>
                </div>
                
                <div>
                    <h4>Message secret :</h4>
                    
                        <?php $test3 = "Secret Message"; echo $test3; ?>
                    
                    <div class="result-box">
                        <?php echo leetSpeak($test3); ?>
                    </div>
                </div>
                
                <div>
                    <h4>Tous les caractères :</h4>
                    
                        <?php $test4 = "ABEGIST abegist"; echo $test4; ?>
                    
                    <div class="result-box">
                        <?php echo leetSpeak($test4); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="info-box">
            <h3> À propos du Leet Speak (1337 5P34K)</h3>
            <p>Origine : Le leet speak (ou 1337 speak) est un système d'écriture qui remplace les lettres par des chiffres et des symboles qui leur ressemblent visuellement.</p>
            <p>Utilisation : Populaire dans la culture geek, les jeux vidéo et les communautés en ligne depuis les années 1980.</p>
            <p>Principe : Substitution de caractères pour créer un langage "codé" reconnaissable par les initiés.</p>
        </div>
        
        <div class="technical-info">
            <h3> Spécifications techniques :</h3>
            <ul >
                <li><p>Nom :</p> leetSpeak()</li>
                <li><p>Paramètre :</p> $str (string) - Chaîne à convertir</li>
                <li><p>Retour :</p> Chaîne convertie en leet speak</li>
                <li><p>Conversions :</p> A/a→4, B/b→8, E/e→3, G/g→6, L/l→1, S/s→5, T/t→7</li>
                <li><p>Sensibilité casse :</p> Majuscules ET minuscules supportées</li>
                <li><p>Autres caractères :</p> Conservés tels quels (espaces, ponctuation, etc.)</li>
            </ul>
        </div>
        
        <div>
            
                <p>73574N7 C0MP137 !</p> <br>
                <em>(Testing complet !)</em>
            </p>
            
        </div>
    </div>
</body>
</html>
