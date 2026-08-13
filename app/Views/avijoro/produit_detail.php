<?php $lang = $lang ?? 'fr'; $produit = $produit ?? []; ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. FIL D'ARIANE ================= -->
  <section style="padding: 2rem 1.5rem 0; background-color: #ffffff; width: 100%; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto;">
      <a href="<?= base_url($lang . '/fundraising/produits') ?>" style="color: #FF7043; text-decoration: none; font-size: 0.9rem; font-weight: 600;">← <?= lang('Texte.produits_retour') ?></a>
    </div>
  </section>

  <!-- ================= 2. DÉTAIL PRODUIT ================= -->
  <section style="padding: 2.5rem 1.5rem 4rem; background-color: #ffffff; width: 100%; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto;">
      <div class="row g-5 align-items-center">

        <!-- Image -->
        <div class="col-12 col-lg-6">
          <div style="position: relative; border-radius: 1.5rem; overflow: hidden; background-color: #f3f4f6; height: 420px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
            <?php if (!empty($produit['image']) && file_exists(FCPATH . 'uploads/images/' . $produit['image'])): ?>
              <img src="<?= base_url('uploads/images/' . esc($produit['image'])) ?>" alt="<?= esc($produit['nom']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
            <?php else: ?>
              <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 6rem;">🎁</div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Infos -->
        <div class="col-12 col-lg-6">
          <?php if (!empty($produit['categorie'])): ?>
            <span style="display: inline-block; background-color: #fef3e7; color: #F4511E; padding: 0.3rem 0.9rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; margin-bottom: 1rem;">
              <?= lang('Texte.produits_categorie') ?> : <?= esc($produit['categorie']) ?>
            </span>
          <?php endif; ?>

          <h1 style="font-size: 2.5rem; font-weight: 700; color: #111827; margin: 0 0 0.75rem 0;"><?= esc($produit['nom']) ?></h1>

          <div style="font-size: 2rem; font-weight: 700; color: #FF7043; margin-bottom: 1.25rem;"><?= number_format((int) $produit['prix'], 0, ',', ' ') ?> Ar</div>

          <p style="color: #4b5563; font-size: 1.05rem; line-height: 1.8; margin: 0 0 1.5rem 0;"><?= esc($produit['description']) ?></p>

          <!-- Fiche technique -->
          <div style="background-color: #f9fafb; border: 1px solid #f3f4f6; border-radius: 1rem; padding: 1.5rem; margin-bottom: 1.75rem;">
            <?php if (!empty($produit['tailles'])): ?>
              <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #eef0f2;">
                <span style="color: #6b7280; font-size: 0.9rem;"><?= lang('Texte.produits_tailles') ?></span>
                <span style="color: #111827; font-weight: 600; font-size: 0.9rem;"><?= esc($produit['tailles']) ?></span>
              </div>
            <?php endif; ?>
            <?php if (!empty($produit['couleurs'])): ?>
              <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #eef0f2;">
                <span style="color: #6b7280; font-size: 0.9rem;"><?= lang('Texte.produits_couleurs') ?></span>
                <span style="color: #111827; font-weight: 600; font-size: 0.9rem;"><?= esc($produit['couleurs']) ?></span>
              </div>
            <?php endif; ?>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
              <span style="color: #6b7280; font-size: 0.9rem;"><?= lang('Texte.produits_disponible') ?></span>
              <span style="color: #2D8659; font-weight: 700; font-size: 0.9rem;">✓ <?= lang('Texte.produits_disponible') ?></span>
            </div>
          </div>

          <!-- COMMANDER -->
          <a href="<?= esc(FACEBOOK_FUNDRAISING_URL) ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 0.6rem; background-color: #FF7043; color: #ffffff; padding: 1rem 2.5rem; border-radius: 9999px; text-decoration: none; font-weight: 700; font-size: 1rem; letter-spacing: 0.03em; box-shadow: 0 10px 15px -3px rgba(255,112,67,0.35); transition: transform 0.2s;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#ffffff"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            <?= lang('Texte.produits_commander') ?>
          </a>
          <p style="color: #6b7280; font-size: 0.85rem; margin: 0.9rem 0 0 0;"><?= lang('Texte.produits_facebook') ?></p>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= 3. CTA FACEBOOK ================= -->
  <section style="padding: 4rem 1.5rem; background-color: #f9fafb; text-align: center; width: 100%; box-sizing: border-box;">
    <div style="max-width: 700px; margin: 0 auto;">
      <h2 style="font-size: 1.75rem; font-weight: 700; color: #111827; margin: 0 0 0.9rem 0;"><?= lang('Texte.contact_facebook_titre') ?></h2>
      <p style="color: #4b5563; font-size: 1rem; line-height: 1.7; margin: 0 auto 1.75rem auto; max-width: 32rem;"><?= lang('Texte.produits_facebook') ?></p>
      <a href="<?= esc(FACEBOOK_FUNDRAISING_URL) ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 0.6rem; background-color: #1877F2; color: #ffffff; padding: 0.9rem 2.25rem; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 10px 15px -3px rgba(24,119,242,0.35);">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="#ffffff"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        <?= lang('Texte.fundraising_btn_facebook') ?>
      </a>
    </div>
  </section>

</div>
