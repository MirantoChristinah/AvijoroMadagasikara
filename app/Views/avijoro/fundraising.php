<?php $lang = $lang ?? 'fr'; ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. HERO FUNDRAISING ================= -->
  <section class="hero-home-section" style="background: linear-gradient(135deg, #FF7043 0%, #F4511E 100%); padding: 5.5rem 1.5rem; text-align: center; width: 100%; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto; color: #ffffff;">
      <div style="font-size: 4rem; line-height: 1; margin-bottom: 1.5rem;">🎗️</div>
      <h1 style="font-size: 3rem; font-weight: 700; margin: 0 0 1.25rem 0; letter-spacing: -0.025em;">
        <?= lang('Texte.fr_home_titre') ?>
      </h1>
      <p style="font-size: 1.15rem; color: #ffe0d6; max-width: 46rem; margin: 0 auto 2.5rem auto; line-height: 1.7;">
        <?= lang('Texte.fr_home_desc') ?>
      </p>
    </div>
  </section>

  <!-- ================= 2. PRÉSENTATION + BOUTONS ================= -->
  <section style="padding: 5rem 1.5rem; background-color: #ffffff; width: 100%; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto;">
      <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">

        <a href="<?= base_url($lang . '/fundraising/produits') ?>" style="display: inline-flex; align-items: center; gap: 0.75rem; background-color: #2D8659; color: #ffffff; padding: 1rem 2.5rem; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 10px 15px -3px rgba(45,134,89,0.3); transition: transform 0.2s;">
          <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zm-10 0V5h4v2h-4z"/></svg>
          <?= lang('Texte.fr_btn_produits') ?>
        </a>

      </div>
    </div>
  </section>

  <!-- ================= 3. COMMENT ÇA MARCHE ================= -->
  <section style="padding: 4rem 1.5rem; background-color: #f9fafb; width: 100%; box-sizing: border-box;">
    <div style="max-width: 1100px; margin: 0 auto;">
      <div style="text-align: center; max-width: 42rem; margin: 0 auto 3.5rem auto;">
        <h2 style="font-size: 2.25rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.comment_don_titre') ?></h2>
        <p style="color: #4b5563; font-size: 1.05rem; line-height: 1.6; margin: 0;"><?= lang('Texte.comment_don_desc') ?></p>
      </div>

      <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4" style="height: 100%;">
            <div style="width: 64px; height: 64px; margin: 0 auto 1rem auto; border-radius: 9999px; background-color: #ffe8de; display: flex; align-items: center; justify-content: center; font-size: 1.75rem;">🛍️</div>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: #111827; margin-bottom: 0.75rem;"><?= lang('Texte.fundraising_produits') ?></h3>
            <p style="color: #4b5563; font-size: 0.9rem; line-height: 1.6; margin: 0;"><?= lang('Texte.produits_slogan') ?></p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4" style="height: 100%;">
            <div style="width: 64px; height: 64px; margin: 0 auto 1rem auto; border-radius: 9999px; background-color: #e8edfb; display: flex; align-items: center; justify-content: center; font-size: 1.75rem;">💬</div>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: #111827; margin-bottom: 0.75rem;">Facebook</h3>
            <p style="color: #4b5563; font-size: 0.9rem; line-height: 1.6; margin: 0;"><?= lang('Texte.contact_facebook_desc') ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. APPEL À L'ACTION FACEBOOK ================= -->
  <section style="padding: 5rem 1.5rem; background-color: #ffffff; text-align: center; width: 100%; box-sizing: border-box;">
    <div style="max-width: 800px; margin: 0 auto;">
      <div style="width: 72px; height: 72px; margin: 0 auto 1.5rem auto; border-radius: 9999px; background-color: #1877F2; display: flex; align-items: center; justify-content: center;">
        <svg width="36" height="36" viewBox="0 0 24 24" fill="#ffffff"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
      </div>
      <h2 style="font-size: 2.25rem; font-weight: 700; color: #111827; margin: 0 0 1rem 0;"><?= lang('Texte.contact_facebook_titre') ?></h2>
      <p style="color: #4b5563; font-size: 1.05rem; line-height: 1.7; margin: 0 auto 2rem auto; max-width: 36rem;"><?= lang('Texte.contact_facebook_desc') ?></p>
      <a href="<?= esc(FACEBOOK_FUNDRAISING_URL) ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 0.6rem; background-color: #1877F2; color: #ffffff; padding: 0.95rem 2.5rem; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 10px 15px -3px rgba(24,119,242,0.35); transition: transform 0.2s;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="#ffffff"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        <?= lang('Texte.fundraising_btn_facebook') ?>
      </a>
    </div>
  </section>

</div>
