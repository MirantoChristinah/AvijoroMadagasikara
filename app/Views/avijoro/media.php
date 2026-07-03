<div class="main-content-wrapper">

  <!-- ==========================================
       SECTION 1 : HERO BANNER COMPACT
       ========================================== -->
  <section class="hero-home-section" style="background: linear-gradient(to right, #1b8a4f, #1a7bb9); padding: 5rem 0; text-align: center;">
    <div class="home-container">
      <div style="max-width: 800px; margin: 0 auto; color: #ffffff; padding: 0 1rem;">
        <h1 style="font-size: 3.5rem; font-weight: 700; margin: 0 0 1.5rem 0; letter-spacing: -0.5px;">
          <?= lang('Texte.mediatheque') ?>
        </h1>
        <p style="font-size: 1.15rem; font-weight: 400; opacity: 0.95; line-height: 1.6; margin: 0;">
          <?= lang('Texte.explorez_medias') ?>
        </p>
      </div>
    </div>
  </section>

  <!-- ==========================================
       SECTION 2 : BARRE DE FILTRES
       ========================================== -->
  <section style="background: #ffffff; padding: 1.5rem 0; border-bottom: 1px solid #eef0f2;">
    <div class="home-container">
      <div class="filters-row" style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">

        <div class="filters-buttons" style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
          <?php 
          $filtre_actif = $type_selectionne ?? 'Tous'; 
          $types_media = [
            'Tous'      => lang('Texte.media_filtre_tous'), 
            'Photos'    => lang('Texte.media_filtre_photos'), 
            'Vidéos'    => lang('Texte.media_filtre_videos'), 
            'Documents' => lang('Texte.media_filtre_documents')
          ];
          foreach ($types_media as $cle => $nom): 
            $est_actif = ($filtre_actif === $cle);
            $url_filtre = ($cle === 'Tous') ? 'media' : 'media?type=' . urlencode($cle);
          ?>
            <a href="<?= base_url($lang . '/' . $url_filtre) ?>" class="btn-filter <?= $est_actif ? 'active' : '' ?>">
              <?= $nom ?>
            </a>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>


  <!-- ==========================================
       SECTION 3 : GRILLE DES MÉDIAS
       ========================================== -->
  <section style="padding: 4rem 0; background: #ffffff;">
    <div class="home-container">
      <div class="media-grid-figma">
        
        <?php if (!empty($liste_medias)): ?>
          <?php foreach ($liste_medias as $media): ?>
            <a href="<?= base_url($lang . '/media/voir/' . $media['id']) ?>" class="media-card-figma">
              
              <!-- Zone Image avec ses badges superposés -->
              <div class="media-image-block">
                <img src="<?= esc($media['miniature']) ?>" alt="<?= esc($media['titre']) ?>" />
                
                <!-- 1. Badge Type (Vérification tolérante sans risques d'accent) -->
                <?php if (mb_strtolower($media['type']) === 'vidéo' || mb_strtolower($media['type']) === 'video'): ?>
                  <span class="media-badge-type">
                    <svg xmlns="http://w3.org" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m22 8-6 4 6 4V8Z"></path><rect width="14" height="12" x="2" y="6" rx="2" ry="2"></rect></svg>
                     <?= lang('Texte.media_filtre_videos') ?>
                  </span>
                <?php elseif (mb_strtolower($media['type']) === 'document'): ?>
                  <span class="media-badge-type">
                    <svg xmlns="http://w3.org" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                       <?= lang('Texte.media_filtre_documents') ?>
                  </span>
                <?php else: ?>
                  <span class="media-badge-type">
                    <svg xmlns="http://w3.org" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                      <?= lang('Texte.media_filtre_photos') ?>
                  </span>
                <?php endif; ?>

                <!-- 2. Overlay avec icône au survol -->
                <div class="media-hover-overlay">
                  <svg xmlns="http://w3.org" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                  </svg>
                </div>

                <!-- 3. Badge Compteur / Durée (En bas à droite) -->
                <?php if (!empty($media['valeur_badge'])): ?>
                  <span class="media-badge-counter">
                    <?= esc($media['valeur_badge']) ?>
                  </span>
                <?php endif; ?>
              </div>
              
              <!-- Zone Textes de la carte -->
              <div class="media-text-block">
                <h3 class="media-title-figma"><?= esc($media['titre']) ?></h3>
                <p class="media-desc-figma"><?= esc($media['description']) ?></p>
              </div>

            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="grid-column: span 3; text-align: center; padding: 4rem 0; color: #717182;">
            <p style="font-size: 1.1rem;"><?= lang('Texte.aucun_fichier') ?></p>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </section>

</div>
