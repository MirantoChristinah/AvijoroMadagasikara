<nav class="admin-navbar">
    <a class="admin-logo" href="<?= base_url('admin/dashboard') ?>">AVIJORO Admin</a>
    <div class="admin-nav-links">
        <a href="<?= base_url('admin/dashboard') ?>" class="admin-nav-link">Dashboard</a>
        <a href="<?= base_url('admin/projets') ?>" class="admin-nav-link">Projets</a>
        <a href="<?= base_url('admin/produits') ?>" class="admin-nav-link">Produits</a>
        <a href="<?= base_url('admin/actualites') ?>" class="admin-nav-link">Actualités</a>
        <a href="<?= base_url('admin/medias') ?>" class="admin-nav-link">Médias</a>
        <a href="<?= base_url('admin/benevoles') ?>" class="admin-nav-link">Candidatures</a>
    </div>
    <div class="admin-user-info">
        <span class="user-badge">👤 <?= esc(session()->get('nom')) ?></span>
        <a href="<?= base_url('logout') ?>" class="btn-logout">Déconnexion</a>
    </div>
</nav>
