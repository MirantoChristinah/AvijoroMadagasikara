<div class="main-content-wrapper">

  <!-- ==========================================
       SECTION 1 : HERO BANNER COMPACT
       ========================================== -->
  <section class="hero-home-section" style="background: linear-gradient(to right, #1b8a4f, #1a7bb9); padding: 5rem 0; text-align: center;">
    <div class="home-container">
      <div style="max-width: 800px; margin: 0 auto; color: #ffffff;">
        <div style="margin-bottom: 1rem;">
          <svg xmlns="http://w3.org" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        </div>
        <h1 style="font-size: 3.5rem; font-weight: 700; margin: 0 0 1rem 0;">Contactez-nous</h1>
        <p style="font-size: 1.15rem; opacity: 0.9;">Nous sommes à votre écoute. N'hésitez pas à nous contacter pour toute question ou suggestion.</p>
      </div>
    </div>
  </section>

  <!-- ==========================================
       SECTION 2 : FORMULAIRE ET COORDONNÉES
       ========================================== -->
  <section style="background-color: #ffffff; border-bottom: 1px solid #eef0f2;">
    <div class="home-container">
      <div class="contact-main-grid">
        
        <!-- GAUCHE : COORDONNÉES -->
        <div class="contact-sidebar">
          <h2 class="contact-info-title">Nos coordonnées</h2>
          
          <div class="contact-info-list">
            <div class="contact-info-item">
              <div class="contact-icon-circle">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              </div>
              <div class="contact-text-block">
                <h4>Adresse</h4>
                <p>Antananarivo, Madagascar<br>BP 12345</p>
              </div>
            </div>

            <div class="contact-info-item">
              <div class="contact-icon-circle">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              </div>
              <div class="contact-text-block">
                <h4>Téléphone</h4>
                <p>+261 34 12 345 67<br>+261 33 98 765 43</p>
              </div>
            </div>

            <div class="contact-info-item">
              <div class="contact-icon-circle">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </div>
              <div class="contact-text-block">
                <h4>Email</h4>
                <p>contact@avijoro.mg<br>info@avijoro.mg</p>
              </div>
            </div>

            <div class="contact-info-item">
              <div class="contact-icon-circle">
                <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              </div>
              <div class="contact-text-block">
                <h4>Horaires</h4>
                <p>Lun - Ven : 8h00 - 17h00<br>Sam : 8h00 - 12h00</p>
              </div>
            </div>
          </div>
        </div>

        <!-- DROITE : FORMULAIRE ET FOOTER DE GRILLE -->
        <div class="contact-content">
          <h2 class="contact-form-title">Envoyez-nous un message</h2>
          
          <form action="<?= base_url($lang . '/contact/envoyer') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="contact-form-grid">
              <div class="contact-form-group">
                <label>Nom complet *</label>
                <input type="text" name="name" class="contact-input-figma" required>
              </div>

              <div class="contact-form-group">
                <label>Email *</label>
                <input type="email" name="email" class="contact-input-figma" required>
              </div>

              <div class="contact-form-group">
                <label>Téléphone</label>
                <input type="tel" name="phone" class="contact-input-figma">
              </div>

              <div class="contact-form-group">
                <label>Sujet *</label>
                <select name="subject" class="contact-input-figma" style="appearance: none; background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://w3.org\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%234b5563\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><polyline points=\'6 9 12 15 18 9\'></polyline></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;" required>
                  <option value="" disabled selected>Sélectionnez un sujet</option>
                  <option value="partenariat">Devenir partenaire</option>
                  <option value="benevolat">Question sur le bénévolat</option>
                  <option value="autre">Autre demande</option>
                </select>
              </div>

              <div class="contact-form-group full-width">
                <label>Message *</label>
                <textarea name="message" class="contact-input-figma" rows="5" placeholder="Décrivez votre demande..." style="resize: vertical;" required></textarea>
              </div>
            </div>

            <!-- RANGÉE INFÉRIEURE : SUIVEZ-NOUS ET BOUTON ENVOYER CENTRÉ -->
            <div class="contact-footer-row">
              
              <!-- Réseaux Sociaux (Suivez-nous) -->
              <div class="contact-social-block">
                <h4>Suivez-nous</h4>
                <div class="contact-social-icons">
                  <a href="#" class="contact-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                  <a href="#" class="contact-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg></a>
                  <a href="#" class="contact-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
                  <a href="#" class="contact-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/></svg></a>
                </div>
              </div>

              <!-- Bouton de soumission avec icône d'envoi -->
              <button type="submit" class="btn-submit-contact">
                <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                <span>Envoyer le message</span>
              </button>

            </div>

          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- ==========================================
       SECTION 3 : NOUS TROUVER (CARTE GOOGLE MAPS)
       ========================================== -->
  <section class="contact-map-section">
    <div class="home-container">
      <h2 class="contact-map-title">Nous trouver</h2>
      
      <div class="contact-map-wrapper">
        <!-- Remplacer l'adresse d'exemple par votre iframe Google Maps réelle de l'association -->
        <iframe 
          src="https://google.com...!" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </section>

</div>
