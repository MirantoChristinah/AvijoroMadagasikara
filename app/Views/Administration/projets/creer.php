<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Projet - AVIJORO</title>
    <!-- Appel corrigé vers ton dossier public/css/admin.css -->
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <style>
        /* Système d'onglets pour le multilingue */
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
    </style>
</head>
<body>

    <?= $this->include('Administration/partials/admin_header') ?>

    <!-- Conteneur Formulaire -->
    <div class="admin-container" style="max-width: 850px;">
        
        <!-- En-tête de page avec bouton retour -->
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 35px;">
            <!-- BOUTON RETOUR LISTE PROJETS 👇 -->
            <a href="<?= base_url('admin/projets') ?>" class="btn-back">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Annuler et retourner
            </a>
            <div>
                <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">📁 Créer un nouveau projet</h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('admin/projets/enregistrer') ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <!-- Catégorie & Statut -->
            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Catégorie</label>
                    <select name="categorie" class="form-select" required>
                        <option value="Éducation">📚 Éducation</option>
                        <option value="Santé">🩺 Santé</option>
                        <option value="Eau Potable">💧 Eau Potable</option>
                        <option value="Environnement">🌱 Environnement</option>
                    </select>
                </div>

                <div class="login-group">
                    <label class="login-label">Statut du chantier</label>
                    <select name="statut" class="form-select" required>
                        <option value="en cours">🟡 En cours</option>
                        <option value="termine">🟢 Terminé</option>
                    </select>
                </div>
            </div>

            <!-- Dates -->
            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Date de lancement</label>
                    <input type="date" name="date_debut" class="login-input" required>
                </div>

                <div class="login-group">
                    <label class="login-label">Date de clôture (Optionnel)</label>
                    <input type="date" name="date_fin" class="login-input">
                </div>
            </div>

            <!-- Fichier image & Lien Drive -->
            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Illustration principale</label>
                    <input type="file" name="image" class="login-input" required accept="image/*" style="padding: 9px 12px;">
                </div>

                <div class="login-group">
                    <label class="login-label">Document Google Drive lié</label>
                    <input type="url" name="document_drive_link" class="login-input" placeholder="https://google.com...">
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Déclinaisons linguistiques (Traductions obligatoires)</h3>

            <!-- Système d'onglets textuels -->
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
                <div class="tab-content content-fr">
                    <div class="login-group">
                        <label class="login-label">Titre du Projet (FR)</label>
                        <input type="text" name="trad[titre]" class="login-input" required placeholder="Ex: Rénovation des infrastructures scolaires">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (FR)</label>
                        <textarea name="trad[description]" class="login-input" style="height: 140px; resize: vertical;" placeholder="Expliquez les objectifs et impacts du projet..." required></textarea>
                    </div>
                </div>

                <!-- Onglet Malgache -->
                <div class="tab-content content-mg">
                    <div class="login-group">
                        <label class="login-label">Titre du Projet (MG)</label>
                        <input type="text" name="trad[titre]" class="login-input" required placeholder="Ex: Fanavaozana ny fotodrafitrasa sekoly">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (MG)</label>
                        <textarea name="trad[description]" class="login-input" style="height: 140px; resize: vertical;" placeholder="Soraty eto ny antsipiriany..." required></textarea>
                    </div>
                </div>

                <!-- Onglet Anglais -->
                <div class="tab-content content-en">
                    <div class="login-group">
                        <label class="login-label">Titre du Projet (EN)</label>
                        <input type="text" name="trad[titre]" class="login-input" required placeholder="Ex: School Infrastructure Renovation">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description narrative (EN)</label>
                        <textarea name="trad[description]" class="login-input" style="height: 140px; resize: vertical;" placeholder="Overview of goals and community impacts..." required></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="login-button" style="background-color: #2563eb; margin-top: 30px; box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2);">
                Enregistrer et Publier le Projet
            </button>
        </form>

    </div>

</body>
</html>
