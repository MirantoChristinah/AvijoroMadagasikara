<div class="main-content-wrapper">
  
  <article class="article-single-container">
    
    <!-- 1. Ligne Date et Icône Calendrier -->
    <div class="article-single-meta">
      <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
      <span><?= date('d M Y', strtotime($article['date_publication'])) ?></span>
      <span style="color: var(--border);">•</span>
      <span style="color: var(--color-orange); font-weight: 600; text-transform: uppercase; font-size: 0.85rem;">
        <?= esc($article['categorie']) ?>
      </span>
    </div>

    <!-- 2. Titre complet de l'article -->
    <h1 class="article-single-title"><?= esc($article['titre']) ?></h1>

    <!-- 3. Grande Image de couverture -->
    <div class="article-single-image-wrapper">
      <img src="<?= (filter_var($article['image'], FILTER_VALIDATE_URL)) ? $article['image'] : base_url('uploads/actus/' . ($article['image'] ?: 'default.jpg')) ?>" alt="<?= esc($article['titre']) ?>" />
    </div>

    <!-- 4. Corps textuel de l'actualité (Gère les sauts de ligne de la BDD via nl2br) -->
    <div class="article-single-content">
      <?= nl2br(esc($article['contenu'])) ?>
    </div>

    <hr style="border: 0; border-top: 1px solid var(--border); margin-bottom: 2rem;">

    <!-- 5. Bouton Retour dynamique selon la langue active -->
    <div>
      <a href="<?= base_url($lang . '/news') ?>" class="btn-back-link">
        🡨 <?= lang('Texte.news_retour') ?? 'Retour aux actualités' ?>
      </a>
    </div>

  </article>

</div>
