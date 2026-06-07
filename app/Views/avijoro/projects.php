<?php $lang = $lang ?? 'fr'; ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

    <!-- ================= 1. HERO SECTION CORRIGÉE (PLEINE LARGEUR) ================= -->
  <section class="bg-gradient-to-br from-[#2D8659] to-[#1E88E5]" style="background: linear-gradient(135deg, #2D8659 0%, #1E88E5 100%); color: #ffffff; padding: 5rem 0; width: 100%; display: block; clear: both; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; text-align: center; box-sizing: border-box; width: 100%;">
      <h1 style="font-size: 3rem; font-weight: 700; margin: 0 0 1.5rem 0; letter-spacing: -0.025em; color: #ffffff;"><?= lang('Texte.projects_titre') ?></h1>
      <p style="font-size: 1.15rem; color: #e6f4ea; line-height: 1.6; margin: 0; max-width: 48rem; margin: 0 auto;"><?= lang('Texte.projects_slogan') ?></p>
    </div>
  </section>


  <!-- ================= 2. FILTRES DE CATÉGORIES ================= -->
  <section class="py-8 bg-white border-b" style="padding: 2rem 0; background-color: #ffffff; border-bottom: 1px solid #e5e7eb; width: 100%;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%;">
      <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap; font-size: 0.9rem;">
        
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 0.25rem;"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
        <span style="color: #4b5563; font-weight: 600; margin-right: 0.5rem;">📁 <?= lang('Texte.projects_filtrer') ?> :</span>
        
        <?php 
        $cat_active = $categorie_selectionnee ?? 'Tous'; 
        $categories = [
          'Tous'         => lang('Texte.projects_cat_tous'), 
          'Éducation'    => lang('Texte.projects_cat_education'), 
          'Santé'        => lang('Texte.projects_cat_sante'), 
          'Eau'          => lang('Texte.projects_cat_eau'), 
          'Environnement'=> lang('Texte.projects_cat_environ')
        ];
        foreach ($categories as $cle => $nom): 
          $est_actif = ($cat_active === $cle);
          $url_categorie = ($cle === 'Tous') ? 'projets' : 'projets?categorie=' . urlencode($cle);
        ?>
          <a href="<?= base_url(service('request')->getLocale() . '/' . $url_categorie) ?>" 
             style="text-decoration: none; padding: 0.5rem 1.25rem; border-radius: 9999px; font-weight: 600; font-size: 0.85rem; transition: all 0.2s; 
                    <?= $est_actif ? 'background-color: #2D8659; color: #ffffff; box-shadow: 0 4px 6px -1px rgba(45,134,89,0.2);' : 'background-color: #f3f4f6; color: #374151;' ?>">
            <?= $nom ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= 3. GRILLE DES PROJETS DYNAMIQUE ================= -->
  <section class="py-16 bg-gray-50" style="padding: 5rem 0; background-color: #f9fafb; width: 100%;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%;">
      
      <div style="width: 100%; text-align: center; font-size: 0;">
        
        <?php if (!empty($liste_projets)): ?>
          <?php foreach ($liste_projets as $project): 
            // Sécurité : accepte "En cours" de la maquette ou "en cours" SQL
            $est_en_cours = (strtolower($project['status']) === 'en cours');
            $badge_bg     = $est_en_cours ? '#3b82f6' : '#10b981';
          ?>
            <!-- Carte Projet Individuelle -->
            <div style="display: inline-block; width: 31%; margin: 0 1% 2.5rem 1%; vertical-align: top; font-size: 1rem; text-align: left; background-color: #ffffff; border-radius: 1.25rem; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; box-sizing: border-box;">
              
              <!-- Zone Image -->
              <div style="position: relative; height: 240px; background-color: #e5e7eb; overflow: hidden;">
                <img src="<?= $project['image'] ?>" alt="<?= esc($project['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                <span style="position: absolute; top: 1rem; left: 1rem; background-color: rgba(255,255,255,0.9); backdrop-filter: blur(4px); padding: 0.3rem 0.8rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; color: #111827;">
                  <?= esc($project['category']) ?>
                </span>
                <span style="position: absolute; top: 1rem; right: 1rem; background-color: <?= $badge_bg ?>; color: #ffffff; padding: 0.3rem 0.8rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">
                  <?php if ($est_en_cours): ?>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <?php else: ?>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <?php endif; ?>
                  <span><?= $est_en_cours ? lang('Texte.project_statut_cours') : lang('Texte.project_statut_termine') ?></span>
                </span>
              </div>

              <!-- Zone Contenu Textuel Conditionnelle (FIGMA STYLE) -->
              <div style="padding: 1.75rem;">
                <h3 style="font-size: 1.3rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= esc($project['title']) ?></h3>
                
                <p style="color: #4b5563; font-size: 0.875rem; line-height: 1.6; margin: 0 0 1.5rem 0; min-height: 70px;"><?= esc($project['description']) ?></p>
                
                <!-- Si le projet est EN COURS, on affiche la progression -->
                <?php if ($est_en_cours): ?>
                  <div style="margin-bottom: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.8rem; font-weight: 600; color: #374151; margin-bottom: 0.35rem;">
                      <span style="color: #6b7280; font-weight: 500;">Progression</span>
                      <span style="color: #2D8659;"><?= $project['progress'] ?>%</span>
                    </div>
                    <div style="width: 100%; background-color: #e5e7eb; height: 6px; border-radius: 9999px; overflow: hidden;">
                      <div style="background-color: #2D8659; height: 100%; width: <?= $project['progress'] ?>%; border-radius: 9999px;"></div>
                    </div>
                  </div>
                <?php endif; ?>

                <!-- Métadonnées géographiques et bénéficiaires -->
                <div style="font-size: 0.875rem; color: #374151; margin-bottom: 0.5rem; display: flex; justify-content: space-between;">
                  <span style="color: #6b7280;">Bénéficiaires :</span>
                  <span style="font-weight: 700;"><?= number_format($project['beneficiaries']) ?></span>
                </div>
                
                <div style="font-size: 0.875rem; color: #374151; margin-bottom: 1.5rem; display: flex; justify-content: space-between;">
                  <span style="color: #6b7280;">Localisation :</span>
                  <span style="font-weight: 600; color: #111827;"><?= esc($project['location']) ?></span>
                </div>

                <!-- Si le projet est TERMINÉ, on affiche le bouton vert -->
                <?php if (!$est_en_cours): ?>
                  <div style="border-top: 1px solid #f3f4f6; padding-top: 1rem;">
                    <a href="<?= base_url($lang . '/projets/' . $project['id']) ?>" style="color: #2D8659; text-decoration: none; font-size: 0.9rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">
                      En savoir plus ➔
                    </a>
                  </div>
                <?php endif; ?>

              </div>

            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="text-align: center; font-size: 1.1rem; color: #6b7280; padding: 4rem 0;">
            <?= lang('Texte.projects_aucun') ?>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </section>

  <!-- ================= 4. SECTION APPEL AU DON BANDE BLANCHE ================= -->
  <section class="support-cta-section" style="padding: 5rem 1.5rem; background-color: #ffffff; text-align: center; width: 100%; box-sizing: border-box; clear: both;">
    <div class="container mx-auto" style="max-width: 1200px; margin: 0 auto; width: 100%;">
      <h2 style="font-size: 2.75rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0; letter-spacing: -0.025em;"><?= lang('Texte.projects_support_titre') ?></h2>
      <p style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; max-width: 44rem; margin: 0 auto 2.5rem auto;"><?= lang('Texte.projects_support_desc') ?></p>
      <div style="text-align: center; width: 100%;">
        <a href="<?= base_url($lang . '/soutenir') ?>" style="display: inline-block; background-color: #FF7043; color: #ffffff; padding: 1rem 3rem; border-radius: 9999px; text-decoration: none; font-size: 0.95rem; font-weight: 600; box-shadow: 0 10px 15px -3px rgba(255,112,67,0.25);"><?= lang('Texte.projects_support_btn') ?></a>
      </div>
    </div>
  </section>

</div>
<div style="clear: both;"></div>
