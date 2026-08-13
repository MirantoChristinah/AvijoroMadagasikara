<?php $lang = $lang ?? 'fr'; ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="relative h-[400px] lg:h-[500px] overflow-hidden" style="width: 100%;">
    <div class="absolute inset-0">
      <img
        src="https://unsplash.com"
        alt="À propos d'AVIJORO"
        class="w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40" />
    </div>
    <div class="relative container mx-auto px-4 h-full flex items-center" style="max-width: 1200px; margin: 0 auto;">
      <div style="max-width: 42rem; color: #ffffff;">
        <h1 style="font-size: 3rem; font-weight: 700; margin: 0 0 1rem 0;"><?= lang('Texte.about_titre') ?></h1>
        <p style="font-size: 1.125rem; color: #e5e7eb; margin: 0; line-height: 1.6;">
          <?= lang('Texte.about_slogan') ?>
        </p>
      </div>
    </div>
  </section>

  <!-- ================= 2. NOTRE HISTOIRE ================= -->
  <section id="histoire" class="py-16 lg:py-24 bg-white" style="padding: 5rem 0; width: 100%;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto;">
      <div style="width: 100%; text-align: center; font-size: 0;">
        
        <!-- Colonne Texte -->
        <div style="display: inline-block; width: 48%; margin-right: 4%; vertical-align: middle; font-size: 1rem; text-align: left; box-sizing: border-box;">
          <h2 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 1.5rem 0;"><?= lang('Texte.histoire_titre') ?></h2>
          <div style="color: #4b5563; line-height: 1.7; font-size: 0.95rem;">
            <p style="margin: 0 0 1rem 0;"><?= lang('Texte.histoire_p1') ?></p>
            <p style="margin: 0 0 1rem 0;"><?= lang('Texte.histoire_p2') ?></p>
            <p style="margin: 0;"><?= lang('Texte.histoire_p3') ?></p>
          </div>
        </div>

        <!-- Colonne Image -->
        <div style="display: inline-block; width: 48%; vertical-align: middle; font-size: 1rem; box-sizing: border-box;">
          <img
            src="https://unsplash.com"
            alt="Histoire AVIJORO"
            style="width: 100%; h-[500px]; object-fit: cover; border-radius: 1rem; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);"
          />
        </div>

      </div>
    </div>
  </section>

   <!-- ================= SECTION : MISSION & VISION STYLE FIGMA BLANC ================= -->
  <section id="mission" class="mission-vision-section" style="padding: 5rem 0; background-color: #f9fafb; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; width: 100%; clear: both;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; box-sizing: border-box; width: 100%;">
      
      <div style="width: 100%; text-align: center; font-size: 0;">
        
        <!-- CADRE BLANC 1 : NOTRE MISSION -->
        <div style="display: inline-block; width: 48%; margin-right: 4%; vertical-align: top; font-size: 1rem; text-align: left; background: #ffffff; padding: 3rem 2.5rem; border-radius: 1.5rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.02); border: 1px solid #f3f4f6; box-sizing: border-box;">
          
          <!-- Icône Cible Verte Figma -->
          <div style="width: 56px; height: 56px; background-color: #e6f4ea; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2D8659" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <circle cx="12" cy="12" r="6"></circle>
              <circle cx="12" cy="12" r="2"></circle>
            </svg>
          </div>
          
          <h3 style="font-size: 1.75rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.mission_titre_bloc') ?></h3>
          <p style="color: #4b5563; line-height: 1.7; margin: 0; font-size: 1rem;"><?= lang('Texte.mission_texte_bloc') ?></p>
        </div>

        <!-- CADRE BLANC 2 : NOTRE VISION -->
        <div style="display: inline-block; width: 48%; vertical-align: top; font-size: 1rem; text-align: left; background: #ffffff; padding: 3rem 2.5rem; border-radius: 1.5rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.02); border: 1px solid #f3f4f6; box-sizing: border-box;">
          
          <!-- Icône Œil Bleu Figma -->
          <div style="width: 56px; height: 56px; background-color: #e3f2fd; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#1E88E5" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
          </div>
          
          <h3 style="font-size: 1.75rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.vision_titre_bloc') ?></h3>
          <p style="color: #4b5563; line-height: 1.7; margin: 0; font-size: 1rem;"><?= lang('Texte.vision_texte_bloc') ?></p>
        </div>

      </div>

    </div>
  </section>
    <!-- ================= SECTION : NOS VALEURS STYLE FIGMA FILAIRE ================= -->
  <section id="valeurs" class="values-section" style="padding: 5rem 0; background-color: #ffffff; width: 100%; clear: both;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; box-sizing: border-box; width: 100%;">
      
      <!-- En-tête de la section -->
      <div style="text-align: center; max-width: 45rem; margin: 0 auto 4rem auto;">
        <h2 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;">Nos Valeurs</h2>
        <p style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; margin: 0;">Les principes qui guident notre action au quotidien.</p>
      </div>

      <!-- Grille horizontale de 4 valeurs alignées côte à côte -->
      <div style="width: 100%; text-align: center; font-size: 0;">
        
        <!-- Valeur 1 : Solidarité -->
        <div style="display: inline-block; width: 23%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: center; box-sizing: border-box; padding: 0 1rem;">
          <!-- Icône Cœur Orange Filaire -->
          <div style="color: #FF7043; margin-bottom: 1.5rem; display: flex; justify-content: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
            </svg>
          </div>
          <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0 0 0.75rem 0;">Solidarité</h3>
          <p style="color: #4b5563; font-size: 0.9rem; line-height: 1.6; margin: 0;">Nous croyons en l'entraide et le soutien mutuel pour bâtir une communauté forte.</p>
        </div>

        <!-- Valeur 2 : Transparence -->
        <div style="display: inline-block; width: 23%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: center; box-sizing: border-box; padding: 0 1rem;">
          <!-- Icône Médaille / Badge Filaire -->
          <div style="color: #FF7043; margin-bottom: 1.5rem; display: flex; justify-content: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="8" r="6"></circle>
              <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
            </svg>
          </div>
          <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0 0 0.75rem 0;">Transparence</h3>
          <p style="color: #4b5563; font-size: 0.9rem; line-height: 1.6; margin: 0;">Nous assurons une gestion claire et responsable de toutes nos ressources.</p>
        </div>

        <!-- Valeur 3 : Respect -->
        <div style="display: inline-block; width: 23%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: center; box-sizing: border-box; padding: 0 1rem;">
          <!-- Icône Users Filaire -->
          <div style="color: #FF7043; margin-bottom: 1.5rem; display: flex; justify-content: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </div>
          <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0 0 0.75rem 0;">Respect</h3>
          <p style="color: #4b5563; font-size: 0.9rem; line-height: 1.6; margin: 0;">Nous valorisons la dignité et les droits de chaque personne.</p>
        </div>

        <!-- Valeur 4 : Innovation -->
        <div style="display: inline-block; width: 23%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: center; box-sizing: border-box; padding: 0 1rem;">
          <!-- Icône Cible Filaire -->
          <div style="color: #FF7043; margin-bottom: 1.5rem; display: flex; justify-content: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <circle cx="12" cy="12" r="6"></circle>
              <circle cx="12" cy="12" r="2"></circle>
            </svg>
          </div>
          <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0 0 0.75rem 0;">Innovation</h3>
          <p style="color: #4b5563; font-size: 0.9rem; line-height: 1.6; margin: 0;">Nous développons des solutions créatives pour des problèmes complexes.</p>
        </div>

      </div>

    </div>
  </section>


   <!-- ================= SECTION : NOTRE PARCOURS (TIMELINE VERTICALE FIGMA) ================= -->
  <section id="parcours" class="parcours-section" style="padding: 5rem 0; background-color: #ffffff; width: 100%; clear: both;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; box-sizing: border-box; width: 100%;">
      
      <!-- En-tête de la section -->
      <div style="text-align: center; max-width: 45rem; margin: 0 auto 4rem auto;">
        <h2 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;">Notre Parcours</h2>
        <p style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; margin: 0;">Les moments clés qui ont marqué l'évolution d'AVIJORO Madagascar.</p>
      </div>

      <!-- Conteneur global de la Timeline (Création de la ligne verticale verte) -->
      <div style="position: relative; max-width: 600px; margin: 0 auto; padding-left: 3rem; border-left: 4px solid #2D8659; box-sizing: border-box;">
        
        <?php 
        $parcours = [
          '2015' => "Création d'AVIJORO Madagascar",
          '2017' => "Premier projet d'accès à l'eau potable",
          '2019' => "Lancement du programme éducation",
          '2021' => "500 bénévoles rejoignent l'association",
          '2023' => "10,000 bénéficiaires atteints",
          '2025' => "Expansion dans 5 nouvelles régions"
        ];
        
        foreach($parcours as $annee => $evenement): 
        ?>
          <!-- Élément de la frise -->
          <div style="position: relative; margin-bottom: 3.5rem; text-align: left;">
            
            <!-- Le point vert calé pile sur la ligne de gauche -->
            <div style="position: absolute; width: 16px; height: 16px; background-color: #2D8659; border-radius: 50%; left: -54px; top: 6px; border: 4px solid #ffffff;"></div>
            
            <!-- Année + Icône Calendrier Figma -->
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
              <!-- Petit calendrier vert en SVG -->
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2D8659" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
              </svg>
              <!-- Année en Vert -->
              <span style="font-size: 1.35rem; font-weight: 700; color: #2D8659;"><?= $annee ?></span>
            </div>
            
            <!-- Description de l'événement -->
            <p style="color: #4b5563; font-size: 1rem; margin: 0; line-height: 1.5;"><?= $evenement ?></p>
            
          </div>
        <?php endforeach; ?>

      </div>

    </div>
  </section>

   <!-- ================= SECTION : NOTRE ÉQUIPE STYLE FIGMA AVEC BLOCS INITIALES ================= -->
  <section id="equipe" class="team-section" style="padding: 5rem 0; background-color: #ffffff; width: 100%; clear: both;">
    <div class="container mx-auto px-4" style="max-width: 1200px; margin: 0 auto; box-sizing: border-box; width: 100%;" >
      
      <!-- En-tête de la section -->
      <div style="text-align: center; max-width: 45rem; margin: 0 auto 4rem auto;">
        <h2 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;">Notre Équipe</h2>
        <p style="color: #4b5563; font-size: 1.125rem; line-height: 1.6; margin: 0;">Les personnes dévouées qui dirigent nos actions au quotidien.</p>
      </div>

      <!-- Grille horizontale de 4 blocs alignés côte à côte -->
      <div style="width: 100%; text-align: center; font-size: 0;">
        
        <?php 
        $membres = [
          [
            'initials' => 'HR',
            'bg_color' => '#2D8659', // Vert Figma
            'name'     => 'Dr. Hanta Razafindrakoto', 
            'role'     => 'Présidente', 
            'bio'      => 'Médecin de formation, passionnée par le développement communautaire.'
          ],
          [
            'initials' => 'PA',
            'bg_color' => '#1E88E5', // Bleu Figma
            'name'     => 'Pierre Andriamahefa', 
            'role'     => 'Directeur des opérations', 
            'bio'      => 'Expert en gestion de projets humanitaires avec 15 ans d\'expérience.'
          ],
          [
            'initials' => 'MR',
            'bg_color' => '#FF7043', // Orange Figma
            'name'     => 'Marie Rasoamalala', 
            'role'     => 'Responsable communication', 
            'bio'      => 'Spécialiste en communication et mobilisation communautaire.'
          ],
          [
            'initials' => 'JR',
            'bg_color' => '#2D8659', // Vert Figma
            'name'     => 'Jean Rakotomalala', 
            'role'     => 'Coordinateur terrain', 
            'bio'      => 'Connaisseur des réalités locales et médiateur communautaire.'
          ]
        ];
        
        foreach($membres as $m): 
        ?>
          <!-- Carte rectangulaire verticale figma -->
          <div style="display: inline-block; width: 23%; margin: 0 1%; vertical-align: top; font-size: 1rem; text-align: left; background: #ffffff; border-radius: 1rem; overflow: hidden; border: 1px solid #e5e7eb; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); box-sizing: border-box;">
            
            <!-- Zone supérieure colorée avec les initiales en gros -->
            <div style="background-color: <?= $m['bg_color'] ?>; height: 200px; display: flex; align-items: center; justify-content: center;">
              <span style="color: #ffffff; font-size: 4rem; font-weight: 700; font-family: system-ui, sans-serif; tracking-spacing: -0.05em;"><?= $m['initials'] ?></span>
            </div>
            
            <!-- Zone inférieure avec le texte descriptif -->
            <div style="padding: 1.5rem; min-height: 160px; display: flex; flex-direction: column;">
              <h4 style="font-size: 1.15rem; font-weight: 700; color: #111827; margin: 0 0 0.25rem 0; font-family: system-ui, sans-serif;"><?= esc($m['name']) ?></h4>
              <div style="font-size: 0.85rem; font-weight: 500; color: #9ca3af; margin-bottom: 1rem;"><?= esc($m['role']) ?></div>
              <p style="color: #4b5563; font-size: 0.875rem; line-height: 1.5; margin: 0;"><?= esc($m['bio']) ?></p>
            </div>
            
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

</div>
<!-- BALISE DE SÉCURITÉ CRITIQUE : Bloque le flux HTML pour forcer le Footer à se mettre tout en bas -->
<div style="clear: both;"></div>


