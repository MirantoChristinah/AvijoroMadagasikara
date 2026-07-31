<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - AVIJORO</title>
    <!-- On appelle exclusivement le fichier de style dédié à l'administration 👇 -->
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
</head>
<body class="login-body">

<div class="login-container">
    <div class="login-card">
        <h3 class="login-title">AVIJORO Admin</h3>
        <p class="login-subtitle">Veuillez vous connecter pour continuer</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login/check') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="login-group">
                <label for="email" class="login-label">Adresse Email</label>
                <input type="email" name="email" id="email" required placeholder="admin@avijoro.mg" class="login-input">
            </div>

            <div class="login-group">
                <label for="mot_de_passe" class="login-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" required placeholder="••••••••" class="login-input">
            </div>

            <button type="submit" class="login-button">Se connecter</button>
        </form>
    </div>
</div>

</body>
</html>
