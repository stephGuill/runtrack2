<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélecteur de styles CSS</title>
    <?php
    // Déterminer quel style CSS inclure
    $style = 'style1'; // Style par défaut
    
    // Si le formulaire a été soumis, utiliser le style sélectionné
    if (isset($_POST['style']) && !empty($_POST['style'])) {
        $style = $_POST['style'];
        // Valider le style pour des raisons de sécurité
        $styles_valides = ['style1', 'style2', 'style3'];
        if (!in_array($style, $styles_valides)) {
            $style = 'style1'; // Revenir au style par défaut si invalide
        }
    }
    ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($style); ?>.css">
</head>
<body>
    <div class="container">
        <h1>🎨 Sélecteur de Styles</h1>
        
        <?php if (isset($_POST['style'])): ?>
        <div class="style-info">
            <h3>Style actuel : <?php echo htmlspecialchars($style); ?></h3>
            <p>
                <?php
                switch($style) {
                    case 'style1':
                        echo "Thème moderne avec des dégradés bleus et une interface épurée.";
                        break;
                    case 'style2':
                        echo "Thème cyberpunk sombre avec des effets néon verts et une police monospace.";
                        break;
                    case 'style3':
                        echo "Thème vintage rétro avec des couleurs chaudes et une typographie classique.";
                        break;
                    default:
                        echo "Style par défaut";
                }
                ?>
            </p>
        </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="style">Choisissez un style :</label>
                <select name="style" id="style" required>
                    <option value="" <?php echo (!isset($_POST['style']) || $_POST['style'] === '') ? 'selected' : ''; ?>>
                        -- Sélectionnez un style --
                    </option>
                    <option value="style1" <?php echo (isset($_POST['style']) && $_POST['style'] === 'style1') ? 'selected' : ''; ?>>
                        Style 1 - Moderne Bleu
                    </option>
                    <option value="style2" <?php echo (isset($_POST['style']) && $_POST['style'] === 'style2') ? 'selected' : ''; ?>>
                        Style 2 - Cyberpunk Sombre
                    </option>
                    <option value="style3" <?php echo (isset($_POST['style']) && $_POST['style'] === 'style3') ? 'selected' : ''; ?>>
                        Style 3 - Vintage Rétro
                    </option>
                </select>
            </div>
            
            <button type="submit">Appliquer le style</button>
        </form>
        
        <div class="style-info">
            <h3>📋 Description des styles</h3>
            <p><strong>Style 1 - Moderne Bleu :</strong> Design contemporain avec dégradés bleus, ombres subtiles et animations fluides.</p>
            <p><strong>Style 2 - Cyberpunk Sombre :</strong> Interface futuriste avec fond noir, texte vert néon et effets de grille.</p>
            <p><strong>Style 3 - Vintage Rétro :</strong> Ambiance nostalgique avec couleurs chaudes, bordures ornementées et typographie classique.</p>
        </div>
        
        <div class="style-info">
            <h3>🔧 Comment ça marche</h3>
            <p>1. Sélectionnez un style dans la liste déroulante</p>
            <p>2. Cliquez sur "Appliquer le style"</p>
            <p>3. La page se recharge avec le nouveau style CSS</p>
            <p>4. Le style sélectionné reste actif grâce à la méthode POST</p>
        </div>
        
        <?php if (isset($_POST['style'])): ?>
        <div class="style-info">
            <h3>🔍 Informations techniques</h3>
            <p><strong>Fichier CSS chargé :</strong> <?php echo htmlspecialchars($style); ?>.css</p>
            <p><strong>Méthode :</strong> POST</p>
            <p><strong>Validation :</strong> 
                <?php echo in_array($style, ['style1', 'style2', 'style3']) ? '✅ Style valide' : '❌ Style invalide'; ?>
            </p>
        </div>
        <?php endif; ?>
        
        <div style="margin-top: 30px; text-align: center; opacity: 0.7; font-size: 0.9em;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>
