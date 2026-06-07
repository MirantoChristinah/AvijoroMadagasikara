<div class="pt-16 lg:pt-20">
  <!-- Section Hero -->
  <section class="bg-gradient-to-br from-[#2D8659] to-[#1E88E5] text-white py-16 lg:py-24">
    <div class="container mx-auto px-4 text-center">
      <div class="text-white mb-6 text-6xl">❓</div>
      <h1 class="text-4xl lg:text-6xl font-bold mb-6"><?= lang('Texte.faq_titre') ?></h1>
      <p class="text-lg lg:text-xl text-green-50 max-w-3xl mx-auto">
        <?= lang('Texte.faq_slogan') ?>
      </p>
    </div>
  </section>

  <!-- Section Liste des questions (FAQ) -->
  <section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4 max-w-4xl space-y-12">
      
      <!-- Categorie 1 : Général -->
      <div>
        <h2 class="text-2xl lg:text-3xl font-bold mb-6 text-gray-900"><?= lang('Texte.faq_cat_general') ?></h2>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q1') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a1') ?></div>
          </details>
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q2') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a2') ?></div>
          </details>
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q3') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a3') ?></div>
          </details>
        </div>
      </div>

      <!-- Categorie 2 : Bénévolat -->
      <div>
        <h2 class="text-2xl lg:text-3xl font-bold mb-6 text-gray-900"><?= lang('Texte.faq_cat_benevolat') ?></h2>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q4') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a4') ?></div>
          </details>
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q5') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a5') ?></div>
          </details>
        </div>
      </div>

      <!-- Categorie 3 : Dons -->
      <div>
        <h2 class="text-2xl lg:text-3xl font-bold mb-6 text-gray-900"><?= lang('Texte.faq_cat_dons') ?></h2>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q6') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a6') ?></div>
          </details>
          <details class="group border-b border-gray-200 last:border-0">
            <summary class="w-full py-6 px-6 flex items-center justify-between text-left font-medium text-gray-900 cursor-pointer list-none hover:bg-gray-50 transition-colors">
              <span><?= lang('Texte.faq_q7') ?></span>
              <span class="text-[#2D8659] transition-transform group-open:rotate-180">▼</span>
            </summary>
            <div class="px-6 pb-6 text-gray-600 leading-relaxed"><?= lang('Texte.faq_a7') ?></div>
          </details>
        </div>
      </div>

    </div>
  </section>
</div>
