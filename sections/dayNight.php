<?php
include 'features.php';
?>

<section id="packages" class="bg-white">
  <div class="mx-auto max-w-7xl py-16 px-6 sm:px-10 lg:px-20 items-center justify-center">

    <!-- Header -->
    <div class="mb-12 text-center">
      <p class="text-4xl sm:text-4xl md:text-5xl font-md text-emerald-900 font-serif">
        Day & Night Packages
      </p>
      <p class="mt-2 text-lg sm:text-xl lg:text-2xl text-gray-800">
        <i>Perfect for group bonding • Max 30 pax, ₱100 per excess head</i>
      </p>
    </div>

    <div class="space-y-12">
      <?php foreach ($packages as $index => $package): ?>
        <?php
          // Determine image position (alternating layout)
          $isEven = $index % 2 !== 0;
        ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
          <!-- Image -->
          <div class="relative h-fit lg:h-fit overflow-hidden rounded-lg <?= $isEven ? 'order-1 lg:order-2' : '' ?>">
            <img src="<?= $package['image'] ?>" alt="<?= $package['name'] ?>" class="w-full h-full object-cover">
          </div>

          <!-- Content -->
          <div class="px-4 lg:px-12 <?= $isEven ? 'order-2 lg:order-1' : '' ?>">
            <div class="space-y-4">

              <div class="flex flex-row lg:flex-col gap-6">
                <!-- Price & Label -->
                <div class="flex-1">
                  <div class="mb-2">
                    <?php if (!empty($package['label'])): ?>
                      <span class="inline-block mb-2 px-3 py-1 rounded-full text-white text-sm font-semibold"
                        style="background-color: <?= $package['labelColor'] ?>;">
                        <?= $package['label'] ?>
                      </span>
                    <?php endif; ?>

                    <h3 class="text-3xl mb-2" style="color: #2d5f3f;"><?= $package['name'] ?></h3>
                    <p class="text-base" style="color: #5a6c5a;"><?= $package['time'] ?></p>
                  </div>

                  <div class="text-4xl mb-2" style="color: #2d5f3f;"><?= $package['price'] ?></div>
                  <div class="text-sm" style="color: #5a6c5a;">Base rate for <?= $package['capacity'] ?></div>
                </div>

                <!-- Description -->
                <div class="flex-1">
                  <p class="leading-relaxed text-lg" style="color: #5a6c5a;">
                    <?= trim($package['description']) ?>
                  </p>
                </div>
              </div>

              <div>
                <a href="#calculator" class="inline-block bg-[#2d5f3f] hover:bg-[#234a32] text-white font-semibold px-6 py-3 rounded-lg transition">
                  Book This Package
                </a>
              </div>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Footer Note -->
    <div class="mt-16 text-center p-8 rounded-lg" style="background-color: #8b9d7c;">
      <p class="text-white text-lg">
        All packages include access to all amenities • Rooms can be added separately • Max 14 pax in rooms
      </p>
    </div>
  </div>
</section>
