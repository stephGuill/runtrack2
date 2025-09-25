<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombres pairs et impairs</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <h1>Analyse des nombres : pairs et impairs</h1>
    
    <?php
    // Créer un tableau contenant les nombres donnés
    $nombres = [200, 204, 173, 98, 171, 404, 459];
    ?>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Parité</th>
                <th>Résultat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nombres as $nombre): ?>
                <tr>
                    <td class="nombre"><?php echo $nombre; ?></td>
                    <td>
                        <?php if ($nombre % 2 == 0): ?>
                            <span class="pair">Pair</span>
                        <?php else: ?>
                            <span class="impair">Impair</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($nombre % 2 == 0): ?>
                            <span class="pair"><?php echo $nombre; ?> est paire</span>
                        <?php else: ?>
                            <span class="impair"><?php echo $nombre; ?> est impaire</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: center; color: #666;">
        <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
    </div>
</body>
</html>