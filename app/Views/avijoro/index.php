<?php $lang = $lang ?? 'fr'; ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="hero-home-section" style="position: relative; height: 600px; overflow: hidden; width: 100%;">
    <div class="hero-bg-wrapper" style="position: absolute; inset: 0;">
      <img
        src="<?= base_url('images/hero.jpg') ?>"
        alt="Bénévoles AVIJORO Madagascar"
        class="hero-bg-image"
        style="width: 100%; height: 100%; object-fit: cover;"
      />
      <div class="hero-overlay" style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.75), rgba(0,0,0,0.4));"></div>
    </div>

    <div class="hero-content-container" style="position: relative; max-width: 1200px; height: 100%; margin: 0 auto; padding: 0 1.5rem; display: flex; align-items: center;">
      <div class="hero-text-block" style="max-width: 42rem; color: #ffffff;">
        <h1 class="hero-main-title" style="font-size: 2.75rem; font-weight: 700; line-height: 1.2; margin: 0 0 1.5rem 0;">
          <?= lang('Texte.hero_titre') ?>
        </h1>

        <p class="hero-subtitle" style="font-size: 1.125rem; color: #e5e7eb; margin: 0 0 2rem 0; line-height: 1.6;">
          <?= lang('Texte.hero_description') ?>
        </p>

        <div class="hero-btn-group" style="display: flex; gap: 1rem; flex-wrap: wrap;">
          <a href="<?= base_url($lang . '/soutenir') ?>" class="btn-hero-primary" style="background-color: #2D8659; color: white; padding: 0.85rem 2rem; border-radius: 9999px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block;">
            <?= lang('Texte.bouton_rejoindre') ?>
          </a>

          <a href="<?= base_url($lang . '/soutenir') ?>" class="btn-hero-secondary" style="background-color: #FF7043; color: white; padding: 0.85rem 2rem; border-radius: 9999px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block;">
            <?= lang('Texte.bouton_don') ?>
          </a>

          <a href="<?= base_url($lang . '/projects') ?>" class="btn-hero-outline" style="border: 2px solid white; color: white; padding: 0.85rem 2rem; border-radius: 9999px; text-decoration: none; font-weight: 600; background: transparent; text-align: center; display: inline-block;">
            <?= lang('Texte.bouton_decouvrir') ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. MISSION SECTION ================= -->
  <section class="mission-section" style="padding: 5rem 0; background-color: #ffffff; width: 100%;">
    <div class="home-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; width: 100%; box-sizing: border-box;">
      
      <div class="mission-header-block" style="text-align: center; max-width: 45rem; margin: 0 auto 3.5rem auto;">
        <h2 class="mission-section-title" style="font-size: 2.25rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.mission_titre') ?></h2>
        <p class="mission-section-desc" style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; margin: 0;"><?= lang('Texte.mission_description') ?></p>
      </div>

      <div style="width: 100%; text-align: center; font-size: 0;">
        <div style="display: inline-block; width: 31%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: left; background: #f9fafb; padding: 2.5rem; border-radius: 1rem; border: 1px solid #f3f4f6; box-sizing: border-box;">
          <h3 style="color: #2D8659; margin-top: 0; margin-bottom: 1rem; font-size: 1.25rem; font-weight: 700;"><?= lang('Texte.bloc_mission_titre') ?></h3>
          <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 0.95rem;"><?= lang('Texte.bloc_mission_desc') ?></p>
        </div>

        <div style="display: inline-block; width: 31%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: left; background: #f9fafb; padding: 2.5rem; border-radius: 1rem; border: 1px solid #f3f4f6; box-sizing: border-box;">
          <h3 style="color: #2D8659; margin-top: 0; margin-bottom: 1rem; font-size: 1.25rem; font-weight: 700;"><?= lang('Texte.bloc_vision_titre') ?></h3>
          <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 0.95rem;"><?= lang('Texte.bloc_vision_desc') ?></p>
        </div>

        <div style="display: inline-block; width: 31%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: left; background: #f9fafb; padding: 2.5rem; border-radius: 1rem; border: 1px solid #f3f4f6; box-sizing: border-box;">
          <h3 style="color: #2D8659; margin-top: 0; margin-bottom: 1rem; font-size: 1.25rem; font-weight: 700;"><?= lang('Texte.bloc_valeurs_titre') ?></h3>
          <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 0.95rem;"><?= lang('Texte.bloc_valeurs_desc') ?></p>
        </div>
      </div>

    </div>
  </section>

  

  <!-- ================= 4. STATISTIQUES SECTION ================= -->
  <section class="stats-section" style="background-color: #2D8659; color: #ffffff; padding: 4rem 0; width: 100%; clear: both;">
    <div class="home-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; width: 100%; box-sizing: border-box;">
      
      <!-- Conteneur pour forcer l'alignement horizontal -->
      <div style="width: 100%; text-align: center; font-size: 0;">

        <!-- Bloc 1 : Bénévoles -->
        <div style="display: inline-block; width: 25%; min-width: 150px; font-size: 1rem; vertical-align: top; padding: 1rem; box-sizing: border-box;">
          <div class="stat-box-number" style="font-size: 3rem; font-weight: 700; color: #ffffff; margin-bottom: 0.5rem;">500+</div>
          <div class="stat-box-label" style="color: #e5e7eb; font-size: 0.95rem; font-weight: 500;"><?= lang('Texte.stat_benevoles') ?></div>
        </div>

        <!-- Bloc 2 : Projets -->
        <div style="display: inline-block; width: 25%; min-width: 150px; font-size: 1rem; vertical-align: top; padding: 1rem; box-sizing: border-box;">
          <div class="stat-box-number" style="font-size: 3rem; font-weight: 700; color: #ffffff; margin-bottom: 0.5rem;">25</div>
          <div class="stat-box-label" style="color: #e5e7eb; font-size: 0.95rem; font-weight: 500;"><?= lang('Texte.stat_projets') ?></div>
        </div>

        <!-- Bloc 3 : Bénéficiaires -->
        <div style="display: inline-block; width: 25%; min-width: 150px; font-size: 1rem; vertical-align: top; padding: 1rem; box-sizing: border-box;">
          <div class="stat-box-number" style="font-size: 3rem; font-weight: 700; color: #ffffff; margin-bottom: 0.5rem;">10,000+</div>
          <div class="stat-box-label" style="color: #e5e7eb; font-size: 0.95rem; font-weight: 500;"><?= lang('Texte.stat_beneficiaires') ?></div>
        </div>

        <!-- Bloc 4 : Réussite -->
        <div style="display: inline-block; width: 25%; min-width: 150px; font-size: 1rem; vertical-align: top; padding: 1rem; box-sizing: border-box;">
          <div class="stat-box-number" style="font-size: 3rem; font-weight: 700; color: #ffffff; margin-bottom: 0.5rem;">95%</div>
          <div class="stat-box-label" style="color: #e5e7eb; font-size: 0.95rem; font-weight: 500;"><?= lang('Texte.stat_reussite') ?></div>
        </div>

      </div>
    </div>
  </section>

    <!-- ================= SECTION COMPLETE : NOS PROJETS FIGMA ================= -->
 <!-- ================= SECTION DYNAMIQUE : NOS PROJETS ================= -->
