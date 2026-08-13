<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert-danger-figma" style="color: red; margin-bottom: 1rem;">
        <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="main-content-wrapper">

       <!-- ==========================================
       SECTION 1 : HERO BANNER COMPACT "REJOIGNEZ-NOUS"
       ========================================== -->
  <section class="hero-actualites-figma">
    <div class="hero-actualites-container">
      <h1><?= lang('Texte.hero_rejoignez_nous_titre') ?? 'Rejoignez-nous' ?></h1>
      <p><?= lang('Texte.hero_rejoignez_nous_desc') ?? 'Devenez bénévole et contribuez à transformer des vies à Madagascar.' ?></p>
    </div>
  </section>

   <!-- ==========================================
       SECTION 2 : POURQUOI DEVENIR BÉNÉVOLE (STRUCTURE MAQUETTE 3 COLONNES)
       ========================================== -->
  <section id="pourquoi" class="benevole-gray-section">
    <div class="home-container">
      
      <div class="mission-header-block" style="text-align: center; margin-bottom: 4rem;">
        <svg xmlns="http://w3.org" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 1.5rem auto;">
          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
          <circle cx="9" cy="7" r="4"></circle>
          <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>
        <h2 style="font-size: 2.5rem; font-weight: 700; color: #030213; margin-bottom: 1.5rem;"><?= lang('Texte.benevole_pourquoi_titre') ?></h2>
        <p style="color: #717182; font-size: 1.15rem; max-width: 750px; margin: 0 auto; line-height: 1.6;"><?= lang('Texte.benevole_pourquoi_desc') ?></p>
      </div>

      <?php
      $benefits_list = [
        lang('Texte.benefit_impact'),
        lang('Texte.benefit_competences'),
        lang('Texte.benefit_rencontres'),
        lang('Texte.benefit_projets'),
        lang('Texte.benefit_formation'),
        lang('Texte.benefit_attestation')
      ];
      ?>

      <div class="benefits-row-grid">
        <?php foreach ($benefits_list as $benefit_text): ?>
          <div class="benefit-row-card">
            <svg xmlns="http://w3.org" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <span style="color: #33334b; font-size: 1rem; font-weight: 500;"><?= esc($benefit_text) ?></span>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

     <!-- ==========================================
       SECTION 3 : OPPORTUNITÉS DE BÉNÉVOLAT (VERSION ÉMOJIS FIGMA)
       ========================================== -->
  <section id="opportunites" class="benevole-gray-section" style="background-color: #ffffff; border-top: none; padding: 5rem 0;">
    <div class="home-container">
      
      <div class="mission-header-block" style="text-align: center; margin-bottom: 4rem;">
        <h2 style="font-size: 2.75rem; font-weight: 700; color: #030213; margin-bottom: 1rem;"><?= lang('Texte.opp_titre') ?></h2>
        <p style="color: #717182; font-size: 1.15rem; max-width: 700px; margin: 0 auto; line-height: 1.5;"><?= lang('Texte.opp_desc') ?></p>
      </div>

      <?php
      $opportunities = [
        ["title" => lang('Texte.opp_education_titre'), "description" => lang('Texte.opp_education_desc'), "emoji" => "📚"],
        ["title" => lang('Texte.opp_sante_titre'), "description" => lang('Texte.opp_sante_desc'), "emoji" => "🏥"],
        ["title" => lang('Texte.opp_environnement_titre'), "description" => lang('Texte.opp_environnement_desc'), "emoji" => "🌱"],
        ["title" => lang('Texte.opp_communication_titre'), "description" => lang('Texte.opp_communication_desc'), "emoji" => "📢"],
        ["title" => lang('Texte.opp_logistique_titre'), "description" => lang('Texte.opp_logistique_desc'), "emoji" => "📦"],
        ["title" => lang('Texte.opp_administration_titre'), "description" => lang('Texte.opp_administration_desc'), "emoji" => "💼"],
      ];
      ?>
      
      <div class="benevole-grid-figma">
        <?php foreach ($opportunities as $opp): ?>
          <div class="card-benevole-figma">
            <div class="benevole-emoji-box">
              <?= $opp['emoji'] ?>
            </div>
            <h3 class="card-benevole-title"><?= esc($opp['title']) ?></h3>
            <p class="card-benevole-desc"><?= esc($opp['description']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ==========================================
       SECTION 4 : FORMULAIRE DE CANDIDATURE
       ========================================== -->
  <section id="candidature" class="benevole-gray-section" style="border-top: 1px solid var(--border);">
    <div class="home-container">
      
      <div class="form-card-container">
        <div class="mission-header-block" style="margin-bottom: 3.5rem;">
          <svg xmlns="http://w3.org" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--color-orange)" stroke-width="2" style="margin: 0 auto 1rem auto;"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg>
          <h2><?= lang('Texte.form_titre') ?></h2>
          <p style="color: #717182; font-size: 1rem;"><?= lang('Texte.form_desc') ?></p>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert-success-figma">
            <h3 style="margin-bottom: 0.5rem;"><?= lang('Texte.form_merci') ?></h3>
            <p><?= session()->getFlashdata('success') ?></p>
          </div>
        <?php endif; ?>

        <form action="<?= base_url(($lang ?? 'fr') . '/soutenir/postuler') ?>" method="post">
          <?= csrf_field() ?>

          <!-- Prénom & Nom -->
          <div class="form-grid-2col">
            <div class="form-group-figma">
              <div class="form-label-row">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <label><?= lang('Texte.form_prenom') ?> *</label>
              </div>
              <input type="text" name="firstName" class="form-input-figma" required>
            </div>
            
            <div class="form-group-figma">
              <div class="form-label-row">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <label><?= lang('Texte.form_nom') ?> *</label>
              </div>
              <input type="text" name="lastName" class="form-input-figma" required>
            </div>
          </div>

                   <!-- Email & Téléphone -->
          <div class="form-grid-2col">
            <div class="form-group-figma">
              <div class="form-label-row">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                <label><?= lang('Texte.form_email') ?> *</label>
              </div>
              <input type="email" name="email" value="<?= old('email') ?>" class="form-input-figma" required>
            </div>
            
            <div class="form-group-figma">
              <div class="form-label-row">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <label><?= lang('Texte.form_telephone') ?> *</label>
              </div>
              <input type="tel" name="phone" class="form-input-figma" required>
            </div>
          </div>

          <!-- Disponibilité -->
          <div class="form-group-figma" style="margin-top: 1.5rem;">
            <div class="form-label-row">
              <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              <label><?= lang('Texte.form_disponibilite') ?> *</label>
            </div>
            <select name="availability" class="form-input-figma" required>
              <option value="" disabled selected><?= lang('Texte.form_dispo_selectionnez') ?></option>
              <option value="plein_temps"><?= lang('Texte.form_dispo_plein_temps') ?></option>
              <option value="partiel_semaine"><?= lang('Texte.form_dispo_partiel') ?></option>
              <option value="weekend"><?= lang('Texte.form_dispo_weekend') ?></option>
              <option value="soiree"><?= lang('Texte.form_dispo_soiree') ?></option>
              <option value="ponctuel"><?= lang('Texte.form_dispo_ponctuel') ?></option>
            </select>
          </div>

          <!-- Compétences -->
          <div class="form-group-figma" style="margin-top: 1.5rem;">
            <div class="form-label-row">
              <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              <label><?= lang('Texte.form_competences') ?></label>
            </div>
            <input type="text" name="skills" placeholder="<?= lang('Texte.form_competences_placeholder') ?>" class="form-input-figma">
          </div>

          <!-- Motivation -->
          <div class="form-group-figma" style="margin-top: 1.5rem;">
            <div class="form-label-row">
              <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              <label><?= lang('Texte.form_motivation') ?> *</label>
            </div>
            <textarea name="motivation" class="form-input-figma" placeholder="<?= lang('Texte.form_motivation_placeholder') ?>" required></textarea>
          </div>

          <!-- Bouton d'envoi orange large (Style Pilule Figma) -->
          <div style="text-align: center; margin-top: 2.5rem;">
            <button type="submit" class="btn-submit-orange">
              <?= lang('Texte.form_bouton_envoyer') ?>
            </button>
          </div>
        </form>
      </div>

    </div>
  </section>
</div>
