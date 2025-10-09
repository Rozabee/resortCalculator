<?php include 'priceheader.php'; ?>

<section class="min-h-screen">
  <div class="max-w-7xl mx-auto py-12 px-6 sm:px-10 lg:px-20">
    <div class="text-center mb-10">
      <h2 class="text-3xl md:text-4xl font-bold text-emerald-900">Price Calculator</h2>
      <p class="text-gray-600 mt-2 text-sm sm:text-base">Customize your stay and get an instant cost breakdown</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      <!-- FORM SECTION -->
      <div class="lg:col-span-2 space-y-6">
        
        <!-- Booking Type -->
        <div class="bg-white rounded-2xl shadow p-6 space-y-4">
          <h3 class="text-lg font-semibold text-emerald-800">1. Choose Booking Type</h3>
          <select id="bookingType" class="bg-emerald-50 w-full border-gray-300 rounded-lg focus:ring-gray-700 focus:border-emerald-500 p-4">
            <option class="bg-emerald-100 rounded-lg p-5" value="day">Day Tour – ₱4,900 (30 pax)</option>
            <option value="night">Night Tour – ₱5,900 (30 pax)</option>
            <option value="mi-amore">Mi Amore Villa – ₱8,500 (8 pax)</option>
            <option value="mi-carino">Mi Cariño Villa – ₱3,950 (2 pax)</option>
            <option value="casita">Casita Villa – ₱5,200 (4 pax)</option>
            <option value="couple">Couple Promo – ₱2,500 (2 pax)</option>
          </select>
        </div>

        <!-- Guest Count -->
        <div class="bg-white rounded-2xl shadow p-6 space-y-4">
          <h3 class="text-lg font-semibold text-emerald-800">2. Number of Guests</h3>
          <p class="text-gray-500 text-sm">Enter number of guests staying/visiting</p>
          <input type="number" id="guestCount" min="1" placeholder="e.g. 5" class="w-full border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
        </div>

        <!-- Add-ons -->
        <div class="bg-white rounded-2xl shadow p-6 space-y-4">
          <h3 class="text-lg font-semibold text-emerald-800">3. Add-ons (Optional)</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
            <label class="flex items-center gap-2"><input type="checkbox" id="firewood" class="accent-emerald-600"> Firewood – ₱100</label>
            <label class="flex items-center gap-2"><input type="checkbox" id="tent" class="accent-emerald-600"> Tent Rental – ₱300</label>
            <label class="flex items-center gap-2"><input type="checkbox" id="projector" class="accent-emerald-600"> Smart Projector – ₱500</label>
            <label class="flex items-center gap-2"><input type="checkbox" id="tray" class="accent-emerald-600"> Floating Tray – ₱150</label>
            <label class="flex items-center gap-2"><input type="checkbox" id="gas" class="accent-emerald-600"> Gas for Stove – ₱300</label>
          </div>
          <div class="mt-3">
            <label class="block text-sm mb-1">Silog Breakfast (₱150/head)</label>
            <input type="number" id="silog" min="0" placeholder="e.g. 3" class="w-full border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
          </div>
        </div>

      </div>

      <!-- SUMMARY -->
      <div>
        <div class="bg-white rounded-2xl shadow border border-emerald-100 sticky top-28">
          <div class="bg-emerald-600 text-white rounded-t-2xl p-4">
            <h3 class="text-lg font-semibold">Booking Summary</h3>
            <p class="text-xs opacity-80">Auto-updated in real time</p>
          </div>
          <div class="p-6 space-y-4">
            <div id="summaryDetails" class="text-sm text-gray-700 space-y-2">
              <p>No selections yet.</p>
            </div>
            <hr>
            <div class="flex justify-between items-center">
              <p class="font-semibold">Total</p>
              <p id="totalPrice" class="text-2xl font-bold text-emerald-700">₱0</p>
            </div>
            <button id="bookNow" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-lg font-semibold">Book Now</button>
            <button id="resetForm" class="w-full border border-gray-300 text-gray-700 hover:bg-gray-100 py-3 rounded-lg font-medium">Reset</button>
            <p class="text-xs text-gray-500 pt-2">* This is an estimated total. Final prices may vary.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
function calculateTotal() {
  let total = 0;
  const booking = document.getElementById("bookingType").value;
  const guests = parseInt(document.getElementById("guestCount").value) || 0;
  const add = id => document.getElementById(id).checked;
  const silog = parseInt(document.getElementById("silog").value) || 0;

  const basePrices = {
    day: 4900,
    night: 5900,
    "mi-amore": 8500,
    "mi-carino": 3950,
    casita: 5200,
    couple: 2500,
  };

  if (basePrices[booking]) total += basePrices[booking];
  if (add("firewood")) total += 100;
  if (add("tent")) total += 300;
  if (add("projector")) total += 500;
  if (add("tray")) total += 150;
  if (add("gas")) total += 300;
  if (silog > 0) total += silog * 150;

  // Extra guest fee (example: ₱200 each above capacity)
  const capacities = { day: 30, night: 30, "mi-amore": 8, "mi-carino": 2, casita: 4, couple: 2 };
  const cap = capacities[booking] || 0;
  if (guests > cap) total += (guests - cap) * 200;

  // Update DOM
  document.getElementById("totalPrice").textContent = "₱" + total.toLocaleString();
  document.getElementById("summaryDetails").innerHTML = `
    <p><strong>Booking:</strong> ${booking || "—"}</p>
    <p><strong>Guests:</strong> ${guests || "—"}</p>
    <p><strong>Silog:</strong> ${silog || 0}</p>
  `;
}

document.querySelectorAll("input, select").forEach(el => el.addEventListener("change", calculateTotal));
document.getElementById("resetForm").addEventListener("click", () => {
  document.querySelectorAll("input[type='checkbox']").forEach(el => el.checked = false);
  document.querySelectorAll("input[type='number']").forEach(el => el.value = "");
  document.getElementById("bookingType").value = "";
  calculateTotal();
});
calculateTotal();
</script>

</body>
</html>
