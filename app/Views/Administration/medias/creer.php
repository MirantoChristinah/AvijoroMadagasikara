<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Média - AVIJORO</title>
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
                Annuler et retourner
            </a>
            <div>
                <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">🎬 Créer un Média</h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Formulaire de création -->
        <form action="<?= base_url('admin/medias/enregistrer') ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <div class="form-grid-2">
                <!-- Type de média -->
                <div class="login-group">
                    <label class="login-label">Type de média</label>
                    <select name="type" id="type" class="form-select" required onchange="toggleType()">
                        <option value="">-- Sélectionner --</option>
                        <option value="photo">📷 Photo</option>
                        <option value="video">🎬 Vidéo</option>
                        <option value="document">📄 Document</option>
                    </select>
                </div>

                <!-- Association à un projet -->
                <div class="login-group">
                    <label class="login-label">Projet lié (Optionnel)</label>
                    <select name="projet_id" class="form-select">
                        <option value="">-- Aucun projet lié --</option>
                        <?php foreach ($projets as $projet): ?>
                            <option value="<?= $projet['id'] ?>">[ID: <?= $projet['id'] ?>] <?= esc($projet['titre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Champ fichier (Photo / Document) -->
            <div id="bloc-fichier" class="login-group">
                <label class="login-label">Fichier du média</label>
                <input type="file" name="fichier_upload" id="fichier_upload" class="login-input" accept=".jpg,.jpeg,.png,.mp4,.pdf" style="padding: 9px 12px;">
            </div>

            <!-- Champ lien vidéo (Vidéo) -->
            <div id="bloc-video" class="login-group" style="display: none;">
                <label class="login-label">Lien ou ID de la vidéo YouTube</label>
                <input type="text" name="fichier_video" id="fichier_video" class="login-input" placeholder="Collez l'URL de votre vidéo YouTube ici...">
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Légendes et descriptions multilingues</h3>

            <!-- Système d'onglets multilingues (1=mg, 2=fr, 3=en) -->
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
                        <input type="text" name="trad[2][titre]" class="login-input" required placeholder="Ex: Construction de l'école d'Antsirabe">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (FR)</label>
                        <textarea name="trad[2][description]" class="login-input" style="height: 120px; resize: vertical;" placeholder="Description du média..." required></textarea>
                    </div>
                </div>

                <!-- Onglet Malgache (ID = 1) -->
                <div class="tab-content content-mg">
                    <div class="login-group">
                        <label class="login-label">Titre du média (MG)</label>
                        <input type="text" name="trad[1][titre]" class="login-input" required placeholder="Ex: Fananganana ny sekoly Antsirabe">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (MG)</label>
                        <textarea name="trad[1][description]" class="login-input" style="height: 120px; resize: vertical;" placeholder="Famaritana ny media..." required></textarea>
                    </div>
                </div>

                <!-- Onglet Anglais (ID = 3) -->
                <div class="tab-content content-en">
                    <div class="login-group">
                        <label class="login-label">Titre du média (EN)</label>
                        <input type="text" name="trad[3][titre]" class="login-input" required placeholder="Ex: Construction of the Antsirabe school">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (EN)</label>
                        <textarea name="trad[3][description]" class="login-input" style="height: 120px; resize: vertical;" placeholder="Media description..." required></textarea>
                    </div>
                </div>
            </div>

            <!-- 🔵 GROS BOUTON DE VALIDATION BLEU AVEC OMBRE 🔵 -->
            <button type="submit" class="login-button" style="background-color: #2563eb; color: #ffffff; margin-top: 30px; box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2);">
                Enregistrer le Média
            </button>
        </form>

    </div>

    <script>
        function toggleType() {
            var type = document.getElementById('type').value;
            var blocFichier = document.getElementById('bloc-fichier');
            var blocVideo = document.getElementById('bloc-video');
            var fichier = document.getElementById('fichier_upload');
            var video = document.getElementById('fichier_video');

            if (type === 'video') {
                blocFichier.style.display = 'none';
                blocVideo.style.display = 'block';
                fichier.disabled = true;
                fichier.required = false;
                video.disabled = false;
                video.required = true;
            } else if (type === 'photo' || type === 'document') {
                blocFichier.style.display = 'block';
                blocVideo.style.display = 'none';
                video.disabled = true;
                video.required = false;
                fichier.disabled = false;
                fichier.required = true;
            } else {
                blocFichier.style.display = 'block';
                blocVideo.style.display = 'none';
                fichier.disabled = true;
                fichier.required = false;
                video.disabled = true;
                video.required = false;
            }
        }
        toggleType();
    </script>

</body>
</html>
