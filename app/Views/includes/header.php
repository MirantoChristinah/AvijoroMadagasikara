<!DOCTYPE html>
<html lang="<?= esc($lang ?? 'fr') ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVIJORO Madagascar</title>

    <!-- Chargement de votre feuille de style nettoyée -->
    <link href="<?= base_url('css/theme.css') ?>" rel="stylesheet">
</head>

<body>

<!-- NAVBAR STYLE FIGMA BLANCHE -->
<nav class="main-navbar">
    <div class="navbar-container">

        <!-- GAUCHE : LOGO AVEC LE CŒUR VERT -->
        <div class="navbar-logo">
            <svg width="26" height="26" fill="#2D8659" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
            <span>AVIJORO Madagascar</span>
        </div>

        <!-- CENTRE : TOUS LES LIENS DU MENU (INCLUANT CONTACT ÉCHELONNÉ) -->
        <div class="navbar-menu">
            <?php $uri = service('uri')->getPath(); ?>
            
            <a href="<?= base_url($lang) ?>" class="nav-item-figma <?= ($uri == $lang || $uri == '') ? 'active' : '' ?>">
                Accueil
            </a>

            <a href="<?= base_url($lang . '/qui-sommes-nous') ?>" class="nav-item-figma <?= (strpos($uri, 'qui-sommes-nous') !== false) ? 'active' : '' ?>">
                À propos
            </a>

            <a href="<?= base_url($lang . '/projets') ?>" class="nav-item-figma <?= (strpos($uri, 'projets') !== false) ? 'active' : '' ?>">
                Projets
            </a>

            <a href="<?= base_url($lang . '/actualites') ?>" class="nav-item-figma <?= (strpos($uri, 'actualites') !== false) ? 'active' : '' ?>">
                Actualités
            </a>
            
            <a href="<?= base_url($lang . '/media') ?>" class="nav-item-figma <?= (strpos($uri, 'media') !== false) ? 'active' : '' ?>">
                Média
            </a>

            <a href="<?= base_url($lang . '/soutenir') ?>" class="nav-item-figma <?= (strpos($uri, 'soutenir') !== false) ? 'active' : '' ?>">
                Nous rejoindre
            </a>
            
            <!-- Parfaitement inclus ici pour suivre la ligne verte commune -->
            <a href="<?= base_url($lang . '/contact') ?>" class="nav-item-figma <?= (strpos($uri, 'contact') !== false) ? 'active' : '' ?>">
                Contact
            </a>
        </div>

        <!-- DROITE : SÉLECTEUR DE LANGUE ET BOUTON ORANGE SEULS -->
        <div class="navbar-right-block">

            <!-- SÉLECTEUR DE LANGUE -->
            <div class="language-selector">
                <a href="<?= base_url('fr') ?>" style="color: <?= ($lang ?? 'fr') == 'fr' ? '#111827' : '#9ca3af'; ?>; font-weight: <?= ($lang ?? 'fr') == 'fr' ? '700' : '500'; ?>;">FR</a>
                <span style="color: #e5e7eb; user-select: none;">|</span>
                <a href="<?= base_url('mg') ?>" style="color: <?= ($lang ?? 'fr') == 'mg' ? '#111827' : '#9ca3af'; ?>; font-weight: <?= ($lang ?? 'fr') == 'mg' ? '700' : '500'; ?>;">MG</a>
                <span style="color: #e5e7eb; user-select: none;">|</span>
                <a href="<?= base_url('en') ?>" style="color: <?= ($lang ?? 'fr') == 'en' ? '#111827' : '#9ca3af'; ?>; font-weight: <?= ($lang ?? 'fr') == 'en' ? '700' : '500'; ?>;">EN</a>
            </div>

            <!-- BOUTON FAIRE UN DON -->
            <a href="<?= base_url($lang . '/soutenir') ?>" class="btn-soutenir">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="color: #ffffff; flex-shrink: 0;">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <span>Faire un don</span>
            </a>

        </div>

    </div>
</nav>
