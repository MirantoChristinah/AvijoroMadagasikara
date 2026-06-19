<?php $lang = $lang ?? service('request')->getLocale(); ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. BANNIÈRE DE L'ARTICLE (PLEINE LARGEUR) ================= -->
  <section class="bg-gradient-to-br from-[#2D8659] to-[#1E88E5]" style="background: linear-gradient(135deg, #2D8659 0%, #1E88E5 100%); color: #ffffff; padding: 4rem 0; width: 100%; display: block; clear: both; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%;">
      
      <!-- Bouton Retour au style de votre site -->
      <div style="margin-bottom: 1.5rem; text-align: left;">
        <a href="<?= base_url($lang . '/actualites') ?>" style="color: #e6f4ea; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem; background-color: rgba(255,255,255,0.1); padding: 0.5rem 1.25rem; border-radius: 9999px; transition: background 0.2s;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <?= lang('Texte.actualites_retour') ?? 'Retour aux actualités' ?>
        </a>
      </div>

      <!-- Titre de l'actualité en gros -->
      <h1 style="font-size: 2.5rem; font-weight: 700; margin: 0 0 1.5rem 0; letter-spacing: -0.025em; color: #ffffff; line-height: 1.3; text-align: left;">
        <?= esc($article['titre']) ?>
      </h1>

      <!-- Métadonnées : Catégorie & Date de publication -->
      <div style="display: flex; gap: 1rem; align-items: center; font-size: 0.9rem; color: #e6f4ea; font-weight: 500;">
        <span style="background-color: rgba(255,255,255,0.2); backdrop-filter: blur(4px); color: #ffffff; padding: 0.3rem 0.8rem; border-radius: 9999px; font-weight: 600; font-size: 0.75rem;">
          📁 <?= esc($article['categorie']) ?>
        </span>
        <span style="display: inline-flex; align-items: center; gap: 0.25rem;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
          <?= date('d/m/Y', strtotime($article['date_publication'])) ?>
        </span>
      </div>

    </div>
  </section>

  <!-- ================= 2. CONTENU DE L'ARTICLE ================= -->
  <section class="py-16 bg-gray-50" style="padding: 5rem 0; background-color: #f9fafb; width: 100%;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%;">
      
      <!-- Conteneur centralisé pour un confort de lecture optimal (max 800px) -->
      <div style="max-width: 800px; margin: 0 auto; background-color: #ffffff; border-radius: 1.25rem; padding: 2.5rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; box-sizing: border-box;">
        
        <!-- Zone Média Grand Format (Image ou Vidéo) -->
        <div style="width: 100%; border-radius: 1rem; overflow: hidden; margin-bottom: 2.5rem; background-color: #e5e7eb; box-shadow: inset 0 2px 4px 0 rgba(0,0,0,0.06);">
          <?php if (!empty($article['video'])): ?>
            <!-- Si l'article contient un fichier vidéo -->
            <video controls style="width: 100%; display: block; max-height: 450px; background: #000;">
              <source src="<?= base_url('uploads/actualites/videos/' . $article['video']) ?>" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de vidéos.
            </video>
          <?php elseif (!empty($article['image'])): ?>
            <!-- Si l'article contient une image -->
            <img src="<?= base_url('uploads/actualites/' . $article['image']) ?>" alt="<?= esc($article['titre']) ?>" style="width: 100%; height: auto; display: block; object-fit: cover; max-height: 450px;" />
          <?php else: ?>
            <!-- Image d'illustration par défaut si vide -->
            <img src="<?= base_url('assets/images/placeholders/actualite.jpg') ?>" alt="AVIJORO" style="width: 100%; height: auto; display: block; object-fit: cover; max-height: 400px;" />
          <?php endif; ?>
        </div>

        <!-- Texte intégral de l'article -->
        <div style="color: #374151; font-size: 1.1rem; line-height: 1.8; letter-spacing: -0.01em; text-align: justify;">
          <?= nl2br(esc($article['contenu'])) ?>
        </div>

      </div>

    </div>
  </section>

  <!-- ================= 3. BANDEAU DE PIED DE PAGE (RETOUR RAPIDE) ================= -->
  <section style="padding: 3rem 1.5rem; background-color: #ffffff; text-align: center; width: 100%; box-sizing: border-box; clear: both; border-top: 1px solid #e5e7eb;">
    <div class="container mx-auto" style="max-width: 1200px; margin: 0 auto; width: 100%;">
      <a href="<?= base_url($lang . '/actualites') ?>" style="display: inline-block; background-color: #2D8659; color: #ffffff; padding: 1rem 2.5rem; border-radius: 9999px; text-decoration: none; font-size: 0.95rem; font-weight: 600; box-shadow: 0 10px 15px -3px rgba(45,134,89,0.25); transition: all 0.2s;">
        ← Voir toutes les actualités
      </a>
    </div>
  </section>

</div>
<div style="clear: both;"></div>