<section class="projects-section" style="padding: 5rem 0; background-color: #f9fafb; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; width: 100%; clear: both;">
  <div class="home-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; width: 100%; box-sizing: border-box;">
    
    <!-- En-tête de la section -->
    <div style="text-align: center; max-width: 45rem; margin: 0 auto 4rem auto;">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.Nosprojets') ?></h2>
      <p style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; margin: 0;"><?= lang('Texte.decouvrez_initiatives') ?></p>
    </div>

    <!-- Grille dynamique -->
    <div style="width: 100%; text-align: center; font-size: 0; margin-bottom: 3rem;">
      
      <?php if (!empty($projets) && is_array($projets)): ?>
        <?php foreach ($projets as $projet): ?>
          
          <!-- Carte Projet Dynamique -->
          <div style="display: inline-block; width: 31%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: left; background-color: #ffffff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #f3f4f6; box-sizing: border-box;">
            
            <!-- Image du projet -->
            <div style="position: relative; height: 220px; background-color: #e5e7eb;">
              <img src="<?= esc($projet['image']) ?>" alt="<?= esc($projet['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;" />
              
              <!-- Catégorie dynamique -->
              <span style="position: absolute; top: 1rem; right: 1rem; background-color: rgba(255,255,255,0.9); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; color: #374151;">
                <?= esc($projet['category']) ?>
              </span>
            </div>
            
            <!-- Contenu textuel -->
            <div style="padding: 1.5rem;">
              <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0 0 0.75rem 0;">
                <?= esc($projet['title']) ?>
              </h3>
              
              <p style="color: #4b5563; font-size: 0.875rem; line-height: 1.6; margin: 0 0 1.5rem 0;">
                <?= character_limiter(strip_tags($projet['description']), 120) ?>
              </p>
              
              <!-- Lien vers le détail du projet spécifique -->
              <a href="<?= base_url(($lang ?? 'fr') . '/projets/' . $projet['id']) ?>" style="color: #2D8659; text-decoration: none; font-size: 0.875rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">
                En savoir plus ➔
              </a>
            </div>

          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p style="font-size: 1.125rem; color: #6b7280;">Aucun projet disponible pour le moment.</p>
      <?php endif; ?>

    </div>
  </div>
