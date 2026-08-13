<?php $lang = $lang ?? 'fr'; ?>
<footer class="avijoro-footer">
  <div class="container">
    
    <!-- Grille Principale (4 colonnes adaptatives) -->
    <div class="row g-4 g-lg-5 footer-grid">
      
      <!-- Colonne 1 : À propos -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="footer-brand-title">
          <svg width="22" height="22" fill="#ff7043" viewBox="0 0 24 24" stroke="#ff7043" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
          </svg>
          <span>AVIJORO</span>
        </div>
        <p class="footer-description">
          <?= lang('Texte.footer_description') ?? "Association humanitaire dédiée à l'amélioration des conditions de vie des communautés à Madagascar à travers l'éducation, la santé et le développement durable." ?>
        </p>
      </div>

      <!-- Colonne 2 : Liens rapides -->
      <div class="col-12 col-md-6 col-lg-3">
        <h3 class="footer-col-title"><?= lang('Texte.footer_liens_titre') ?? 'Liens rapides' ?></h3>
        <ul class="footer-col-links">
          <li><a href="<?= base_url($lang . '/qui-sommes-nous') ?>"><?= lang('Texte.Apropos') ?></a></li>
          <li><a href="<?= base_url($lang . '/projects') ?>"><?= lang('Texte.Projets') ?></a></li>
          <li><a href="<?= base_url($lang . '/actualites') ?>"><?= lang('Texte.Actualite') ?></a></li>
          <li><a href="<?= base_url($lang . '/soutenir') ?>"><?= lang('Texte.joindre') ?></a></li>
          <li><a href="<?= base_url($lang . '/media') ?>"><?= lang('Texte.Media') ?></a></li>
          <li><a href="<?= base_url($lang . '/fundraising') ?>"><?= lang('Texte.footer_fundraising') ?></a></li>
        </ul>
      </div>

      <!-- Colonne 3 : Contact -->
      <div class="col-12 col-md-6 col-lg-3">
        <h3 class="footer-col-title"><?= lang('Texte.Contact') ?></h3>
        <ul class="footer-col-contact">
          <li>
            <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            <span>Antananarivo, Madagascar</span>
          </li>
          <li>
            <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            <span>+261 34 12 345 67</span>
          </li>
          <li>
            <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            <span>contact@avijoro.mg</span>
          </li>
        </ul>
      </div>

      <!-- Colonne 4 : Newsletter -->
      <div class="col-12 col-md-6 col-lg-3">
        <h3 class="footer-col-title"><?= lang('Texte.newsletter') ?? 'Newsletter' ?></h3>
        <p class="footer-newsletter-text"><?= lang('Texte.newsletter_sous_titre') ?? 'Restez informé de nos actualités et projets.' ?></p>
        <form action="<?= base_url($lang . '/newsletter/inscription') ?>" method="post">
          <?= csrf_field() ?>
          <input type="email" name="email" placeholder="<?= lang('Texte.newsletter_placeholder') ?? 'Votre email' ?>" required class="footer-newsletter-input" />
          <button type="submit" class="footer-newsletter-btn"><?= lang('Texte.newsletter_bouton') ?? "S'abonner" ?></button>
        </form>
      </div>

    </div>

    <!-- Ligne de séparation intermédiaire -->
    <div class="footer-mid d-flex flex-wrap justify-content-between align-items-center gap-4">
      
      <!-- Réseaux Sociaux Cerclés Style Figma -->
      <div class="d-flex gap-2">
        <a href="<?= esc(FACEBOOK_FUNDRAISING_URL) ?>" target="_blank" rel="noopener" class="footer-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
        <a href="#" class="footer-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg></a>
        <a href="#" class="footer-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
        <a href="#" class="footer-social-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/></svg></a>
      </div>

      <!-- Liens légaux de droite -->
      <div class="footer-legal">
        <a href="#"><?= lang('Texte.mentions_legales') ?></a>
        <span>|</span>
        <a href="#"><?= lang('Texte.politique_confidentialite') ?></a>
      </div>

    </div>

    <!-- Copyright de pied de page final centré -->
    <div class="footer-copyright">
      © 2026 AVIJORO Madagascar. <?= lang('Texte.tous_droits_reserves') ?>.
    </div>

  </div>
</footer>

</body>
</html>
