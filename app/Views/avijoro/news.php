<div class="main-content-wrapper">

  <!-- ==========================================
       SECTION 1 : HERO BANNER COMPACT (STYLE FIGMA)
       ========================================== -->
  <section class="hero-home-section" style="background: linear-gradient(to right, #1b8a4f, #1a7bb9); padding: 5rem 0; text-align: center;">
    <div class="home-container">
      <div style="max-width: 800px; margin: 0 auto; color: #ffffff; padding: 0 1rem;">
        <!-- Titre principal -->
        <h1 style="font-size: 3rem; font-weight: 700; margin: 0 0 1.5rem 0; letter-spacing: -0.5px;">
         <?= lang('Texte.Actualite') ?>
        </h1>
        <!-- Sous-titre textuel -->
        <p style="font-size: 1.15rem; font-weight: 400; opacity: 0.95; line-height: 1.6; margin: 0;">
         <?= lang('Texte.texte_hero') ?> 
        </p>
      </div>
    </div>
  </section>

  <!-- ==========================================
       SECTION 2 : BARRE DE FILTRES AVEC ICÔNE ÉTIQUETTE
       ========================================== -->
  <section style="background: #ffffff; padding: 1.5rem 0; border-bottom: 1px solid #eef0f2;">
    <div class="home-container">
      <div class="filters-row" style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
        
        <!-- Icône étiquette / Tag de la maquette -->
        <div style="display: flex; align-items: center; gap: 0.5rem; color: #717182; font-weight: 500; font-size: 0.95rem;">
          <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
            <line x1="7" y1="7" x2="7.01" y2="7"></line>
          </svg>
          <span>Filtrer par :</span>
        </div>

        <!-- Boutons de catégories arrondis -->
        <div class="filters-buttons" style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
          <?php 
          $cat_active = $categorie_selectionnee ?? 'Tous'; 
          $categories = [
            'Tous'       => lang('Texte.news_cat_tous'), 
            'Événements' => lang('Texte.news_cat_evenements'), 
            'Projets'    => lang('Texte.news_cat_projets'), 
            'Campagnes'  => lang('Texte.news_cat_campagnes'), 
            'Réussites'  => lang('Texte.news_cat_reussites')
          ];
          foreach ($categories as $cle => $nom): 
            $est_actif = ($cat_active === $cle);
            $url_categorie = ($cle === 'Tous') ? 'actualites' : 'actualites?categorie=' . urlencode($cle);
          ?>
            <a href="<?= base_url($lang . '/' . $url_categorie) ?>" class="btn-filter <?= $est_actif ? 'active' : '' ?>">
              <?= $nom ?>
            </a>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>

  <?php 
  // Répartition et tri automatique des articles reçus depuis le contrôleur
  $featuredArticles = [];
  $regularArticles = [];
  if (!empty($liste_articles)) {
      foreach ($liste_articles as $article) {
          if (isset($article['featured']) && $article['featured'] == 1) {
              $featuredArticles[] = $article;
          } else {
              $regularArticles[] = $article;
          }
      }
  }
  ?>

  <!-- ==========================================
       SECTION 3 : ARTICLES À LA UNE (Grille 2 Colonnes)
       ========================================== -->
  <?php if (!empty($featuredArticles)): ?>
    <section style="padding: 4rem 0; background: #ffffff;">
      <div class="home-container">
        <h2 style="font-size: 2rem; font-weight: 700; color: #030213; margin-bottom: 1.5rem;">À la une</h2>
        <div class="news-grid-featured">
          <?php foreach ($featuredArticles as $article): ?>
            <div class="actualite-card-figma">
              
              <!-- Zone Image + Badge superposé -->
              <div class="actualite-image-block">
                <img src="<?= base_url('uploads/actualites/' . $article['image']) ?>" alt="<?= esc($article['titre']) ?>" />
                <span class="actualite-badge-figma"><?= esc($article['categorie']) ?></span>
              </div>
              
              <!-- Zone Textes et Contenu -->
              <div class="actualite-text-block">
                <!-- Date avec icône calendrier -->
                <div class="actualite-date-row">
                  <svg xmlns="http://w3.org" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                  <span><?= date('j M Y', strtotime($article['date_publication'])) ?></span>
                </div>
                
                <h3 class="actualite-title-figma"><?= esc($article['titre']) ?></h3>
                <p class="actualite-excerpt-figma"><?= esc($article['contenu']) ?></p>
                <a href="<?= base_url($lang . '/actualites/' . $article['id']) ?>" class="actualite-link-figma"><?= lang('Texte.lire_la_suite') ?></a>
              </div>

            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- ==========================================
       SECTION 4 : ARTICLES RÉGULIERS (Grille 3 Colonnes comme la photo)
       ========================================== -->
  <section style="padding: 4rem 0; background: #ffffff; <?= empty($featuredArticles) ? '' : 'border-top: 1px solid #eef0f2;' ?>">
    <div class="home-container">
      
      <?php if (empty($featuredArticles)): ?>
        <h2 style="font-size: 2rem; font-weight: 700; color: #030213; margin-bottom: 2rem;">Toutes les actualités</h2>
      <?php endif; ?>

      <div class="news-grid-regular">
        <?php if (!empty($regularArticles)): ?>
          <?php foreach ($regularArticles as $article): ?>
            <div class="actualite-card-figma">
              
              <!-- Image et Badge de Catégorie superposé -->
              <div class="actualite-image-block">
                <img src="<?= base_url('uploads/actualites/' . $article['image']) ?>" alt="<?= esc($article['titre']) ?>" />
                <span class="actualite-badge-figma"><?= esc($article['categorie']) ?></span>
              </div>
              
              <!-- Contenu de la carte -->
              <div class="actualite-text-block">
                
                <!-- Date de publication avec icône calendrier -->
                <div class="actualite-date-row">
                  <svg xmlns="http://w3.org" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                    <line x1="16" x2="16" y1="2" y2="6"></line>
                    <line x1="8" x2="8" y1="2" y2="6"></line>
                    <line x1="3" x2="21" y1="10" y2="10"></line>
                  </svg>
                  <span><?= date('j M Y', strtotime($article['date_publication'])) ?></span>
                </div>
                
                <h3 class="actualite-title-figma"><?= esc($article['titre']) ?></h3>
                <p class="actualite-excerpt-figma"><?= esc($article['contenu']) ?></p>
                
                <!-- Lien d'accès -->
                <a href="<?= base_url($lang . '/actualites/' . $article['id']) ?>" class="actualite-link-figma">
                Lire la suite ➔
                  </a>

              </div>

            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <!-- Message si aucun article ne correspond à la catégorie sélectionnée -->
          <div style="grid-column: span 3; text-align: center; padding: 4rem 0; color: #717182;">
            <p style="font-size: 1.1rem;"><?= lang('Texte.news_aucun_article') ?? 'Aucune actualité disponible pour le moment.' ?></p>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </section>

</div>
