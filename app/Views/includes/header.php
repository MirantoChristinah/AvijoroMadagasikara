<!DOCTYPE html>
<html lang="<?= esc($lang ?? 'fr') ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVIJORO Madagascar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/theme.css') ?>" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-xl main-navbar">
    <div class="container-fluid navbar-container">

        <a class="navbar-brand navbar-logo" href="<?= base_url($lang) ?>">
            <svg width="26" height="26" fill="#2D8659" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
            <span>AVIJORO Madagascar</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box"><span></span><span></span><span></span></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <?php $uri = service('uri')->getPath(); ?>

            <ul class="navbar-nav navbar-menu mx-auto">
                <li class="nav-item">
                    <a href="<?= base_url($lang) ?>" class="nav-link nav-item-figma <?= ($uri == $lang || $uri == '') ? 'active' : '' ?>">
                        <?= lang('Texte.accueil') ?>
                    </a>
                </li>

                <li class="nav-item dropdown nav-dropdown">
                    <a href="<?= base_url($lang . '/qui-sommes-nous') ?>" class="nav-link nav-item-figma dropdown-toggle <?= (strpos($uri, 'qui-sommes-nous') !== false) ? 'active' : '' ?>"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <?= lang('Texte.Apropos') ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url($lang . '/qui-sommes-nous#histoire') ?>"><?= lang('Texte.sub_histoire') ?></a></li>
                        <li><a class="dropdown-item" href="<?= base_url($lang . '/qui-sommes-nous#mission') ?>"><?= lang('Texte.sub_mission') ?></a></li>
                        <li><a class="dropdown-item" href="<?= base_url($lang . '/qui-sommes-nous#valeurs') ?>"><?= lang('Texte.sub_valeurs') ?></a></li>
                        <li><a class="dropdown-item" href="<?= base_url($lang . '/qui-sommes-nous#parcours') ?>"><?= lang('Texte.sub_parcours') ?></a></li>
                        <li><a class="dropdown-item" href="<?= base_url($lang . '/qui-sommes-nous#equipe') ?>"><?= lang('Texte.sub_equipe') ?></a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url($lang . '/projects') ?>" class="nav-link nav-item-figma <?= (strpos($uri, 'projects') !== false) ? 'active' : '' ?>">
                        <?= lang('Texte.Projets') ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url($lang . '/actualites') ?>" class="nav-link nav-item-figma <?= (strpos($uri, 'actualites') !== false) ? 'active' : '' ?>">
                        <?= lang('Texte.Actualite') ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url($lang . '/media') ?>" class="nav-link nav-item-figma <?= (strpos($uri, 'media') !== false) ? 'active' : '' ?>">
                        <?= lang('Texte.Media') ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url($lang . '/faq') ?>" class="nav-link nav-item-figma <?= (strpos($uri, 'faq') !== false) ? 'active' : '' ?>">
                        <?= lang('Texte.FAQ') ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url($lang . '/soutenir') ?>" class="nav-link nav-item-figma <?= (strpos($uri, 'soutenir') !== false) ? 'active' : '' ?>">
                        <?= lang('Texte.joindre') ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url($lang . '/contact') ?>" class="nav-link nav-item-figma <?= (strpos($uri, 'contact') !== false) ? 'active' : '' ?>">
                        <?= lang('Texte.Contact') ?>
                    </a>
                </li>
            </ul>

            <div class="navbar-right-block">
                <div class="language-selector">
                    <?php
                    $currentPath = trim(service('uri')->getPath(), '/');
                    $segments = $currentPath !== '' ? explode('/', $currentPath) : [];
                    if (isset($segments[0]) && in_array($segments[0], ['fr', 'mg', 'en'])) {
                        array_shift($segments);
                    }
                    $restOfUrl = implode('/', $segments);
                    ?>
                    <a href="<?= base_url('fr/' . $restOfUrl) ?>" style="color: <?= ($lang ?? 'fr') == 'fr' ? '#111827' : '#9ca3af'; ?>; font-weight: <?= ($lang ?? 'fr') == 'fr' ? '700' : '500'; ?>;">FR</a>
                    <span style="color: #e5e7eb; user-select: none;">|</span>
                    <a href="<?= base_url('mg/' . $restOfUrl) ?>" style="color: <?= ($lang ?? 'fr') == 'mg' ? '#111827' : '#9ca3af'; ?>; font-weight: <?= ($lang ?? 'fr') == 'mg' ? '700' : '500'; ?>;">MG</a>
                    <span style="color: #e5e7eb; user-select: none;">|</span>
                    <a href="<?= base_url('en/' . $restOfUrl) ?>" style="color: <?= ($lang ?? 'fr') == 'en' ? '#111827' : '#9ca3af'; ?>; font-weight: <?= ($lang ?? 'fr') == 'en' ? '700' : '500'; ?>;">EN</a>
                </div>

                <a href="<?= base_url($lang . '/soutenir') ?>" class="btn btn-soutenir">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="color: #ffffff; flex-shrink: 0;">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span><?= lang('Texte.bouton_don') ?></span>
                </a>
            </div>
        </div>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
