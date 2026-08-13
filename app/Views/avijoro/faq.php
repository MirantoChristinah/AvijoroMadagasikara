<div class="main-content-wrapper">

  <!-- ================= HERO BANNER COMPACT (STYLE FIGMA / BOOTSTRAP) ================= -->
  <section class="hero-actualites-figma">
    <div class="hero-actualites-container">
      <div class="display-1 mb-3" style="line-height: 1;">❓</div>
      <h1><?= lang('Texte.faq_titre') ?></h1>
      <p><?= lang('Texte.faq_slogan') ?></p>
    </div>
  </section>

  <!-- ================= LISTE DES QUESTIONS (ACCORDÉON BOOTSTRAP) ================= -->
  <section class="faq-section py-5 bg-white">
    <div class="container" style="max-width: 850px;">

      <!-- Categorie 1 : Général -->
      <div id="general" class="mb-5">
        <h2 class="h2 fw-bold text-dark mb-4"><?= lang('Texte.faq_cat_general') ?></h2>

        <div class="accordion shadow-sm rounded-3 overflow-hidden border border-light-subtle" id="accordionGeneral">
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ1" aria-expanded="true" aria-controls="faqQ1">
                <?= lang('Texte.faq_q1') ?>
              </button>
            </h3>
            <div id="faqQ1" class="accordion-collapse collapse show" data-bs-parent="#accordionGeneral">
              <div class="accordion-body"><?= lang('Texte.faq_a1') ?></div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ2" aria-expanded="false" aria-controls="faqQ2">
                <?= lang('Texte.faq_q2') ?>
              </button>
            </h3>
            <div id="faqQ2" class="accordion-collapse collapse" data-bs-parent="#accordionGeneral">
              <div class="accordion-body"><?= lang('Texte.faq_a2') ?></div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ3" aria-expanded="false" aria-controls="faqQ3">
                <?= lang('Texte.faq_q3') ?>
              </button>
            </h3>
            <div id="faqQ3" class="accordion-collapse collapse" data-bs-parent="#accordionGeneral">
              <div class="accordion-body"><?= lang('Texte.faq_a3') ?></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Categorie 2 : Bénévolat -->
      <div id="benevolat" class="mb-5">
        <h2 class="h2 fw-bold text-dark mb-4"><?= lang('Texte.faq_cat_benevolat') ?></h2>

        <div class="accordion shadow-sm rounded-3 overflow-hidden border border-light-subtle" id="accordionBenevolat">
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ4" aria-expanded="true" aria-controls="faqQ4">
                <?= lang('Texte.faq_q4') ?>
              </button>
            </h3>
            <div id="faqQ4" class="accordion-collapse collapse show" data-bs-parent="#accordionBenevolat">
              <div class="accordion-body"><?= lang('Texte.faq_a4') ?></div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ5" aria-expanded="false" aria-controls="faqQ5">
                <?= lang('Texte.faq_q5') ?>
              </button>
            </h3>
            <div id="faqQ5" class="accordion-collapse collapse" data-bs-parent="#accordionBenevolat">
              <div class="accordion-body"><?= lang('Texte.faq_a5') ?></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Categorie 3 : Dons -->
      <div id="dons">
        <h2 class="h2 fw-bold text-dark mb-4"><?= lang('Texte.faq_cat_dons') ?></h2>

        <div class="accordion shadow-sm rounded-3 overflow-hidden border border-light-subtle" id="accordionDons">
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ6" aria-expanded="true" aria-controls="faqQ6">
                <?= lang('Texte.faq_q6') ?>
              </button>
            </h3>
            <div id="faqQ6" class="accordion-collapse collapse show" data-bs-parent="#accordionDons">
              <div class="accordion-body"><?= lang('Texte.faq_a6') ?></div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqQ7" aria-expanded="false" aria-controls="faqQ7">
                <?= lang('Texte.faq_q7') ?>
              </button>
            </h3>
            <div id="faqQ7" class="accordion-collapse collapse" data-bs-parent="#accordionDons">
              <div class="accordion-body"><?= lang('Texte.faq_a7') ?></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

</div>
