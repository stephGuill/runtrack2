<?php
session_start();

// Initialiser la grille si elle n'existe pas
if (!isset($_SESSION['morpion'])) {
    $_SESSION['morpion'] = array_fill(0, 9, '-');
    $_SESSION['joueur_actuel'] = 'X';
    $_SESSION['partie_finie'] = false;
    $_SESSION['message'] = '';
}

// Fonction pour vérifier s'il y a un gagnant
function verifierVictoire($grille) {
    $lignesGagnantes = [
        [0,1,2], [3,4,5], [6,7,8], // Lignes horizontales
        [0,3,6], [1,4,7], [2,5,8], // Lignes verticales  
        [0,4,8], [2,4,6]           // Diagonales
    ];
    
    foreach ($lignesGagnantes as $ligne) {
        if ($grille[$ligne[0]] !== '-' && 
            $grille[$ligne[0]] === $grille[$ligne[1]] && 
            $grille[$ligne[1]] === $grille[$ligne[2]]) {
            return $grille[$ligne[0]];
        }
    }
    return false;
}

// Fonction pour vérifier si c'est un match nul
function estMatchNul($grille) {
    return !in_array('-', $grille);
}

// Gestion des clics sur les cases
if (isset($_POST['case']) && !$_SESSION['partie_finie']) {
    $numeroCase = $_POST['case'];
    
    if ($_SESSION['morpion'][$numeroCase] === '-') {
        $_SESSION['morpion'][$numeroCase] = $_SESSION['joueur_actuel'];
        
        // Vérifier la victoire
        $gagnant = verifierVictoire($_SESSION['morpion']);
        if ($gagnant) {
            $_SESSION['partie_finie'] = true;
            $_SESSION['message'] = $gagnant . ' a gagné !';
        } elseif (estMatchNul($_SESSION['morpion'])) {
            $_SESSION['partie_finie'] = true;
            $_SESSION['message'] = 'Match nul !';
        } else {
            // Changer de joueur
            $_SESSION['joueur_actuel'] = ($_SESSION['joueur_actuel'] === 'X') ? 'O' : 'X';
        }
    }
}

// Réinitialiser la partie
if (isset($_POST['reset']) || $_SESSION['partie_finie']) {
    if (isset($_POST['reset']) || 
        (isset($_POST['nouvelle_partie']) && $_SESSION['partie_finie'])) {
        $_SESSION['morpion'] = array_fill(0, 9, '-');
        $_SESSION['joueur_actuel'] = 'X';
        $_SESSION['partie_finie'] = false;
        $_SESSION['message'] = '';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 05 - Jeu du Morpion (SESSIONS)</title>
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>
<body>
    <div class="container">
        <h1> Job 05 - Jeu du Morpion avec SESSIONS</h1>
        
        <div class="info">
            <h3> Règles du jeu :</h3>
            <p>• Le joueur X commence toujours en premier</p>
            <p>• Cliquez sur une case vide pour placer votre symbole</p>
            <p>• Le premier à aligner 3 symboles (ligne, colonne, diagonale) gagne</p>
            <p>• Si toutes les cases sont remplies sans gagnant : match nul</p>
        </div>

        <?php if (!$_SESSION['partie_finie']): ?>
            <div class="status">
                 Tour du joueur :<?php echo $_SESSION['joueur_actuel']; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="message">
                 <?php echo $_SESSION['message']; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="grille">
                <?php for ($i = 0; $i < 9; $i++): ?>
                    <button 
                        type="submit" 
                        name="case" 
                        value="<?php echo $i; ?>"
                        class="case <?php echo strtolower($_SESSION['morpion'][$i]); ?>"
                        <?php echo ($_SESSION['morpion'][$i] !== '-' || $_SESSION['partie_finie']) ? 'disabled' : ''; ?>
                    >
                        <?php echo $_SESSION['morpion'][$i]; ?>
                    </button>
                <?php endfor; ?>
            </div>

            <div>
                <button type="submit" name="reset" class="btn">
                     Réinitialiser la partie
                </button>
                
                <?php if ($_SESSION['partie_finie']): ?>
                    <button type="submit" name="nouvelle_partie" class="btn">
                         Nouvelle partie
                    </button>
                <?php endif; ?>
            </div>
        </form>

        <div class="info">
            <h4> État de la partie :</h4>
            <p>Joueur actuel : <?php echo $_SESSION['joueur_actuel']; ?></p>
            <p>Partie finie : <?php echo $_SESSION['partie_finie'] ? 'Oui' : 'Non'; ?></p>
            <p>Grille : [<?php echo implode(', ', $_SESSION['morpion']); ?>]</p>
        </div>

        <div>
            <a href="../job04/index.php">⬅ Job 04</a> |
            <a href="../"> Jour 08 - Index</a>
        </div>
    </div>
</body>
</html>