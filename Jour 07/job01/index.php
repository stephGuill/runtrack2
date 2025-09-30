<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonction hello()</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1> Fonction hello()</h1>
        
        <?php
        // Créer la fonction hello()
        function hello() {
            echo "Hello LaPlateforme!";
        }
        
        // Appeler la fonction et afficher le résultat
        echo '<div class="result">';
        hello(); // Appel de la fonction
        echo '</div>';
        ?>
        
        <div class="info-box">
            <h3> Code de la fonction :</h3>
            <div class="code-block">
&lt;?php<br>
function hello() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Hello LaPlateforme!";<br>
}<br>
<br>
// Appel de la fonction<br>
hello();<br>
?&gt;
            </div>
        </div>
        
        <div class="info-box">
            <h3> Explication :</h3>
            <ul>
                <li><p>Définition :</p> <code>function hello()</code> déclare la fonction</li>
                <li><p>Corps :</p> Les accolades <code>{ }</code> contiennent le code à exécuter</li>
                <li><p>Action :</p> <code>echo</code> affiche le texte sur la page</li>
                <li><p>Appel :</p> <code>hello();</code> exécute la fonction</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h3> Démonstration multiple :</h3>
            <p>La fonction peut être appelée plusieurs fois :</p>
            <div>
                <?php
                echo "1. ";
                hello();
                echo "<br>";
                
                echo "2. ";
                hello();
                echo "<br>";
                
                echo "3. ";
                hello();
                ?>
            </div>
        </div>
        
       
    </div>
</body>
</html>
