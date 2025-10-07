<!-- <section id="packages" class="h-fit mx-auto bg-white">

<div class="mx-auto max-w-7xl py-16 px-6 sm:px-10 lg:px-20 items-center justify-center">
<div class="text-center mt-3">
    <a class="text-emerald-900 font-serif text-4xl">Day & Night Packages<br></a>
    <a class="text-gray-800 mt-2 text-lg"><i>Perfect for group bonding (Max 30 pax, ₱100 per excess head)</i></a>
</div>




</div>
</section> -->
<!-- 
<?php
include 'features.php';
?>

<section id="packages" class="bg-white">
  <div class="mx-auto max-w-7xl py-16 px-6 sm:px-10 lg:px-20 items-center justify-center">
    <div class="text-center mb-12">
      <h2 class="text-4xl sm:text-4xl md:text-5xl font-md text-emerald-900 font-serif">Day & Night Packages</h2>
      <p class="mt-2 text-lg sm:text-xl lg:text-2xl text-gray-800"><i>Perfect for group bonding (Max 30 pax, ₱100 per excess head)</i></p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php foreach ($packages as $pkgDetails): ?>
        <div class="border border-emerald-700 hover:border-emerald-600 hover:border-2 hover:shadow-xl transition-all rounded-xl p-6">
          
          <h3 class="text-emerald-900 text-xl font-normal"><?= $pkgDetails["name"] ?></h3>
          <p class="text-gray-700"><?= $pkgDetails["time"] ?></p>
          <div class="text-4xl my-2 text-emerald-800 font-semibold"><?= $pkgDetails["price"] ?></div>
          <p class="text-gray-700">Base rate for <?= $pkgDetails["capacity"] ?></p>
          <hr class="my-4">
          <p class="text-gray-700"><?= $pkgDetails["description"] ?></p>
          <p class="text-sm text-gray-700 mt-2">* All amenities included, rooms can be added separately</p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section> -->
<section id="packages" class="bg-white">
  <div class="mx-auto max-w-7xl py-16 px-6 sm:px-10 lg:px-20 items-center justify-center">
    
    <!-- Header -->
    <div class="text-center mb-16">
      <h2 class="text-5xl mb-4" style="color: #2d5f3f;">Day & Night Packages</h2>
      <p class="text-lg" style="color: #5a6c5a;">Perfect for group bonding • Max 30 pax, ₱100 per excess head</p>
    </div>

    <div class="space-y-12">

      <!-- ================= DAY TOUR ================= -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div class="relative h-96 lg:h-[500px] overflow-hidden rounded-lg">
          <img src="https://images.unsplash.com/photo-1697216563517-e48622ba218c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
               alt="Day Tour" class="w-full h-full object-cover">
        </div>

        <div class="px-4 lg:px-12">
          <div class="space-y-4">
            

            <!-- PRICE & DESCRIPTION responsive layout -->
            <div class="flex flex-row lg:flex-col">
              <!-- Price -->
              <div class="flex-1">
              <div class="mb-2">
              <span class="inline-block mb-2 px-3 py-1 rounded-full text-white text-sm font-semibold" style="background-color: #8b9d7c;">Most Popular</span>
              <h3 class="text-3xl mb-2" style="color: #2d5f3f;">Day Tour</h3>
              <p class="text-base" style="color: #5a6c5a;">7:00 AM – 5:00 PM</p>
            </div>
                <div class="text-4xl mb-2" style="color: #2d5f3f;">₱4,900</div>
                <div class="text-sm" style="color: #5a6c5a;">Base rate for 30 pax</div>
              </div>

              <!-- Description -->
              <div class="flex-1">
                <p class="mt-5 mb-2 sm:mt-2 leading-relaxed" style="color: #5a6c5a;">
                  Perfect for day trips and group bonding. Enjoy all resort amenities including our main pool, kiddie pool, cottages, tree house, fire pit, and more. Bring your own food or cook on our grillers – no corkage fees.
                </p>
              </div>
            </div>

            <div>
              <a href="#calculator" class="inline-block bg-[#2d5f3f] hover:bg-[#234a32] text-white font-semibold px-2 py-3 rounded-lg transition sm:px-6 sm:text-xl">
                Book This Package
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ================= NIGHT TOUR ================= -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div class="relative h-96 lg:h-[500px] overflow-hidden rounded-lg order-1 lg:order-2">
          <img src="https://images.unsplash.com/photo-1663312790104-c16cd011b761?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
               alt="Night Tour" class="w-full h-full object-cover">
        </div>

        <div class="px-4 lg:px-12 order-2 lg:order-1">
          <div class="space-y-4">
            <h3 class="text-4xl mb-2" style="color: #2d5f3f;">Night Tour</h3>
            <p class="text-base" style="color: #5a6c5a;">7:00 PM – 6:00 AM</p>

            <!-- PRICE & DESCRIPTION responsive layout -->
            <div class="flex flex-row lg:flex-col gap-6">
              <!-- Price -->
              <div class="flex-1">
                <div class="text-5xl mb-2" style="color: #2d5f3f;">₱5,900</div>
                <div class="text-sm" style="color: #5a6c5a;">Base rate for 30 pax</div>
              </div>

              <!-- Description -->
              <div class="flex-1">
                <p class="leading-relaxed" style="color: #5a6c5a;">
                  Evening relaxation under the stars. Experience the magic of Casa Celerina at night with our illuminated pools, bonfire setup, and free videoke. Perfect for creating unforgettable memories with friends and family.
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

      <!-- ================= 22-HOUR STAY ================= -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div class="relative h-96 lg:h-[500px] overflow-hidden rounded-lg">
          <img src="https://images.unsplash.com/photo-1759400616241-d933eb0dd6df?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
               alt="22-Hour Stay" class="w-full h-full object-cover">
        </div>

        <div class="px-4 lg:px-12">
          <div class="space-y-4">
            <span class="inline-block mb-2 px-3 py-1 rounded-full text-white text-sm font-semibold" style="background-color: #d4a574;">Best Value</span>
            <h3 class="text-4xl mb-2" style="color: #2d5f3f;">22-Hour Stay</h3>
            <p class="text-base" style="color: #5a6c5a;">7:00 AM – 6:00 AM (next day)</p>

            <!-- PRICE & DESCRIPTION responsive layout -->
            <div class="flex flex-row lg:flex-col gap-6">
              <!-- Price -->
              <div class="flex-1">
                <div class="text-5xl mb-2" style="color: #2d5f3f;">₱8,900</div>
                <div class="text-sm" style="color: #5a6c5a;">Base rate for 30 pax</div>
              </div>

              <!-- Description -->
              <div class="flex-1">
                <p class="leading-relaxed" style="color: #5a6c5a;">
                  Full day and night experience. The ultimate getaway package combining both day and night tours. Enjoy the complete Casa Celerina experience from sunrise to sunset and beyond. All amenities included, rooms available for add-on.
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
    </div>

    <!-- Footer Note -->
    <div class="mt-16 text-center p-8 rounded-lg" style="background-color: #8b9d7c;">
      <p class="text-white text-lg">
        All packages include access to all amenities • Rooms can be added separately • Max 14 pax in rooms
      </p>
    </div>
  </div>
</section>
