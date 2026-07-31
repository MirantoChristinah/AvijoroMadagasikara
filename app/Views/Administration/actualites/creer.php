<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Actualité - AVIJORO</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <style>
        .tab-system { margin-top: 25px; }
        .tab-nav { display: flex; border-bottom: 2px solid #e2e8f0; margin-bottom: 25px; gap: 10px; }
        .tab-btn { padding: 12px 24px; cursor: pointer; border-radius: 12px 12px 0 0; background: #f8fafc; font-weight: 600; color: #64748b; border: 1px solid #e2e8f0; border-bottom: none; }
        .tab-radio { display: none; }
        .tab-content { display: none; background: #ffffff; padding: 25px; border-radius: 16px; border: 1px solid #e2e8f0; }
        
        #tab-fr:checked ~ .tab-nav .btn-fr,
        #tab-mg:checked ~ .tab-nav .btn-mg,
        #tab-en:checked ~ .tab-nav .btn-en { background: #d97706; color: #ffffff; border-color: #d97706; }
        
        #tab-fr:checked ~ .content-fr,
        #tab-mg:checked ~ .content-mg,
        #tab-en:checked ~ .content-en { display: block; }
    </style>
</head>
<body>

    <nav class="admin-navbar">
        <a class="admin-logo" href="<?= base_url('admin/dashboard') ?>">AVIJORO Admin</a>
        <a href="<?= base_url('logout') ?>" class="btn-logout">Déconnexion</a>
    </nav>

    <div class="admin-container" style="max-width: 850px;">
        
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 35px;">
            <a href="<?= base_url('admin/actualites') ?>" class="btn-back">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Annuler
            </a>
            <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">📰 Rédiger une actualité</h1>
        </div>

        <form action="<?= base_url('admin/actualites/enregistrer') ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Catégorie</label>
                    <input type="text" name="categorie" class="login-input" required placeholder="Ex: Événement, Communiqué, Vie associative">
                </div>

                <div class="login-group">
                    <label class="login-label">Date de Publication</label>
                    <input type="date" name="date_publication" class="login-input" value="<?= date('Y-m-d') ?>" required>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Illustration de l'article</label>
                    <input type="file" name="image" class="login-input" required accept="image/*" style="padding: 9px 12px;">
                </div>

                <div class="login-group">
                    <label class="login-label">Lien Vidéo YouTube liée (Optionnel)</label>
                    <input type="url" name="video" class="login-input" placeholder="https://youtube.com...">
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Rédaction des articles</h3>

            <div class="tab-system">
                <input type="radio" name="lang_toggle" id="tab-fr" class="tab-radio" checked>
                <input type="radio" name="lang_toggle" id="tab-mg" class="tab-radio">
                <input type="radio" name="lang_toggle" id="tab-en" class="tab-radio">

                <div class="tab-nav">
                    <label for="tab-fr" class="tab-btn btn-fr">Français (FR)</label>
                    <label for="tab-mg" class="tab-btn btn-mg">Malgache (MG)</label>
                    <label for="tab-en" class="tab-btn btn-en">English (EN)</label>
                </div>

                <!-- Onglet Français (ID = 2) -->
                <div class="tab-content content-fr">
                    <div class="login-group">
                        <label class="login-label">Titre de l'Actualité (FR)</label>
                        <input type="text" name="trad[2][titre]" class="login-input" required placeholder="Ex: Assemblée Générale 2026">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Corps de l'article (FR)</label>
                        <textarea name="trad[2][contenu]" class="login-input" style="height: 200px; resize: vertical;" placeholder="Écrivez le contenu de votre article ici..." required></textarea>
                    </div>
                </div>

                <!-- Onglet Malgache (ID = 1) -->
                <div class="tab-content content-mg">
                    <div class="login-group">
                        <label class="login-label">Titre de l'Actualité (MG)</label>
                        <input type="text" name="trad[1][titre]" class="login-input" required placeholder="Ex: Fivoriambe 2026">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Corps de l'article (MG)</label>
                        <textarea name="trad[1][contenu]" class="login-input" style="height: 200px; resize: vertical;" placeholder="Soraty eto ny vontoatiny..." required></textarea>
                    </div>
                </div>

                <!-- Onglet Anglais (ID = 3) -->
                <div class="tab-content content-en">
                    <div class="login-group">
                        <label class="login-label">Titre de l'Actualité (EN)</label>
                        <input type="text" name="trad[3][titre]" class="login-input" required placeholder="Ex: General Meeting 2026">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Corps de l'article (EN)</label>
                        <textarea name="trad[3][contenu]" class="login-input" style="height: 200px; resize: vertical;" placeholder="Write the article content here..." required></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="login-button" style="background-color: #2563eb; margin-top: 30px; box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2);">
                Publier l'Actualité
            </button>
        </form>

    </div>

</body>
</html>
