<?php $lang = $lang ?? 'fr'; ?>
<div class="main-content-wrapper" style="background-color: #ffffff; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both;">

  <!-- ================= 1. HERO ================= -->
  <section style="background: linear-gradient(135deg, #FF7043 0%, #F4511E 100%); padding: 4.5rem 1.5rem; text-align: center; width: 100%; box-sizing: border-box;">
    <div style="max-width: 900px; margin: 0 auto; color: #ffffff;">
      <div style="font-size: 3rem; line-height: 1; margin-bottom: 1rem;">🛍️</div>
      <h1 style="font-size: 2.75rem; font-weight: 700; margin: 0 0 1rem 0;"><?= lang('Texte.produits_titre') ?></h1>
      <p style="font-size: 1.1rem; color: #ffe0d6; max-width: 38rem; margin: 0 auto; line-height: 1.7;"><?= lang('Texte.produits_slogan') ?></p>
    </div>
  </section>

  <!-- ================= 2. GRILLE PRODUITS ================= -->
  <section style="padding: 5rem 1.5rem; background-color: #ffffff; width: 100%; box-sizing: border-box;">
    <div style="max-width: 1200px; margin: 0 auto;">

      <?php if (!empty($produits) && is_array($produits)): ?>

        <div class="row g-4">

          <?php foreach ($produits as $produit): ?>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <!-- Image ou placeholder -->
                <a href="<?= base_url($lang . '/fundraising/produit/' . $produit['id']) ?>" style="display: block; position: relative; height: 240px; background-color: #f3f4f6; text-decoration: none;">
                  <?php if (!empty($produit['image']) && file_exists(FCPATH . 'uploads/images/' . $produit['image'])): ?>
                    <img src="<?= base_url('uploads/images/' . esc($produit['image'])) ?>" alt="<?= esc($produit['nom']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                  <?php else: ?>
                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 4rem;">🎁</div>
                  <?php endif; ?>
                  <?php if (!empty($produit['categorie'])): ?>
                    <span style="position: absolute; top: 1rem; right: 1rem; background-color: rgba(255,255,255,0.92); padding: 0.3rem 0.8rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; color: #374151;">
                      <?= esc($produit['categorie']) ?>
                    </span>
                  <?php endif; ?>
                </a>

                <!-- Contenu -->
                <div style="padding: 1.5rem;">
                  <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 0.75rem; margin-bottom: 0.75rem;">
                    <h3 style="font-size: 1.2rem; font-weight: 700; color: #111827; margin: 0;">
                      <a href="<?= base_url($lang . '/fundraising/produit/' . $produit['id']) ?>" style="text-decoration: none; color: inherit;"><?= esc($produit['nom']) ?></a>
                    </h3>
                    <span style="font-size: 1.15rem; font-weight: 700; color: #FF7043; white-space: nowrap;"><?= number_format((int) $produit['prix'], 0, ',', ' ') ?> Ar</span>
                  </div>

                  <p style="color: #4b5563; font-size: 0.875rem; line-height: 1.6; margin: 0 0 1.25rem 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    <?= esc($produit['description']) ?>
                  </p>

                  <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    <a href="<?= esc(FACEBOOK_FUNDRAISING_URL) ?>" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 0.4rem; background-color: #FF7043; color: #ffffff; padding: 0.6rem 1.4rem; border-radius: 9999px; text-decoration: none; font-size: 0.85rem; font-weight: 700; letter-spacing: 0.02em;">
                      <?= lang('Texte.produits_commander') ?>
                    </a>
                    <a href="<?= base_url($lang . '/fundraising/produit/' . $produit['id']) ?>" style="display: inline-flex; align-items: center; gap: 0.4rem; border: 1px solid #e5e7eb; color: #374151; padding: 0.6rem 1.4rem; border-radius: 9999px; text-decoration: none; font-size: 0.85rem; font-weight: 600;">
                      <?= lang('Texte.news_lire_suite') ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

      <?php else: ?>
        <p style="text-align: center; font-size: 1.125rem; color: #6b7280;"><?= lang('Texte.produits_aucun') ?></p>
      <?php endif; ?>

    </div>
  </section>

</div>
