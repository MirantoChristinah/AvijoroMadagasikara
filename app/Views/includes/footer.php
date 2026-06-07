<?php $lang = $lang ?? 'fr'; ?>
<footer style="background-color: #09101d; color: #9ca3af; padding: 4.5rem 1.5rem 2rem 1.5rem; font-family: 'Inter', system-ui, sans-serif;">
  <div style="max-width: 1200px; margin: 0 auto;">
    
    <!-- Grille Principale (4 colonnes adaptatives) -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 2.5rem; margin-bottom: 4rem;">
      
      <!-- Colonne 1 : À propos -->
      <div>
        <div style="display: flex; align-items: center; gap: 0.6rem; color: #ffffff; margin-bottom: 1.25rem; font-weight: 700; font-size: 1.35rem; letter-spacing: -0.2px;">
          <!-- Icône Cœur Orange/Saumon -->
          <svg width="22" height="22" fill="#ff7043" viewBox="0 0 24 24" stroke="#ff7043" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
          </svg>
          <span>AVIJORO</span>
        </div>
        <p style="font-size: 0.9rem; line-height: 1.65; color: #9ca3af; margin: 0; font-weight: 400;">
          <?= lang('Texte.footer_description') ?? "Association humanitaire dédiée à l'amélioration des conditions de vie des communautés à Madagascar à travers l'éducation, la santé et le développement durable." ?>
        </p>
      </div>

      <!-- Colonne 2 : Liens rapides -->
      <div>
        <h3 style="color: #ffffff; font-size: 1.05rem; font-weight: 700; margin-bottom: 1.25rem; margin-top: 0; letter-spacing: -0.1px;"><?= lang('Texte.footer_liens_titre') ?? 'Liens rapides' ?></h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; display: flex; flex-direction: column; gap: 0.75rem;">
          <li><a href="<?= base_url($lang . '/qui-sommes-nous') ?>" style="color: #9ca3af; text-decoration: none; transition: color 0.2s;">À propos</a></li>
          <li><a href="<?= base_url($lang . '/projets') ?>" style="color: #9ca3af; text-decoration: none; transition: color 0.2s;">Nos projets</a></li>
          <li><a href="<?= base_url($lang . '/actualites') ?>" style="color: #9ca3af; text-decoration: none; transition: color 0.2s;">Actualités</a></li>
          <li><a href="<?= base_url($lang . '/soutenir') ?>" style="color: #9ca3af; text-decoration: none; transition: color 0.2s;">Devenez bénévole</a></li>
          <li><a href="<?= base_url($lang . '/don') ?>" style="color: #9ca3af; text-decoration: none; transition: color 0.2s;">Faire un don</a></li>
        </ul>
      </div>

            <!-- Colonne 3 : Contact (ICÔNES CORRIGÉES) -->
      <div>
        <h3 style="color: #ffffff; font-size: 1.05rem; font-weight: 700; margin-bottom: 1.25rem; margin-top: 0; letter-spacing: -0.1px;">Contact</h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; display: flex; flex-direction: column; gap: 0.85rem;">
          
          <!-- Localisation -->
          <li style="display: flex; align-items: center; gap: 0.75rem; color: #9ca3af;">
            <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span>Antananarivo, Madagascar</span>
          </li>
          
          <!-- Téléphone -->
          <li style="display: flex; align-items: center; gap: 0.75rem; color: #9ca3af;">
            <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span>+261 34 12 345 67</span>
          </li>
          
          <!-- Email -->
          <li style="display: flex; align-items: center; gap: 0.75rem; color: #9ca3af;">
            <svg xmlns="http://w3.org" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span>contact@avijoro.mg</span>
          </li>
          
        </ul>
      </div>

      <!-- Colonne 4 : Newsletter -->
      <div>
        <h3 style="color: #ffffff; font-size: 1.05rem; font-weight: 700; margin-bottom: 1rem; margin-top: 0; letter-spacing: -0.1px;"><?= lang('Texte.footer_newsletter') ?? 'Newsletter' ?></h3>
        <p style="font-size: 0.9rem; color: #9ca3af; margin-bottom: 1.25rem; line-height: 1.5;"><?= lang('Texte.newsletter_sous_titre') ?? 'Restez informé de nos actualités et projets.' ?></p>
        <form action="<?= base_url($lang . '/newsletter-sinscrire') ?>" method="post" style="display: flex; flex-direction: column; gap: 0.75rem;">
          <?= csrf_field() ?>
          <input type="email" name="email" placeholder="<?= lang('Texte.newsletter_placeholder') ?? 'Votre email' ?>" required style="width: 100%; padding: 0.75rem 1rem; border-radius: 8px; background-color: #141d2b; border: 1px solid #243247; color: #ffffff; font-size: 0.9rem; outline: none; transition: border-color 0.2s;" />
          <button type="submit" style="width: 100%; padding: 0.75rem 1rem; border-radius: 8px; background-color: #ff7043; border: none; color: #ffffff; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background-color 0.2s;"><?= lang('Texte.newsletter_bouton') ?? "S'abonner" ?></button>
        </form>
      </div>

    </div>

    <!-- Ligne de séparation intermédiaire -->
    <div style="border-top: 1px solid #141d2b; padding-top: 2rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1.5rem;">
      
      <!-- Réseaux Sociaux Cerclés Style Figma -->
      <div style="display: flex; gap: 0.75rem;">
        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; border: 1px solid #243247; display: flex; align-items: center; justify-content: center; color: #9ca3af; text-decoration: none; transition: all 0.2s;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; border: 1px solid #243247; display: flex; align-items: center; justify-content: center; color: #9ca3af; text-decoration: none; transition: all 0.2s;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg></a>
        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; border: 1px solid #243247; display: flex; align-items: center; justify-content: center; color: #9ca3af; text-decoration: none; transition: all 0.2s;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; border: 1px solid #243247; display: flex; align-items: center; justify-content: center; color: #9ca3af; text-decoration: none; transition: all 0.2s;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/></svg></a>
      </div>

      <!-- Liens légaux de droite -->
      <div style="font-size: 0.85rem; color: #6b7280; display: flex; gap: 1rem; align-items: center;">
        <a href="#" style="color: #6b7280; text-decoration: none; transition: color 0.2s;">Mentions légales</a>
        <span style="color: #243247;">|</span>
        <a href="#" style="color: #6b7280; text-decoration: none; transition: color 0.2s;">Politique de confidentialité</a>
      </div>

    </div>

    <!-- Copyright de pied de page final centré -->
    <div style="font-size: 0.8rem; color: #4b5563; text-align: center; margin-top: 3rem; border-top: 1px solid #141d2b; padding-top: 1.5rem;">
      © 2026 AVIJORO Madagascar. Tous droits réservés.
    </div>

  </div>
</footer>
