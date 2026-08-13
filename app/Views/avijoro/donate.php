<div class="main-content-wrapper">

  <!-- ================= HERO (DÉGRADÉ ORANGE) ================= -->
  <section class="don-hero" style="background: linear-gradient(135deg, #FF7043, #F4511E); padding: 5rem 0; text-align: center; width: 100%;">
    <div class="hero-actualites-container">
      <div class="display-1 mb-3" style="line-height: 1;">❤️</div>
      <h1><?= lang('Texte.soutenir_titre') ?></h1>
      <p><?= lang('Texte.soutenir_slogan') ?></p>
    </div>
  </section>

  <!-- ================= MÉTHODES DE DONS ================= -->
  <section class="py-5 bg-white">
    <div class="container">

      <div class="text-center mb-5">
        <h2 class="h1 fw-bold text-dark mb-3"><?= lang('Texte.comment_don_titre') ?></h2>
        <p class="text-secondary mx-auto" style="max-width: 42rem;"><?= lang('Texte.comment_don_desc') ?></p>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

        <!-- Méthode 1 : Mobile Money -->
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body text-center text-white" style="background: linear-gradient(135deg, #FF7043, #F4511E);">
              <div class="display-5 mb-2">📱</div>
              <h3 class="h5 fw-bold mb-0">Mobile Money</h3>
            </div>
            <div class="card-body text-center">
              <p class="text-secondary small mb-3">MVola, Orange Money, Airtel Money</p>
              <span class="d-inline-block bg-light text-dark rounded-3 px-3 py-2 small fw-semibold">+261 34 12 345 67</span>
            </div>
          </div>
        </div>

        <!-- Méthode 2 : Virement Bancaire -->
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body text-center text-white" style="background: linear-gradient(135deg, #1E88E5, #283593);">
              <div class="display-5 mb-2">💳</div>
              <h3 class="h5 fw-bold mb-0"><?= lang('Texte.don_banque_titre') ?></h3>
            </div>
            <div class="card-body text-center">
              <p class="text-secondary small mb-3">BOA Madagascar</p>
              <span class="d-inline-block bg-light text-dark rounded-3 px-3 py-2 small fw-semibold user-select-all">IBAN: MG12 3456 7890 1234 5678 90</span>
            </div>
          </div>
        </div>

        <!-- Méthode 3 : QR Code -->
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body text-center text-white" style="background: linear-gradient(135deg, #2D8659, #0f766e);">
              <div class="display-5 mb-2">🔳</div>
              <h3 class="h5 fw-bold mb-0">QR Code</h3>
            </div>
            <div class="card-body text-center">
              <p class="text-secondary small mb-3"><?= lang('Texte.don_qr_desc') ?></p>
              <span class="d-inline-block bg-light text-dark rounded-3 px-3 py-2 small fw-semibold"><?= lang('Texte.don_qr_details') ?></span>
            </div>
          </div>
        </div>

        <!-- Méthode 4 : Facebook don -->
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body text-center text-white" style="background: linear-gradient(135deg, #1877F2, #0a4aa8);">
              <div class="display-5 mb-2">👥</div>
              <h3 class="h5 fw-bold mb-0">Facebook</h3>
            </div>
            <div class="card-body text-center">
              <p class="text-secondary small mb-3"><?= lang('Texte.don_fb_desc') ?></p>
              <a href="https://facebook.com" target="_blank" class="d-inline-block bg-primary-subtle text-primary rounded-3 px-3 py-2 small fw-semibold text-decoration-none">facebook.com/avijoro</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================= ÉCHELLES D'IMPACT ================= -->
  <section class="py-5" style="background-color: #f9fafb;">
    <div class="container">
      <div class="text-center mb-5">
        <div class="display-5 mb-3" style="color: #2D8659;">📈</div>
        <h2 class="h1 fw-bold text-dark mb-3"><?= lang('Texte.impact_don_titre') ?></h2>
        <p class="text-secondary mx-auto" style="max-width: 42rem;"><?= lang('Texte.impact_don_desc') ?></p>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" style="max-width: 1000px; margin-inline: auto;">
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4">
            <div class="display-5 mb-3">📚</div>
            <div class="h4 fw-bold mb-2" style="color: #FF7043;">10,000 Ar</div>
            <p class="text-secondary small mb-0"><?= lang('Texte.impact_1') ?></p>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4">
            <div class="display-5 mb-3">🏥</div>
            <div class="h4 fw-bold mb-2" style="color: #FF7043;">50,000 Ar</div>
            <p class="text-secondary small mb-0"><?= lang('Texte.impact_2') ?></p>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4">
            <div class="display-5 mb-3">🌳</div>
            <div class="h4 fw-bold mb-2" style="color: #FF7043;">100,000 Ar</div>
            <p class="text-secondary small mb-0"><?= lang('Texte.impact_3') ?></p>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4">
            <div class="display-5 mb-3">💧</div>
            <div class="h4 fw-bold mb-2" style="color: #FF7043;">500,000 Ar</div>
            <p class="text-secondary small mb-0"><?= lang('Texte.impact_4') ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TRANSPARENCE FINANCIÈRE ================= -->
  <section class="py-5 bg-white">
    <div class="container" style="max-width: 800px;">
      <div class="text-center mb-5">
        <div class="display-5 mb-3" style="color: #1E88E5;">🛡️</div>
        <h2 class="h1 fw-bold text-dark mb-3"><?= lang('Texte.transparence_titre') ?></h2>
        <p class="text-secondary mx-auto" style="max-width: 42rem;"><?= lang('Texte.transparence_desc') ?></p>
      </div>

      <div class="bg-light rounded-4 p-4 p-lg-5">
        <h3 class="h4 fw-bold text-center text-dark mb-4"><?= lang('Texte.repartition_titre') ?></h3>

        <div class="mb-4">
          <div class="d-flex justify-content-between mb-2">
            <span class="fw-medium text-dark"><?= lang('Texte.repart_projets') ?></span>
            <span class="fw-bold text-dark">75%</span>
          </div>
          <div class="progress" style="height: 1rem;">
            <div class="progress-bar rounded-pill" style="width: 75%; background-color: #2D8659;"></div>
          </div>
        </div>

        <div class="mb-4">
          <div class="d-flex justify-content-between mb-2">
            <span class="fw-medium text-dark"><?= lang('Texte.repart_fonctionnement') ?></span>
            <span class="fw-bold text-dark">15%</span>
          </div>
          <div class="progress" style="height: 1rem;">
            <div class="progress-bar rounded-pill" style="width: 15%; background-color: #1E88E5;"></div>
          </div>
        </div>

        <div>
          <div class="d-flex justify-content-between mb-2">
            <span class="fw-medium text-dark"><?= lang('Texte.repart_comm') ?></span>
            <span class="fw-bold text-dark">10%</span>
          </div>
          <div class="progress" style="height: 1rem;">
            <div class="progress-bar rounded-pill" style="width: 10%; background-color: #FF7043;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
