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

    <!-- Barre de Navigation -->
    <nav class="admin-navbar">
        <a class="admin-logo" href="<?= base_url('admin/dashboard') ?>">AVIJORO Admin</a>
        <a href="<?= base_url('logout') ?>" class="btn-logout">Déconnexion</a>
    </nav>

    <!-- Conteneur Principal -->
    <div class="admin-container" style="max-width: 850px;">
        
        <!-- En-tête avec bouton retour -->
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 35px;">
            <a href="<?= base_url('admin/medias') ?>" class="btn-back">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Annuler
            </a>
            <div>
                <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">📸 Ajouter un élément multimédia</h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Formulaire de création -->
        <form action="<?= base_url('admin/medias/enregistrer') ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <div class="form-grid-2">
                <!-- Choix du Type de Média -->
                <div class="login-group">
                    <label class="login-label">Type de Ressource</label>
                    <select name="type" id="media_type" class="form-select" onchange="toggleMediaInputs()" required>
                        <option value="photo">📷 Photo Illustrative</option>
                        <option value="video">🎬 Vidéo Intégrée (YouTube)</option>
                        <option value="document">📄 Document Téléchargeable (PDF...)</option>
                    </select>
                </div>

                <!-- Liaison optionnelle à un projet -->
                <div class="login-group">
                    <label class="login-label">Lier à un Projet (Facultatif)</label>
                    <!-- Menu de liaison épuré dans creer.php -->
                    <select name="projet_id" class="form-select">
                    <option value=""> Aucun lien </option>
                     <?php foreach($projets as $p): ?>
                        <!-- On affiche uniquement le titre du projet désormais 👇 -->
                        <option value="<?= $p['id'] ?>"><?= esc($p['titre']) ?></option>
                     <?php endforeach; ?>
                    </select>

                </div>
            </div>

            <!-- Champ Upload (Affiché par défaut pour Photo et Document) -->
            <div class="login-group" id="group_upload">
                <label class="login-label">Sélectionner le fichier sur votre appareil</label>
                <input type="file" name="fichier_upload" class="login-input" id="input_file" style="padding: 9px 12px;">
            </div>

            <!-- Champ Texte (Affiché uniquement pour la Vidéo via YouTube) -->
            <div class="login-group" id="group_video" style="display: none;">
                <label class="login-label">Adresse URL de la vidéo YouTube</label>
                <input type="url" name="fichier_video" class="login-input" placeholder="https://youtube.com...">
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Légendes et descriptions multilingues</h3>

            <!-- Système d'onglets de langues (2=FR, 1=MG, 3=EN) -->
            <div class="tab-system">
                <input type="radio" name="lang_toggle" id="tab-fr" class="tab-radio" checked>
                <input type="radio" name="lang_toggle" id="tab-mg" class="tab-radio">
                <input type="radio" name="lang_toggle" id="tab-en" class="tab-radio">

                <div class="tab-nav">
                    <label for="tab-fr" class="tab-btn btn-fr">Français (FR)</label>
                    <label for="tab-mg" class="tab-btn btn-mg">Malgache (MG)</label>
                    <label for="tab-en" class="tab-btn btn-en">English (EN)</label>
                </div>

                <!-- Onglet Français -->
                <input type="text" name="trad[2][titre]" class="login-input" required placeholder="Ex: Aperçu des salles de classe">
...
<textarea name="trad[2][description]" ...></textarea>

                <!-- Onglet Malgache -->
               <input type="text" name="trad[1][titre]" class="login-input" required placeholder="Ex: Sary indray mijery ny efitrano fianarana">
...
<textarea name="trad[1][description]" ...></textarea>

                <!-- Onglet Anglais -->
                 <input type="text" name="trad[3][titre]" class="login-input" required placeholder="Ex: Overview of the classrooms">
...
<textarea name="trad[3][description]" ...></textarea>

            <!-- 🔵 GROS BOUTON DE VALIDATION BLEU AVEC OMBRE 🔵 -->
            <button type="submit" class="login-button" style="background-color: #2563eb; color: #ffffff; margin-top: 30px; box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2);">
                Enregistrer le Média
            </button>
        </form>
    </div>

    <!-- Script JavaScript pour adapter les champs dynamiquement -->
    <script>
        function toggleMediaInputs() {
            var selectedType = document.getElementById('media_type').value;
            var uploadBox = document.getElementById('group_upload');
            var videoBox = document.getElementById('group_video');
            var fileInput = document.getElementById('input_file');

            if (selectedType === 'video') {
                uploadBox.style.display = 'none';
                videoBox.style.display = 'block';
                fileInput.required = false;
            } else {
                uploadBox.style.display = 'block';
                videoBox.style.display = 'none';
                fileInput.required = true;
            }
        }
        // Exécution au premier chargement de la page
        toggleMediaInputs();
    </script>
</body>
</html>
