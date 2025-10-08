<?php include 'features.php'; ?>

<section class="py-20 px-4 items-center justify-center" style="background-color: #e8ded0;">
  <div class="max-w-7xl mx-auto ">

    <!-- Header -->
    <div class="mb-12 text-center">
      <h2 class="text-4xl md:text-5xl text-emerald-900 font-serif">Room Options</h2>
      <p class="mt-2 text-lg lg:text-xl text-gray-800">
        <i>Add comfort to your stay • Max combined capacity: 14 pax</i>
      </p>
    </div>

    <!-- Flex wrapper -->
    <div class="flex flex-col lg:flex-row gap-12 items-center justify-center">
      <?php foreach ($rooms as $room): ?>
        <div class="flex-1 flex flex-col bg-white rounded-lg shadow-lg overflow-hidden max-w-md w-full">

          <!-- Image -->
          <div class="h-80 overflow-hidden">
            <img src="<?= $room['image'] ?>" alt="<?= $room['name'] ?>" class="w-full h-full object-cover">
          </div>

          <!-- Content -->
          <div class="flex flex-col justify-between h-full px-6 py-6">
            <div>
              <!-- Icon and type -->
              <div class="flex items-center gap-2 mb-3 text-[#5a6c5a]">
                <?php if ($room['icon'] === 'fan'): ?>
                  <svg class="w-5 h-5 text-[#2d5f3f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                  </svg>
                <?php elseif ($room['icon'] === 'air'): ?>
                  <svg class="w-5 h-5 text-[#2d5f3f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M3 12h18M3 18h18" />
                  </svg>
                <?php endif; ?>
                <span><?= htmlspecialchars($room['type']) ?></span>
              </div>

              <h3 class="text-3xl text-[#2d5f3f] mb-2"><?= htmlspecialchars($room['name']) ?></h3>
              <p class="text-4xl text-[#2d5f3f] mb-1"><?= htmlspecialchars($room['price']) ?></p>
              <p class="text-sm text-[#5a6c5a] mb-4">per night • Capacity: <?= htmlspecialchars($room['capacity']) ?></p>

              <!-- Features -->
              <ul class="space-y-2 text-left">
                <?php foreach ($room['features'] as $feature): ?>
                  <li class="flex items-start gap-2 text-[#5a6c5a] text-sm">
                    <span class="w-2 h-2 mt-1 rounded-full bg-[#8b9d7c]"></span>
                    <?= htmlspecialchars($feature) ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- Button -->
            <div class="mt-6">
              <a href="booking.php#calculator" class="inline-block bg-[#2d5f3f] hover:bg-[#234a32] text-white py-2 px-5 rounded">
                Add to Booking
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <div class="mt-16 text-center p-6 rounded-lg bg-[#d4c4b0]">
      <p class="text-[#2d5f3f] text-lg">
        All rooms feature detached toilets and bathrooms • Maximum combined room capacity: 14 pax
      </p>
    </div>
  </div>
</section>
