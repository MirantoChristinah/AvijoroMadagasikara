<div class="pt-16 lg:pt-20">
  <!-- Section Hero -->
  <section class="bg-gradient-to-br from-[#FF7043] to-[#F4511E] text-white py-16 lg:py-24">
    <div class="container mx-auto px-4 text-center">
      <div class="text-white mb-6 text-6xl">❤️</div>
      <h1 class="text-4xl lg:text-6xl font-bold mb-6"><?= lang('Texte.soutenir_titre') ?></h1>
      <p class="text-lg lg:text-xl text-orange-50 max-w-3xl mx-auto">
        <?= lang('Texte.soutenir_slogan') ?>
      </p>
    </div>
  </section>

  <!-- Section Méthodes de Dons -->
  <section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-5xl font-bold mb-4 text-gray-900">
          <?= lang('Texte.comment_don_titre') ?>
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          <?= lang('Texte.comment_don_desc') ?>
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Méthode 1: Mobile Money -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
          <div class="bg-gradient-to-br from-orange-500 to-red-500 p-8 text-white text-center">
            <div class="text-4xl mb-2">📱</div>
            <h3 class="text-xl font-bold">Mobile Money</h3>
          </div>
          <div class="p-6 text-center">
            <p class="text-gray-600 mb-3">MVola, Orange Money, Airtel Money</p>
            <p class="text-sm font-medium text-gray-900 bg-gray-50 px-3 py-2 rounded-lg">+261 34 12 345 67</p>
          </div>
        </div>

        <!-- Méthode 2: Virement Bancaire -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
          <div class="bg-gradient-to-br from-blue-500 to-indigo-500 p-8 text-white text-center">
            <div class="text-4xl mb-2">💳</div>
            <h3 class="text-xl font-bold"><?= lang('Texte.don_banque_titre') ?></h3>
          </div>
          <div class="p-6 text-center">
            <p class="text-gray-600 mb-3">BOA Madagascar</p>
            <p class="text-xs font-medium text-gray-900 bg-gray-50 px-3 py-2 rounded-lg select-all">IBAN: MG12 3456 7890 1234 5678 90</p>
          </div>
        </div>

        <!-- Méthode 3: QR Code -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
          <div class="bg-gradient-to-br from-green-500 to-teal-500 p-8 text-white text-center">
            <div class="text-4xl mb-2">🔳</div>
            <h3 class="text-xl font-bold">QR Code</h3>
          </div>
          <div class="p-6 text-center">
            <p class="text-gray-600 mb-3"><?= lang('Texte.don_qr_desc') ?></p>
            <p class="text-sm font-medium text-gray-900 bg-gray-50 px-3 py-2 rounded-lg"><?= lang('Texte.don_qr_details') ?></p>
          </div>
        </div>

        <!-- Méthode 4: Facebook Fundraising -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
          <div class="bg-gradient-to-br from-blue-600 to-blue-400 p-8 text-white text-center">
            <div class="text-4xl mb-2">👥</div>
            <h3 class="text-xl font-bold">Facebook</h3>
          </div>
          <div class="p-6 text-center">
            <p class="text-gray-600 mb-3"><?= lang('Texte.don_fb_desc') ?></p>
            <a href="https://facebook.com" target="_blank" class="block text-sm font-medium text-blue-600 hover:underline bg-blue-50 px-3 py-2 rounded-lg">facebook.com/avijoro</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Échelles d'Impact -->
  <section class="py-16 lg:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <div class="text-[#2D8659] text-5xl mb-4">📈</div>
        <h2 class="text-3xl lg:text-5xl font-bold mb-4 text-gray-900"><?= lang('Texte.impact_don_titre') ?></h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?= lang('Texte.impact_don_desc') ?></p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
        <!-- Niveau 1 -->
        <div class="bg-white p-8 rounded-2xl text-center hover:shadow-lg transition-shadow">
          <div class="text-5xl mb-4">📚</div>
          <div class="text-2xl font-bold text-[#FF7043] mb-3">10,000 Ar</div>
          <p class="text-gray-700"><?= lang('Texte.impact_1') ?></p>
        </div>
        <!-- Niveau 2 -->
        <div class="bg-white p-8 rounded-2xl text-center hover:shadow-lg transition-shadow">
          <div class="text-5xl mb-4">🏥</div>
          <div class="text-2xl font-bold text-[#FF7043] mb-3">50,000 Ar</div>
          <p class="text-gray-700"><?= lang('Texte.impact_2') ?></p>
        </div>
        <!-- Niveau 3 -->
        <div class="bg-white p-8 rounded-2xl text-center hover:shadow-lg transition-shadow">
          <div class="text-5xl mb-4">🌳</div>
          <div class="text-2xl font-bold text-[#FF7043] mb-3">100,000 Ar</div>
          <p class="text-gray-700"><?= lang('Texte.impact_3') ?></p>
        </div>
        <!-- Niveau 4 -->
        <div class="bg-white p-8 rounded-2xl text-center hover:shadow-lg transition-shadow">
          <div class="text-5xl mb-4">💧</div>
          <div class="text-2xl font-bold text-[#FF7043] mb-3">500,000 Ar</div>
          <p class="text-gray-700"><?= lang('Texte.impact_4') ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Transparence Financière -->
  <section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
      <div class="text-center mb-12">
        <div class="text-[#1E88E5] text-5xl mb-4">🛡️</div>
        <h2 class="text-3xl lg:text-5xl font-bold mb-4 text-gray-900"><?= lang('Texte.transparence_titre') ?></h2>
        <p class="text-lg text-gray-600"><?= lang('Texte.transparence_desc') ?></p>
      </div>

      <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 lg:p-12 rounded-2xl">
        <h3 class="text-2xl font-bold mb-8 text-gray-900 text-center"><?= lang('Texte.repartition_titre') ?></h3>
        
        <div class="space-y-6">
          <!-- Barre 1: Projets -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <span class="font-medium text-gray-900"><?= lang('Texte.repart_projets') ?></span>
              <span class="font-bold text-lg text-gray-900">75%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4">
              <div class="bg-[#2D8659] h-4 rounded-full" style="width: 75%"></div>
            </div>
          </div>

          <!-- Barre 2: Fonctionnement -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <span class="font-medium text-gray-900"><?= lang('Texte.repart_fonctionnement') ?></span>
              <span class="font-bold text-lg text-gray-900">15%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4">
              <div class="bg-[#1E88E5] h-4 rounded-full" style="width: 15%"></div>
            </div>
          </div>

          <!-- Barre 3: Communication -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <span class="font-medium text-gray-900"><?= lang('Texte.repart_comm') ?></span>
              <span class="font-bold text-lg text-gray-900">10%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4">
              <div class="bg-[#FF7043] h-4 rounded-full" style="width: 10%"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
