<?php 
$est_en_cours = (strtolower($project['status']) === 'en cours');
$badge_bg     = $est_en_cours ? '#3b82f6' : '#10b981';
?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. BANNIÈRE DU PROJET (PLEINE LARGEUR) ================= -->
  <section class="bg-gradient-to-br from-[#2D8659] to-[#1E88E5]" style="background: linear-gradient(135deg, #2D8659 0%, #1E88E5 100%); color: #ffffff; padding: 4rem 0; width: 100%; display: block; clear: both; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%;">
      
      <!-- Bouton Retour -->
      <div style="margin-bottom: 1.5rem; text-align: left;">
        <a href="<?= base_url($lang . '/projects') ?>" style="color: #e6f4ea; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem; background-color: rgba(255,255,255,0.1); padding: 0.5rem 1.25rem; border-radius: 9999px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          Retour aux projets
        </a>
      </div>

      <!-- Titre du projet -->
      <h1 style="font-size: 2.5rem; font-weight: 700; margin: 0 0 1.5rem 0; letter-spacing: -0.025em; color: #ffffff; line-height: 1.3; text-align: left;">
        <?= esc($project['title']) ?>
      </h1>

      <!-- Badges Catégorie et Statut (Identiques à votre grille) -->
      <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;">
        <span style="background-color: rgba(255,255,255,0.9); padding: 0.3rem 0.8rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; color: #111827;">
          <?= esc($project['category']) ?>
        </span>
        <span style="background-color: <?= $badge_bg ?>; color: #ffffff; padding: 0.3rem 0.8rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">
          <?php if ($est_en_cours): ?>
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          <?php else: ?>
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
          <?php endif; ?>
          <span><?= $est_en_cours ? lang('Texte.project_statut_cours') : lang('Texte.project_statut_termine') ?></span>
        </span>
      </div>

    </div>
  </section>

  <!-- ================= 2. CONTENU PRINCIPAL & COLONNE LATÉRALE ================= -->
  <section class="py-16 bg-gray-50" style="padding: 5rem 0; background-color: #f9fafb; width: 100%;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%; display: flex; gap: 2.5rem; flex-wrap: wrap;">
      
      <!-- Bloc de gauche : Image et Description (Largeur 65%) -->
      <div style="flex: 2; min-width: 350px;">
        <div style="background-color: #ffffff; border-radius: 1.25rem; padding: 2.5rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; box-sizing: border-box;">
          
          <!-- Image du projet -->
          <div style="width: 100%; border-radius: 1rem; overflow: hidden; margin-bottom: 2.5rem; background-color: #e5e7eb;">
            <img src="<?= $project['image_url'] ?>" alt="<?= esc($project['title']) ?>" style="width: 100%; height: auto; display: block; object-fit: cover; max-height: 450px;" />
          </div>

          <!-- Description textuelle complète -->
          <h2 style="font-size: 1.5rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;">Présentation du projet</h2>
          <div style="color: #4b5563; font-size: 1.1rem; line-height: 1.8; text-align: justify;">
            <?= nl2br(esc($project['description'])) ?>
          </div>

        </div>
      </div>

      <!-- Bloc de droite : Fiche Technique & Widgets (Largeur 30%) -->
      <div style="flex: 1; min-width: 280px;">
        <div style="background-color: #ffffff; border-radius: 1.25rem; padding: 2rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; box-sizing: border-box; position: sticky; top: 2rem;">
          
          <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0 0 1.5rem 0; border-bottom: 2px solid #f3f4f6; padding-bottom: 0.5rem;">Fiche technique</h3>

          <!-- Barre de progression conditionnelle si EN COURS -->
          <?php if ($est_en_cours): ?>
            <div style="margin-bottom: 1.5rem;">
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">
                <span style="color: #6b7280; font-weight: 500;">Progression</span>
                <span style="color: #2D8659;"><?= $project['progress'] ?>%</span>
              </div>
              <div style="width: 100%; background-color: #e5e7eb; height: 8px; border-radius: 9999px; overflow: hidden;">
                <div style="background-color: #2D8659; height: 100%; width: <?= $project['progress'] ?>%; border-radius: 9999px;"></div>
              </div>
            </div>
          <?php endif; ?>

          <!-- Informations Métadonnées -->
          <div style="font-size: 0.95rem; color: #374151; padding: 0.75rem 0; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between;">
            <span style="color: #6b7280;">Bénéficiaires :</span>
            <span style="font-weight: 700;"><?= number_format($project['beneficiaries'] ?? 1500) ?></span>
          </div>
          
          <div style="font-size: 0.95rem; color: #374151; padding: 0.75rem 0; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between;">
            <span style="color: #6b7280;">Localisation :</span>
            <span style="font-weight: 600; color: #111827;"><?= esc($project['location'] ?? 'Madagascar') ?></span>
          </div>

          <div style="font-size: 0.95rem; color: #374151; padding: 0.75rem 0; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between;">
            <span style="color: #6b7280;">Date de début :</span>
            <span style="font-weight: 500; color: #111827;"><?= !empty($project['date_debut']) ? date('d/m/Y', strtotime($project['date_debut'])) : 'Non définie' ?></span>
          </div>

          <div style="font-size: 0.95rem; color: #374151; padding: 0.75rem 0; margin-bottom: 2rem; display: flex; justify-content: space-between;">
            <span style="color: #6b7280;">Date de fin :</span>
            <span style="font-weight: 500; color: #111827;"><?= !empty($project['date_fin']) ? date('d/m/Y', strtotime($project['date_fin'])) : 'En cours' ?></span>
          </div>

          <!-- Lien Drive Document Optionnel -->
          <?php if (!empty($project['document_drive_link'])): ?>
            <div style="margin-top: 1.5rem;">
              <a href="<?= esc($project['document_drive_link']) ?>" target="_blank" style="display: block; text-align: center; background-color: #f3f4f6; color: #374151; padding: 0.8rem; border-radius: 0.5rem; text-decoration: none; font-size: 0.9rem; font-weight: 600; border: 1px solid #d1d5db; transition: background 0.2s;">
                📄 Consulter le document officiel
              </a>
            </div>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </section>

</div>
<div style="clear: both;"></div>
