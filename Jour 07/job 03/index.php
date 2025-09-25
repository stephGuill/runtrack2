<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction getHello() avec return</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>🔄 Fonction getHello() avec return</h1>
        
        <?php
        // Créer la fonction getHello() qui RETOURNE la valeur
        function getHello() {
            return "Hello LaPlateforme!";
        }
        
        // Appeler la fonction et récupérer sa valeur de retour
        $message = getHello();
        ?>
        
        <div class="result">
            <?php echo $message; ?>
        </div>
        
        <div class="info-box">
            <h3>📝 Code de la fonction :</h3>
            <div class="code-block">
&lt;?php<br>
// Fonction qui RETOURNE une valeur<br>
function getHello() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return "Hello LaPlateforme!";<br>
}<br>
<br>
// Appel de la fonction et récupération du retour<br>
$message = getHello();<br>
echo $message; // Affichage de la valeur récupérée<br>
?&gt;
            </div>
        </div>
        
        <div class="comparison">
            <div class="comparison-item echo">
                <h4>❌ Avec echo (job 01)</h4>
                <div class="code-block">
function hello() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Hello LaPlateforme!";<br>
}<br>
<br>
hello(); // Affiche directement
                </div>
                <p><strong>Problème :</strong> Affichage immédiat, pas de flexibilité</p>
            </div>
            
            <div class="comparison-item return">
                <h4>✅ Avec return (job 03)</h4>
                <div class="code-block">
function getHello() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return "Hello LaPlateforme!";<br>
}<br>
<br>
$msg = getHello(); // Récupère la valeur<br>
echo $msg; // Affiche quand on veut
                </div>
                <p><strong>Avantage :</strong> Valeur réutilisable et manipulable</p>
            </div>
        </div>
        
        <div class="demo-section">
            <h3>🎯 Démonstrations pratiques :</h3>
            
            <h4>1. Stockage dans une variable :</h4>
            <div class="code-block">
$salutation = getHello();<br>
echo $salutation; // <?php $salutation = getHello(); echo $salutation; ?>
            </div>
            
            <h4>2. Utilisation directe :</h4>
            <div class="code-block">
echo getHello(); // <?php echo getHello(); ?>
            </div>
            
            <h4>3. Manipulation de la valeur :</h4>
            <div class="code-block">
$message = getHello() . " Comment ça va?";<br>
echo $message; // <?php $concatenated = getHello() . " Comment ça va?"; echo $concatenated; ?>
            </div>
            
            <h4>4. Utilisation dans une condition :</h4>
            <div class="code-block">
if (getHello() === "Hello LaPlateforme!") {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Message correct!";<br>
} // 
<?php
if (getHello() === "Hello LaPlateforme!") {
    echo "Message correct!";
}
?>
            </div>
            
            <h4>5. Utilisation multiple :</h4>
            <div style="margin: 10px 0;">
                <?php
                echo "1. " . getHello() . "<br>";
                echo "2. " . getHello() . "<br>";
                echo "3. " . getHello() . "<br>";
                ?>
            </div>
        </div>
        
        <div class="info-box">
            <h3>🔍 Différences clés :</h3>
            <ul>
                <li><strong>echo :</strong> Affiche immédiatement, ne peut pas être réutilisé</li>
                <li><strong>return :</strong> Renvoie une valeur, peut être stockée et manipulée</li>
                <li><strong>Flexibilité :</strong> return permet de composer et transformer les données</li>
                <li><strong>Testabilité :</strong> Une fonction avec return est plus facile à tester</li>
                <li><strong>Réutilisabilité :</strong> La valeur retournée peut servir plusieurs fois</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3>💡 Bonnes pratiques :</h3>
            <ul>
                <li>Utilisez <strong>return</strong> pour les calculs et transformations</li>
                <li>Utilisez <strong>echo</strong> uniquement pour l'affichage final</li>
                <li>Une fonction ne devrait avoir qu'une seule responsabilité</li>
                <li>Préférez return pour une meilleure séparation des préoccupations</li>
            </ul>
        </div>
        
        <div style="margin-top: 30px; text-align: center; color: #666;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>
