<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Média - AVIJORO</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <style>
        /* Système d'onglets pour le multilingue */
        .tab-system { margin-top: 25px; }
        .tab-nav { display: flex; border-bottom: 2px solid #e2e8f0; margin-bottom: 25px; gap: 10px; }
        .tab-btn { padding: 12px 24px; cursor: pointer; border-radius: 12px 12px 0 0; background: #f8fafc; font-weight: 600; color: #64748b; border: 1px solid #e2e8f0; border-bottom: none; transition: all 0.2s; }
        .tab-radio { display: none; }
        .tab-content { display: none; background: #ffffff; padding: 25px; border-radius: 16px; border: 1px solid #e2e8f0; }
        
        /* 🔵 STYLE DES ONGLETS BLEUS AVEC L'OMBRE QUAND CLIQUÉS 🔵 */
        #tab-fr:checked ~ .tab-nav .btn-fr,
        #tab-mg:checked ~ .tab-nav .btn-mg,
        #tab-en:checked ~ .tab-nav .btn-en { 
            background-color: #2563eb !important; 
            color: #ffffff !important; 
            border-color: #2563eb !important;
            box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2) !important;
            transform: translateY(-1px);
        }
        
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

    <?= $this->include('Administration/partials/admin_header') ?>

    <!-- Conteneur Principal -->
    <div class="admin-container" style="max-width: 850px;">
        
        <!-- En-tête avec bouton retour -->
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 35px;">
            <a href="<?= base_url('admin/medias') ?>" class="btn-back">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Annuler
            </a>
            <div>
                <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">📝 Modifier le média #<?= $media['id'] ?></h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Formulaire de mise à jour -->
        <form action="<?= base_url('admin/medias/mettre-a-jour/' . $media['id']) ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <div class="form-grid-2">
                <!-- Type de média bloqué en modification (sécurité pour éviter l'incohérence des fichiers) -->
                <div class="login-group">
                    <label class="login-label">Type de Média (Non modifiable)</label>
                    <input type="text" class="login-input" value="<?= strtoupper($media['type']) ?>" disabled style="background-color: #f1f5f9; font-weight: bold; color: #64748b;">
                </div>

                <!-- Changer l'association du projet -->
                <div class="login-group">
                    <label class="login-label">Lier à un Projet</label>
                    <select name="projet_id" class="form-select">
                        <option value="">-- Aucun projet lié --</option>
                        <?php foreach($projets as $p): ?>
                            <option value="<?= $p['id'] ?>" <?= $media['projet_id'] == $p['id'] ? 'selected' : '' ?>>[ID: <?= $p['id'] ?>] <?= esc($p['titre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Champ Remplacement Fichier (Pour Photo et Document uniquement) -->
            <?php if ($media['type'] === 'photo' || $media['type'] === 'document'): ?>
                <div class="login-group">
                    <label class="login-label">Remplacer le fichier (Laisser vide pour conserver l'actuel)</label>
                    <input type="file" name="fichier_upload" class="login-input" style="padding: 9px 12px;">
                    <div style="margin-top: 10px; font-size: 13px; color: #64748b;">
                        Fichier actuel stocké : <code><?= esc($media['fichier']) ?></code>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Champ Lien Vidéo (Pour Vidéo uniquement) -->
            <?php if ($media['type'] === 'video'): ?>
                <div class="login-group">
                    <label class="login-label">Lien ou ID de la vidéo YouTube</label>
                    <input type="text" name="fichier_video" class="login-input" value="https://youtube.com<?= esc($media['fichier']) ?>" placeholder="Collez l'URL de votre vidéo YouTube ici...">
                </div>
            <?php endif; ?>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Éditer les légendes et descriptions</h3>

            <!-- Système d'onglets multilingues pré-remplis (1=mg, 2=fr, 3=en) -->
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
                        <label class="login-label">Titre du média (FR)</label>
                        <input type="text" name="trad[2][titre]" class="login-input" required value="<?= esc($traductions[2]['titre'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (FR)</label>
                        <textarea name="trad[2][description]" class="login-input" style="height: 120px; resize: vertical;"><?= esc($traductions[2]['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Onglet Malgache (ID = 1) -->
                <div class="tab-content content-mg">
                    <div class="login-group">
                        <label class="login-label">Titre du média (MG)</label>
                        <input type="text" name="trad[1][titre]" class="login-input" required value="<?= esc($traductions[1]['titre'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (MG)</label>
                        <textarea name="trad[1][description]" class="login-input" style="height: 120px; resize: vertical;"><?= esc($traductions[1]['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Onglet Anglais (ID = 3) -->
                <div class="tab-content content-en">
                    <div class="login-group">
                        <label class="login-label">Titre du média (EN)</label>
                        <input type="text" name="trad[3][titre]" class="login-input" required value="<?= esc($traductions[3]['titre'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (EN)</label>
                        <textarea name="trad[3][description]" class="login-input" style="height: 120px; resize: vertical;"><?= esc($traductions[3]['description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- 🔵 GROS BOUTON DE VALIDATION BLEU AVEC OMBRE 🔵 -->
            <button type="submit" class="login-button" style="background-color: #2563eb; color: #ffffff; margin-top: 30px; box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2);">
                Mettre à jour le Média
            </button>
        </form>

    </div>

</body>
</html>
