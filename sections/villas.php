<?php
include 'features.php';
?>

<section id="villas" class="bg-gray-100">
  <div class="mx-auto max-w-7xl py-16 px-6 sm:px-5 lg:px-15 items-center justify-center">
    <!-- HEADER -->
    <div class="mb-12 text-center">
      <p class="text-4xl sm:text-4xl md:text-5xl font-md text-emerald-900 font-serif">
       In Our <a style="color:#d4a574">VILLAS</a> You'll Find <br>Everything You Need
      </p>
      <p class="mt-2 text-lg sm:text-xl lg:text-2xl text-gray-800">
        <i>Everything you need for a perfect getaway</i>
      </p>
    </div>
    
    <?php foreach ($villas as $villa): ?>
      <?php if ($villa['id'] !== 'couple-promo'): ?>
        <!-- Villa Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center mt-5 bg-white px-5 py-10 rounded-xl">
          <?php if ($villa['id'] === 'mi-amore'): ?>
            <!-- Text Left / Images Right -->
            <div class="lg:col-span-4 flex flex-col justify-center pr-0 lg:pr-8">
              <div class="mb-6">
                <span class="inline-block mb-4 px-3 py-1 rounded text-white text-sm font-semibold" style="background-color: <?= $villa['badgeColor'] ?>;">
                  <?= $villa['badge'] ?>
                </span>
                <h2 class="text-5xl mb-6 font-semibold font-serif" style="color: #2d5f3f;">
                  Mi Amore <a style="color:#d4a574">Villa</a>
                </h2>
                <p class="mb-6 leading-relaxed text-[#5a6c5a] sm:text-2xl lg:text-base"><?= $villa['description'] ?></p>

                <div class="space-y-3 mb-8">
                  <?php foreach ($villa['features'] as $feature): ?>
                    <div class="flex items-start gap-3">
                      <div class="w-2 h-2 rounded-full mt-2" style="background-color: #8b9d7c;"></div>
                      <p class="text-[#5a6c5a] sm:text-xl lg:text-base"><?= $feature ?></p>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Image Grid -->
            <div class="lg:col-span-8">
              <div class="grid grid-cols-2 gap-4">
                <div class="relative h-48 overflow-hidden rounded-lg">
                  <img src="<?= $villa['images'][0] ?>" alt="Villa Image" class="w-full h-full object-cover">
                </div>
                <div class="relative row-span-2 h-auto overflow-hidden rounded-lg">
                  <img src="<?= $villa['images'][1] ?>" alt="Villa Image" class="w-full h-full object-cover">
                </div>
                <div class="relative h-48 overflow-hidden rounded-lg">
                  <img src="<?= $villa['images'][2] ?>" alt="Villa Image" class="w-full h-full object-cover">
                </div>
              </div>

              <!-- Pricing -->
              <div class="mt-6 p-6 rounded-lg bg-[#e8ded0] shadow-lg">
                <h3 class="text-3xl mb-4 text-[#2d5f3f]">Mi Amore Villa</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                  <?php foreach ($villa['pricing'] as $price): ?>
                    <div>
                      <div class="text-sm mb-1 text-[#5a6c5a]"><?= $price['label'] ?></div>
                      <div class="text-2xl text-[#2d5f3f]"><?= $price['price'] ?></div>
                    </div>
                  <?php endforeach; ?>
                </div>
                <p class="text-sm mb-4 text-[#5a6c5a]"><?= $villa['note'] ?></p>
                <a href="#calculator" class="inline-block bg-[#2d5f3f] hover:bg-[#234a32] text-white font-semibold px-6 py-3 rounded-lg transition">
                  <?= $villa['buttonText'] ?>
                </a>
              </div>
            </div>

          <?php else: ?>
            <!-- Mi Cariño Layout (Images Left / Text Right) -->
            <div class="lg:col-span-8 order-2 lg:order-1 bg-white">
              <div class="grid grid-cols-2 gap-4">
                <div class="relative h-56 overflow-hidden rounded-lg">
                  <img src="<?= $villa['images'][0] ?>" alt="Villa Image" class="w-full h-full object-cover">
                </div>
                <div class="relative h-56 overflow-hidden rounded-lg">
                  <img src="<?= $villa['images'][1] ?>" alt="Villa Image" class="w-full h-full object-cover">
                </div>
                <div class="relative col-span-2 h-64 overflow-hidden rounded-lg">
                  <img src="<?= $villa['images'][2] ?>" alt="Villa Image" class="w-full h-full object-cover">
                </div>
              </div>

              <div class="mt-6 p-6 rounded-lg bg-[#e8ded0] shadow-lg">
                <h3 class="text-3xl mb-4 text-[#2d5f3f]">Mi Cariño Villa</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                  <?php foreach ($villa['pricing'] as $price): ?>
                    <div>
                      <div class="text-sm mb-1 text-[#5a6c5a]"><?= $price['label'] ?></div>
                      <div class="text-2xl text-[#2d5f3f]"><?= $price['price'] ?></div>
                      <?php if (!empty($price['subtext'])): ?>
                        <div class="text-xs text-[#5a6c5a]"><?= $price['subtext'] ?></div>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                </div>
                  <p class="text-sm text-[#5a6c5a] mb-5"><?= $villa['note'] ?></p>
                <a href="#calculator" class="inline-block bg-[#2d5f3f] hover:bg-[#234a32] text-white font-semibold px-6 py-3 rounded-lg transition">
                  <?= $villa['buttonText'] ?>
                </a>
              </div>
            </div>

            <div class="lg:col-span-4 flex flex-col justify-center pl-0 lg:pl-8 order-1 lg:order-2">
              <div class="mb-6">
                <span class="inline-block mb-4 px-3 py-1 rounded text-white text-sm font-semibold" style="background-color: <?= $villa['badgeColor'] ?>;">
                  <?= $villa['badge'] ?>
                </span>
                <h2 class="text-5xl mb-6 font-serif font-semibold" style="color: #2d5f3f;">
                  Cozy private <span style="color: <?= $villa['badgeColor'] ?>;"><?= $villa['highlight'] ?></span>
                </h2>
                <p class="mb-6 leading-relaxed text-[#5a6c5a]"><?= $villa['description'] ?></p>

                <div class="space-y-3 mb-8">
                  <?php foreach ($villa['features'] as $feature): ?>
                    <div class="flex items-start gap-3">
                      <div class="w-2 h-2 rounded-full mt-2" style="background-color: #d4a574;"></div>
                      <p class="text-[#5a6c5a]"><?= $feature ?></p>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>

      <?php else: ?>
        <!-- Couple Promo -->
        <div class="p-8 lg:p-10 rounded-lg mt-10 shadow-lg" style="background-color: <?= $villa['badgeColor'] ?>;">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
              <h3 class="text-4xl mb-4 text-white"><?= $villa['title'] ?></h3>
              <p class="text-lg mb-6 text-white/90"><?= $villa['subtitle'] ?></p>
              <div class="space-y-3 mb-6">
                <?php foreach ($villa['features'] as $feature): ?>
                  <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-white"></div>
                    <p class="text-white"><?= $feature ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
              <a href="#calculator" class="inline-block bg-white text-[#2d5f3f] font-semibold px-6 py-3 rounded-lg transition">
                <?= $villa['buttonText'] ?>
              </a>
            </div>
            <div class="text-center lg:text-right">
              <div class="text-6xl lg:text-7xl text-white mb-2"><?= $villa['price'] ?></div>
              <div class="text-xl text-white/80"><?= $villa['note'] ?></div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>

  </div>
</section>
