<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la Médiathèque - AVIJORO</title>
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
                <h1 style="margin: 0; font-size: 26px; font-weight: 800; color: #0f172a;">📸 Médiathèque</h1>
            </div>
            <a href="<?= base_url('admin/medias/creer') ?>" class="btn-admin" style="background-color: #7c3aed;">+ Ajouter un Média</a>
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
                        <th style="width: 120px;">Type</th>
                        <th style="width: 140px;">Aperçu</th>
                        <th>Titre descriptif (FR)</th>
                        <!-- En-tête des actions alignée proprement 👇 -->
                        <th style="width: 180px; text-align: right; padding-right: 24px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($medias)): ?>
                        <?php foreach ($medias as $m): ?>
                            <tr>
                                <td style="font-weight: 700; color: #64748b;"><?= $m['id'] ?></td>
                                <td>
                                    <span class="badge-cat" style="background: #f3e8ff; color: #7c3aed; text-transform: uppercase;">
                                        <?= $m['type'] === 'photo' ? '📷 photo' : ($m['type'] === 'video' ? '🎬 vidéo' : '📄 doc') ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($m['type'] === 'photo' && $m['fichier']): ?>
                                        <img src="<?= base_url('uploads/images/' . $m['fichier']) ?>" style="width: 64px; height: 44px; object-fit: cover; border-radius: 10px; border: 1px solid #e2e8f0;">
                                    <?php elseif ($m['type'] === 'video'): ?>
                                        <span style="color: #2563eb; font-size: 13px; font-weight: 600;">Lien YouTube</span>
                                    <?php else: ?>
                                        <span style="color: #475569; font-size: 13px; font-weight: 600;">📄 <?= substr($m['fichier'], 0, 10) ?>...</span>
                                    <?php endif; ?>
                                </td>
                                <td style="font-weight: 700; color: #0f172a;"><?= esc($m['titre']) ?></td>
                                <!-- Ligne des boutons Modifier et Supprimer alignée à droite 👇 -->
                                <td style="text-align: right; padding-right: 24px; white-space: nowrap; vertical-align: middle;">
                                    <a href="<?= base_url('admin/medias/modifier/' . $m['id']) ?>" class="action-link-edit">Modifier</a>
                                    <a href="<?= base_url('admin/medias/supprimer/' . $m['id']) ?>" class="action-link-delete" onclick="return confirm('Supprimer ce média ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="padding: 60px; text-align: center; color: #64748b; font-size: 15px;">
                                📭 Aucun média disponible.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
