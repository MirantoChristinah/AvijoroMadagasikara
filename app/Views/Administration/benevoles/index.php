<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidatures & Bénévoles - AVIJORO</title>
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
                <h1 style="margin: 0; font-size: 26px; font-weight: 800; color: #0f172a;">🤝 Candidatures & Bénévoles</h1>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; padding: 16px; border-radius: 14px; margin-bottom: 30px; font-weight: 600;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="login-alert" style="margin-bottom: 30px;"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 25px;">
            <a href="<?= base_url('admin/benevoles') ?>" class="badge-cat" style="text-decoration: none; <?= $statutActif === '' ? 'background-color: #16a34a; color: #ffffff;' : '' ?>">Toutes</a>
            <a href="<?= base_url('admin/benevoles?statut=en+attente') ?>" class="badge-cat" style="text-decoration: none; <?= $statutActif === 'en attente' ? 'background-color: #d97706; color: #ffffff;' : '' ?>">En attente</a>
            <a href="<?= base_url('admin/benevoles?statut=accepte') ?>" class="badge-cat" style="text-decoration: none; <?= $statutActif === 'accepte' ? 'background-color: #16a34a; color: #ffffff;' : '' ?>">Acceptés</a>
            <a href="<?= base_url('admin/benevoles?statut=refuse') ?>" class="badge-cat" style="text-decoration: none; <?= $statutActif === 'refuse' ? 'background-color: #e11d48; color: #ffffff;' : '' ?>">Refusés</a>
        </div>

        <div class="data-table-container">
            <div style="overflow-x: auto;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th style="width: 140px;">Téléphone</th>
                            <th style="width: 150px;">Disponibilité</th>
                            <th>Motivation</th>
                            <th style="width: 110px;">Statut</th>
                            <th style="width: 130px;">Date</th>
                            <th style="width: 200px; text-align: right; padding-right: 24px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($benevoles)): ?>
                            <?php foreach ($benevoles as $b): ?>
                                <tr>
                                    <td style="font-weight: 700; color: #64748b;"><?= $b['id'] ?></td>
                                    <td style="font-weight: 700; color: #0f172a;"><?= esc($b['nom']) ?></td>
                                    <td><?= esc($b['email']) ?></td>
                                    <td><?= esc($b['telephone'] ?? '—') ?></td>
                                    <td><?= esc($b['disponibilite'] ?? '—') ?></td>
                                    <td style="max-width: 260px;">
                                        <?php if (!empty($b['motivation'])): ?>
                                            <span title="<?= esc($b['motivation']) ?>" style="display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= esc($b['motivation']) ?></span>
                                        <?php else: ?>
                                            <span style="color: #94a3b8; font-style: italic;">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($b['statut'] === 'accepte'): ?>
                                            <span class="badge-status-done">🟢 Accepté</span>
                                        <?php elseif ($b['statut'] === 'refuse'): ?>
                                            <span style="color: #e11d48; background-color: #ffe4e6; padding: 6px 12px; border-radius: 8px; font-size: 13px; font-weight: 600;">🔴 Refusé</span>
                                        <?php else: ?>
                                            <span class="badge-status-progress">🟡 En attente</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight: 600; color: #475569;"><?= date('d/m/Y', strtotime($b['created_at'])) ?></td>
                                    <td style="text-align: right; padding-right: 24px; white-space: nowrap;">
                                        <?php if ($b['statut'] !== 'accepte'): ?>
                                            <a href="<?= base_url('admin/benevoles/statut/' . $b['id'] . '/accepte') ?>" class="action-link-edit">Accepter</a>
                                        <?php endif; ?>
                                        <?php if ($b['statut'] !== 'refuse'): ?>
                                            <a href="<?= base_url('admin/benevoles/statut/' . $b['id'] . '/refuse') ?>" class="action-link-edit" style="color: #e11d48;">Refuser</a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('admin/benevoles/supprimer/' . $b['id']) ?>" class="action-link-delete" onclick="return confirm('Supprimer définitivement cette candidature ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" style="padding: 60px; text-align: center; color: #64748b; font-size: 15px;">
                                    📭 Aucune candidature pour le moment.
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
