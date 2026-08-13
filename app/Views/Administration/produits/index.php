<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits - AVIJORO</title>
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
</head>
<body>

    <?= $this->include('Administration/partials/admin_header') ?>

    <div class="admin-container">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; flex-wrap: wrap; gap: 15px;">
            <div style="display: flex; align-items: center; gap: 20px;">
                <a href="<?= base_url('admin/dashboard') ?>" class="btn-back">
                    <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Tableau de bord
                </a>
                <div>
                    <h1 style="margin: 0; font-size: 26px; font-weight: 800; color: #0f172a;">🛍️ Liste des Produits</h1>
                </div>
            </div>
            <a href="<?= base_url('admin/produits/creer') ?>" class="btn-admin" style="background-color: #16a34a;">+ Nouveau Produit</a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; padding: 16px; border-radius: 14px; margin-bottom: 30px; font-weight: 600; font-size: 15px;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="data-table-container">
            <div style="overflow-x: auto;">
                <table class="admin-table">
                    <thead style="background-color: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                        <tr>
                            <th style="padding: 16px 24px; color: #64748b; font-weight: 600; width: 60px;">ID</th>
                            <th style="padding: 16px; color: #64748b; font-weight: 600; width: 100px;">Aperçu</th>
                            <th>Nom (FR)</th>
                            <th style="width: 130px; color: #64748b; font-weight: 600;">Catégorie</th>
                            <th style="width: 120px; color: #64748b; font-weight: 600;">Prix (Ar)</th>
                            <th style="width: 120px; color: #64748b; font-weight: 600;">Disponibilité</th>
                            <th style="width: 180px; color: #64748b; font-weight: 600; text-align: right; padding-right: 24px;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($produits)): ?>
                            <?php foreach ($produits as $p): ?>
                                <tr>
                                    <td style="font-weight: 700; color: #64748b;"><?= $p['id'] ?></td>
                                    <td>
                                        <?php if ($p['image'] && file_exists(FCPATH . 'uploads/images/' . $p['image'])): ?>
                                            <img src="<?= base_url('uploads/images/' . $p['image']) ?>" alt="Produit" style="width: 64px; height: 44px; object-fit: cover; border-radius: 10px; border: 1px solid #e2e8f0;">
                                        <?php else: ?>
                                            <span style="color: #94a3b8; font-size: 13px; font-style: italic;">Aucune</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight: 700; color: #0f172a;"><?= esc($p['nom']) ?></td>
                                    <td><span class="badge-cat"><?= esc($p['categorie']) ?></span></td>
                                    <td style="font-weight: 600; color: #FF7043;"><?= number_format((int) $p['prix'], 0, ',', ' ') ?> Ar</td>
                                    <td>
                                        <?php if ((int) $p['disponible'] === 1): ?>
                                            <span class="badge-status-done">🟢 Disponible</span>
                                        <?php else: ?>
                                            <span class="badge-status-progress">🔴 Rupture</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: right; padding-right: 24px; white-space: nowrap;">
                                        <a href="<?= base_url('admin/produits/modifier/' . $p['id']) ?>" class="action-link-edit">Modifier</a>
                                        <a href="<?= base_url('admin/produits/supprimer/' . $p['id']) ?>" class="action-link-delete" onclick="return confirm('Êtes-vous absolument sûr de vouloir supprimer définitivement ce produit et toutes ses traductions ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="padding: 60px; text-align: center; color: #64748b; font-size: 15px; background-color: #ffffff;">
                                    📭 Aucun produit n'a encore été ajouté.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
