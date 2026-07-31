<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Actualités - AVIJORO</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
</head>
<body>

    <nav class="admin-navbar">
        <a class="admin-logo" href="<?= base_url('admin/dashboard') ?>">AVIJORO Admin</a>
        <a href="<?= base_url('logout') ?>" class="btn-logout">Déconnexion</a>
    </nav>

    <div class="admin-container">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; flex-wrap: wrap; gap: 15px;">
            <div style="display: flex; align-items: center; gap: 20px;">
                <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
                    <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Tableau de bord
                </a>
                <h1 style="margin: 0; font-size: 26px; font-weight: 800; color: #0f172a;">📰 Liste des Actualités</h1>
            </div>
            <a href="<?= base_url('admin/actualites/creer') ?>" class="btn-admin" style="background-color: #2563eb; margin-top: 30px; box-shadow: 0 4px 6px -1px rgba(37,99,235,0.2);">+ Nouvelle Actu</a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; padding: 16px; border-radius: 14px; margin-bottom: 30px; font-weight: 600;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="data-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th style="width: 100px;">Aperçu</th>
                        <th>Titre (FR)</th>
                        <th style="width: 140px;">Catégorie</th>
                        <th style="width: 140px;">Date Pub.</th>
                        <th style="width: 150px; text-align: right; padding-right: 24px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($actualites)): ?>
                        <?php foreach ($actualites as $a): ?>
                            <tr>
                                <td style="font-weight: 700; color: #64748b;"><?= $a['id'] ?></td>
                                <td>
                                    <?php if ($a['image']): ?>
                                        <img src="<?= base_url('uploads/images/' . $a['image']) ?>" alt="Actu" style="width: 64px; height: 44px; object-fit: cover; border-radius: 10px; border: 1px solid #e2e8f0;">
                                    <?php else: ?>
                                        <span style="color: #94a3b8; font-size: 13px; font-style: italic;">Aucune</span>
                                    <?php endif; ?>
                                </td>
                               <td style="font-weight: 700; color: #0f172a;"><?= esc($a['titre']) ?></td>
<td><span class="badge-cat"><?= esc($a['categorie']) ?></span></td>
<td style="font-weight: 600; color: #475569;"><?= date('d/m/Y', strtotime($a['date_publication'])) ?></td>

<!-- Zone des actions alignée proprement 👇 -->
<td style="text-align: right; padding-right: 24px; white-space: nowrap; vertical-align: middle;">
    <!-- Le bouton modifier utilise ta classe bleue textuelle existante -->
    <a href="<?= base_url('admin/actualites/modifier/' . $a['id']) ?>" class="action-link-edit">Modifier</a>
    
    <!-- Le bouton supprimer utilise ta classe rouge textuelle existante -->
    <a href="<?= base_url('admin/actualites/supprimer/' . $a['id']) ?>" class="action-link-delete" onclick="return confirm('Supprimer définitivement cette actualité ?')">Supprimer</a>
</td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="padding: 60px; text-align: center; color: #64748b; font-size: 15px;">
                                📭 Aucune actualité publiée pour le moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