</section>

      </div>

      <!-- BOUTON CENTRAL : VOIR TOUS LES PROJETS (FIGMA STYLE) -->
      <div style="text-align: center; width: 100%;">
        <a href="<?= base_url( $lang . '/projects') ?>" style="display: inline-block; background-color: #2D8659; color: #ffffff; padding: 0.85rem 2.5rem; border-radius: 9999px; text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: background 0.2s; box-shadow: 0 4px 6px -1px rgba(45,134,89,0.2);">
           <?= lang('Texte.voir_tous_projets') ?>
        </a>
      </div>

    </div>
  </section>

    <!-- ================= SECTION ISOLÉE : NOTRE IMPACT EN VIDÉO ================= -->
  <section class="video-impact-section" style="padding: 5rem 0; background-color: #ffffff; width: 100%; clear: both;">
    <div class="home-container" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; width: 100%; box-sizing: border-box;">
      
      <!-- En-tête de la section -->
      <div style="text-align: center; max-width: 45rem; margin: 0 auto 3.5rem auto;">
        <h2 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.notre_impact_video') ?></h2>
        <p style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; margin: 0;"><?= lang('Texte.decouvrez_soutien') ?></p>
      </div>

      <!-- Lecteur Vidéo au design Figma -->
      <div style="max-width: 900px; margin: 0 auto; background-color: #0f172a; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); aspect-ratio: 16 / 9; position: relative;">
        
        <!-- MÉTHODE LOCAL : Lit le fichier dans public/videos/video.mp4 -->
        <video controls poster="<?= base_url('images/hero.jpg') ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          <source src="<?= base_url('videos/video.mp4') ?>" type="video/mp4">
          Votre navigateur ne prend pas en charge la lecture de vidéos.
        </video>

        <!-- 
          NOTE TECHNIQUE : Si vous préférez utiliser YouTube à l'avenir pour que ça charge plus vite,
          supprimez la balise <video> ci-dessus et activez ce bloc <iframe> ci-dessous :
          
          <iframe width="100%" height="100%" src="https://youtube.com" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
        -->

      </div>
    </div>
  </section>
  <!-- ================= SECTION ISOLÉE : APPEL À L'ACTION DÉGRADÉ ================= -->
  <section class="cta-difference-section" style="background: linear-gradient(135deg, #2D8659 0%, #1E88E5 100%); color: #ffffff; padding: 5rem 1.5rem; text-align: center; width: 100%; box-sizing: border-box; clear: both;">
    <div class="home-container" style="max-width: 1200px; margin: 0 auto; width: 100%;">
      
      <!-- Titre principal de la section -->
      <h2 style="font-size: 3rem; font-weight: 700; margin: 0 0 1.5rem 0; letter-spacing: -0.025em;">
        <?= lang('Texte.cta_diff_titre') ?>
      </h2>
      
      <!-- Descriptif -->
      <p style="font-size: 1.15rem; color: #e5e7eb; max-width: 42rem; margin: 0 auto 3rem auto; line-height: 1.6;">
        <?= lang('Texte.cta_diff_desc') ?>
      </p>

      <!-- Les deux boutons alignés horizontalement (Figma Style) -->
      <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
        
        <!-- Bouton Blanc : Devenir Bénévole -->
        <a href="<?= base_url(($lang ?? 'fr') . '/soutenir') ?>" style="display: inline-block; background-color: #ffffff; color: #111827; padding: 1rem 2.5rem; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); transition: transform 0.2s;">
          <?= lang('Texte.menu_soutenir') ?> <!-- Réutilise "Devenir bénévole / Nous rejoindre" -->
        </a>

        <!-- Bouton Orange : Soutenir nos projets -->
        <a href="<?= base_url(($lang ?? 'fr') . '/soutenir') ?>" style="display: inline-block; background-color: #FF7043; color: #ffffff; padding: 1rem 2.5rem; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 10px 15px -3px rgba(255,112,67,0.3); transition: transform 0.2s;">
          <?= lang('Texte.bouton_don') ?> <!-- Réutilise "Soutenir nos projets / Faire un don" -->
        </a>

      </div>

    </div>
  </section>

