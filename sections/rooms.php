<?php
// rooms.php
include 'features.php';
?>

<section class=" bg-gray-100">
  <div class="mx-auto max-w-7xl py-16 px-6 sm:px-10 lg:px-20 items-center justify-center">
    <div class="text-center mb-12">
      <h2 class="text-4xl sm:text-4xl md:text-5xl font-md text-emerald-900 font-serif">Room Options</h2>
      <p class="mt-2 text-lg sm:text-xl lg:text-2xl text-gray-800"><i>Add comfort to your stay (Max combined capacity: 14 pax)</i></p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
      <?php foreach ($rooms as $room): ?>
        <div class="border border-primary/30 rounded-xl p-6">
          <div class="flex items-start justify-between mb-4">
            <div>
              <h3 class="text-primary text-xl font-bold"><?= $room["name"] ?></h3>
              <p class="text-sm mt-1">
                <?= $room["type"] ?>
              </p>
            </div>
            <div class="text-right">
              <div class="text-2xl text-primary"><?= $room["price"] ?></div>
              <div class="text-xs text-muted-foreground">per night</div>
            </div>
          </div>
          <div class="space-y-3">
            <p class="text-sm"><strong>Capacity:</strong> <?= $room["capacity"] ?></p>
            <p class="text-sm"><strong>Extra bed:</strong> <?= $room["extraBed"] ?></p>
            <hr>
            <ul class="space-y-2 text-sm">
              <?php foreach ($room["features"] as $feature): ?>
                <li class="flex items-start gap-2">
                  <span class="text-primary mt-1">•</span>
                  <span><?= $feature ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-8 text-center">
      <p class="text-sm text-muted-foreground mb-2">Add ₱500 for 22-hour stay upgrade</p>
      <p class="text-sm text-muted-foreground">Detached toilets and bathrooms for all rooms</p>
    </div>
  </div>
</section>
