<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Projet - AVIJORO</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <style>
        .tab-system { margin-top: 25px; }
        .tab-nav { display: flex; border-bottom: 2px solid #e2e8f0; margin-bottom: 25px; gap: 10px; }
        .tab-btn { padding: 12px 24px; cursor: pointer; border-radius: 12px 12px 0 0; background: #f8fafc; font-weight: 600; color: #64748b; border: 1px solid #e2e8f0; border-bottom: none; transition: all 0.2s; }
        .tab-radio { display: none; }
        .tab-content { display: none; background: #ffffff; padding: 25px; border-radius: 16px; border: 1px solid #e2e8f0; }
        
        #tab-fr:checked ~ .tab-nav .btn-fr,
        #tab-mg:checked ~ .tab-nav .btn-mg,
        #tab-en:checked ~ .tab-nav .btn-en { background: #2563eb; color: #ffffff; border-color: #2563eb; }
        
        #tab-fr:checked ~ .content-fr,
        #tab-mg:checked ~ .content-mg,
        #tab-en:checked ~ .content-en { display: block; }

        .form-select { width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 12px; font-size: 15px; background: #ffffff; box-sizing: border-box; color: #0f172a; outline: none; transition: all 0.2s; }
        .form-select:focus { border-color: #2563eb; box-shadow: 0 0 0 4px rgba(37,99,235,0.1); }
        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
        @media (max-width: 650px) { .form-grid-2 { grid-template-columns: 1fr; } }
        .form-group-full { margin-bottom: 24px; }
    </style>
</head>
<body>

    <nav class="admin-navbar">
        <a class="admin-logo" href="<?= base_url('admin/dashboard') ?>">AVIJORO Admin</a>
        <a href="<?= base_url('logout') ?>" class="btn-logout">Déconnexion</a>
    </nav>

    <div class="admin-container" style="max-width: 850px;">
        
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 35px;">
            <a href="<?= base_url('admin/projets') ?>" class="btn-back">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Annuler
            </a>
            <div>
                <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">📝 Modifier le projet #<?= $projet['id'] ?></h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Formulaire pointant vers la route d'action de mise à jour avec l'ID dynamique -->
        <form action="<?= base_url('admin/projets/mettre-a-jour/' . $projet['id']) ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <!-- Catégorie & Statut pré-sélectionnés -->
            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Catégorie</label>
                    <select name="categorie" class="form-select" required>
                        <option value="Éducation" <?= $projet['categorie'] === 'Éducation' ? 'selected' : '' ?>>📚 Éducation</option>
                        <option value="Santé" <?= $projet['categorie'] === 'Santé' ? 'selected' : '' ?>>🩺 Santé</option>
                        <option value="Eau Potable" <?= $projet['categorie'] === 'Eau Potable' ? 'selected' : '' ?>>💧 Eau Potable</option>
                        <option value="Environnement" <?= $projet['categorie'] === 'Environnement' ? 'selected' : '' ?>>🌱 Environnement</option>
                    </select>
                </div>

                <div class="login-group">
                    <label class="login-label">Statut du chantier</label>
                    <select name="statut" class="form-select" required>
                        <option value="en cours" <?= $projet['statut'] === 'en cours' ? 'selected' : '' ?>>🟡 En cours</option>
                        <option value="termine" <?= $projet['statut'] === 'termine' ? 'selected' : '' ?>>🟢 Terminé</option>
                    </select>
                </div>
            </div>

            <!-- Dates pré-remplies -->
            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Date de lancement</label>
                    <input type="date" name="date_debut" class="login-input" value="<?= $projet['date_debut'] ?>" required>
                </div>

                <div class="login-group">
                    <label class="login-label">Date de clôture (Optionnel)</label>
                    <input type="date" name="date_fin" class="login-input" value="<?= $projet['date_fin'] ?>">
                </div>
            </div>

            <!-- Image actuelle et modification -->
            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Changer l'image (Laisser vide pour conserver)</label>
                    <input type="file" name="image" class="login-input" accept="image/*" style="padding: 9px 12px;">
                    <?php if ($projet['image']): ?>
                        <div style="margin-top: 10px; font-size: 13px; color: #64748b;">
                            Aperçu actuel : <br>
                            <img src="<?= base_url('uploads/images/' . $projet['image']) ?>" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px; margin-top: 5px; border: 1px solid #cbd5e1;">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="login-group">
                    <label class="login-label">Document Google Drive lié</label>
                    <input type="url" name="document_drive_link" class="login-input" value="<?= esc($projet['document_drive_link']) ?>" placeholder="https://google.com...">
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Éditer les contenus textuels</h3>

            <!-- Système d'onglets textuels pré-remplis -->
            <div class="tab-system">
                <input type="radio" name="lang_toggle" id="tab-fr" class="tab-radio" checked>
                <input type="radio" name="lang_toggle" id="tab-mg" class="tab-radio">
                <input type="radio" name="lang_toggle" id="tab-en" class="tab-radio">

                <div class="tab-nav">
                    <label for="tab-fr" class="tab-btn btn-fr">Français (FR)</label>
                    <label for="tab-mg" class="tab-btn btn-mg">Malgache (MG)</label>
                    <label for="tab-en" class="tab-btn btn-en">English (EN)</label>
                </div>

                <!-- Onglet Français (ID Langue 2) -->
                <div class="tab-content content-fr">
                    <div class="login-group">
                        <label class="login-label">Titre du Projet (FR)</label>
                        <input type="text" name="trad[2][titre]" class="login-input" required value="<?= esc($traductions[2]['titre'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (FR)</label>
                        <textarea name="trad[2][description]" class="login-input" style="height: 140px; resize: vertical;" required><?= esc($traductions[2]['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Onglet Malgache (ID Langue 1) -->
                <div class="tab-content content-mg">
                    <div class="login-group">
                        <label class="login-label">Titre du Projet (MG)</label>
                        <input type="text" name="trad[1][titre]" class="login-input" required value="<?= esc($traductions[1]['titre'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (MG)</label>
                        <textarea name="trad[1][description]" class="login-input" style="height: 140px; resize: vertical;" required><?= esc($traductions[1]['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Onglet Anglais (ID Langue 3) -->
                <div class="tab-content content-en">
                    <div class="login-group">
                        <label class="login-label">Titre du Projet (EN)</label>
                        <input type="text" name="trad[3][titre]" class="login-input" required value="<?= esc($traductions[3]['titre'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (EN)</label>
                        <textarea name="trad[3][description]" class="login-input" style="height: 140px; resize: vertical;" required><?= esc($traductions[3]['description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="login-button" style="background-color: #2563eb; margin-top: 30px;">
                Mettre à jour le Projet
            </button>
        </form>

    </div>

</body>
</html>
