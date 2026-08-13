<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Produit - AVIJORO</title>
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

    <?= $this->include('Administration/partials/admin_header') ?>

    <div class="admin-container" style="max-width: 850px;">

        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 35px;">
            <a href="<?= base_url('admin/produits') ?>" class="btn-back">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Annuler
            </a>
            <div>
                <h1 style="margin: 0; font-size: 24px; font-weight: 800; color: #0f172a;">🛍️ Modifier le produit #<?= $produit['id'] ?></h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('admin/produits/mettre-a-jour/' . $produit['id']) ?>" method="POST" enctype="multipart/form-data" class="login-card" style="max-width: 100%; border-radius: 20px;">
            <?= csrf_field() ?>

            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Prix (en Ariary)</label>
                    <input type="number" name="prix" class="login-input" min="0" value="<?= esc($produit['prix']) ?>" required>
                </div>

                <div class="login-group">
                    <label class="login-label">Catégorie</label>
                    <input type="text" name="categorie" class="login-input" value="<?= esc($produit['categorie']) ?>" placeholder="Ex: Vêtements, Accessoires...">
                </div>
            </div>

            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Tailles (séparées par des virgules)</label>
                    <input type="text" name="tailles" class="login-input" value="<?= esc($produit['tailles']) ?>" placeholder="Ex: S,M,L,XL">
                </div>

                <div class="login-group">
                    <label class="login-label">Couleurs (séparées par des virgules)</label>
                    <input type="text" name="couleurs" class="login-input" value="<?= esc($produit['couleurs']) ?>" placeholder="Ex: Noir,Vert,Blanc">
                </div>
            </div>

            <div class="form-grid-2">
                <div class="login-group">
                    <label class="login-label">Changer l'image (Laisser vide pour conserver)</label>
                    <input type="file" name="image" class="login-input" accept="image/*" style="padding: 9px 12px;">
                    <?php if ($produit['image'] && file_exists(FCPATH . 'uploads/images/' . $produit['image'])): ?>
                        <div style="margin-top: 10px; font-size: 13px; color: #64748b;">
                            Aperçu actuel : <br>
                            <img src="<?= base_url('uploads/images/' . $produit['image']) ?>" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px; margin-top: 5px; border: 1px solid #cbd5e1;">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="login-group">
                    <label class="login-label">Disponibilité</label>
                    <select name="disponible" class="form-select" required>
                        <option value="1" <?= (int) $produit['disponible'] === 1 ? 'selected' : '' ?>>🟢 Disponible</option>
                        <option value="0" <?= (int) $produit['disponible'] === 0 ? 'selected' : '' ?>>🔴 Rupture de stock</option>
                    </select>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">
            <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #0f172a; font-weight: 700;">✍️ Éditer les contenus textuels</h3>

            <div class="tab-system">
                <input type="radio" name="lang_toggle" id="tab-fr" class="tab-radio" checked>
                <input type="radio" name="lang_toggle" id="tab-mg" class="tab-radio">
                <input type="radio" name="lang_toggle" id="tab-en" class="tab-radio">

                <div class="tab-nav">
                    <label for="tab-fr" class="tab-btn btn-fr">Français (FR)</label>
                    <label for="tab-mg" class="tab-btn btn-mg">Malgache (MG)</label>
                    <label for="tab-en" class="tab-btn btn-en">English (EN)</label>
                </div>

                <div class="tab-content content-fr">
                    <div class="login-group">
                        <label class="login-label">Nom du produit (FR)</label>
                        <input type="text" name="trad[2][nom]" class="login-input" required value="<?= esc($traductions[2]['nom'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description (FR)</label>
                        <textarea name="trad[2][description]" class="login-input" style="height: 120px; resize: vertical;" required><?= esc($traductions[2]['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="tab-content content-mg">
                    <div class="login-group">
                        <label class="login-label">Anaran'ny vokatra (MG)</label>
                        <input type="text" name="trad[1][nom]" class="login-input" required value="<?= esc($traductions[1]['nom'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Famaritana (MG)</label>
                        <textarea name="trad[1][description]" class="login-input" style="height: 120px; resize: vertical;" required><?= esc($traductions[1]['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="tab-content content-en">
                    <div class="login-group">
                        <label class="login-label">Product name (EN)</label>
                        <input type="text" name="trad[3][nom]" class="login-input" required value="<?= esc($traductions[3]['nom'] ?? '') ?>">
                    </div>
                    <div class="form-group-full">
                        <label class="login-label">Description (EN)</label>
                        <textarea name="trad[3][description]" class="login-input" style="height: 120px; resize: vertical;" required><?= esc($traductions[3]['description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="login-button" style="background-color: #FF7043; margin-top: 30px;">
                Mettre à jour le Produit
            </button>
        </form>

    </div>

</body>
</html>
