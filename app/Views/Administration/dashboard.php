<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administration - AVIJORO</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
</head>
<body>

    <!-- Barre de Navigation Moderne -->
    <nav class="admin-navbar">
        <a class="admin-logo" href="<?= base_url('admin/dashboard') ?>">AVIJORO Admin</a>
        <div class="admin-user-info">
            <span class="user-badge">👤 <?= esc($nom_admin) ?></span>
            <a href="<?= base_url('logout') ?>" class="btn-logout">Déconnexion</a>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="admin-container">
        
        <!-- Carte de Bienvenue -->
        <div class="welcome-card">
            <h1>Manao ahoana, <?= esc($nom_admin) ?> ! 👋</h1>
            <p>Bienvenue dans votre espace de gestion centralisé. Pilotez efficacement les contenus et actualités d'AVIJORO Madagascar.</p>
        </div>

        <!-- Grille des Modules -->
        <div class="admin-grid">
            
            <!-- Module Projets -->
            <div class="admin-card">
                <div>
                    <div class="card-icon icon-projets">
                        <svg xmlns="http://w3.org" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <h3>Gestion des Projets</h3>
                    <p>Publiez et organisez les chantiers de l'association. Éditez les descriptions et affectez les statuts dans les 3 langues.</p>
                </div>
                <a href="<?= base_url('admin/projets') ?>" class="btn-admin">Ouvrir les Projets</a>
            </div>

            <!-- Module Actualités -->
            <div class="admin-card">
                <div>
                    <div class="card-icon icon-actus">
                        <svg xmlns="http://w3.org" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <h3>Actualités & Événements</h3>
                    <p>Rédigez les articles d'actualité, planifiez les communiqués officiels et gérez les publications multilingues de l'association.</p>
                </div>
                <a href="<?= base_url('admin/actualites') ?>" class="btn-admin">Gérer les Actualités</a>
            </div>

            <!-- Module Médias -->
            <div class="admin-card">
                <div>
                    <div class="card-icon icon-medias">
                        <svg xmlns="http://w3.org" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    </div>
                    <h3>Médiathèque</h3>
                    <p>Téléversez les reportages photos, associez des vidéos de chantiers et stockez les documents officiels consultables.</p>
                </div>
                <a href="<?= base_url('admin/medias') ?>" class="btn-admin">Ouvrir les Médias</a>
            </div>

        </div>

    </div>

</body>
</html>
