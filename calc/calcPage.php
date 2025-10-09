<?php include("calcFunction.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <a href="/PHP/casaCelerina" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-2">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Home
            </a>
            <div class="flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
                <div>
                    <h1 class="text-2xl font-bold text-blue-600">Price Calculator</h1>
                    <p class="text-sm text-gray-600">Get an instant estimate for your stay</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="POST" action="" id="calculatorForm" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Booking Type Selection -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">1. Choose Your Booking Type</h2>
                        <p class="text-sm text-gray-600 mt-1">Select between packages, villas, or couple promo</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Villa or Package?</label>
                            <select name="villa_type" id="villa_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="handleVillaChange()">
                                <option value="">Select villa or choose package below</option>
                                <option value="none" <?= $calculator->isSelected('villaType', 'none') ?>>Regular Package (No Villa)</option>
                                <option value="mi-amore" <?= $calculator->isSelected('villaType', 'mi-amore') ?>>Mi Amore Villa (Exclusive)</option>
                                <option value="mi-carino" <?= $calculator->isSelected('villaType', 'mi-carino') ?>>Mi Cariño Villa (Private Room)</option>
                                <option value="couple-promo" <?= $calculator->isSelected('villaType', 'couple-promo') ?>>Couple Promo (Weekdays)</option>
                            </select>
                        </div>

                        <!-- Mi Amore Options -->
                        <div id="mi_amore_options" class="space-y-4" style="display: <?= $calculator->getValue('villaType') === 'mi-amore' ? 'block' : 'none' ?>">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Stay Type</label>
                                <select name="villa_stay_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 " >
                                    <option value="">Select stay type</option>
                                    <option value="day-tour" <?= $calculator->isSelected('villaStayType', 'day-tour') ?>>Day Tour (8 AM–6 PM or 10 AM–8 PM)</option>
                                    <option value="overnight" <?= $calculator->isSelected('villaStayType', 'overnight') ?>>Overnight (8 PM–6 AM or 10 PM–8 AM)</option>
                                    <option value="22-hour" <?= $calculator->isSelected('villaStayType', '22-hour') ?>>22-Hour (12 NN–10 AM or 2 PM–12 NN)</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                <select name="villa_pax_range" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                                    <option value="">Select pax range</option>
                                    <option value="4-6" <?= $calculator->isSelected('villaPaxRange', '4-6') ?>>4-6 pax</option>
                                    <option value="7-8" <?= $calculator->isSelected('villaPaxRange', '7-8') ?>>7-8 pax</option>
                                    <option value="9-10" <?= $calculator->isSelected('villaPaxRange', '9-10') ?>>9-10 pax</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Exact Guest Count (for excess calculation)</label>
                                <input type="number" name="guest_count" min="4" value="<?= $calculator->getValue('guestCount') ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter exact number">
                            </div>
                        </div>

                        <!-- Mi Cariño Options -->
                        <div id="mi_carino_options" class="space-y-4" style="display: <?= $calculator->getValue('villaType') === 'mi-carino' ? 'block' : 'none' ?>">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                <select name="villa_pax_range" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="handlePackageChange()">
                                    <option value="">Select guests</option>
                                    <option value="2" <?= $calculator->isSelected('villaPaxRange', '2') ?>>2 pax</option>
                                    <option value="3" <?= $calculator->isSelected('villaPaxRange', '3') ?>>3-4 pax</option>
                                </select>
                            </div>
                        </div>

                        <!-- Regular Package Options -->
                        <div id="package_options" style="display: <?= $calculator->getValue('villaType') === 'none' || $calculator->getValue('villaType') === '' ? 'block' : 'none' ?>">
                            <div class="border-t border-gray-200 my-4"></div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Package Type</label>
                                <select name="package_type" id="package_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="handlePackageChange()">
                                    <option value="">Select package</option>
                                    <option value="day-tour" <?= $calculator->isSelected('packageType', 'day-tour') ?>>Day Tour - ₱4,900 (7 AM–5 PM)</option>
                                    <option value="night-tour" <?= $calculator->isSelected('packageType', 'night-tour') ?>>Night Tour - ₱5,900 (7 PM–6 AM)</option>
                                    <option value="22-hour" <?= $calculator->isSelected('packageType', '22-hour') ?>>22-Hour Stay - ₱8,900 (7 AM–6 AM)</option>
                                </select>
                            </div>

                            <div id="guest_count_section" class="space-y-2 mt-4" style="display: <?= $calculator->getValue('packageType') ? 'block' : 'none' ?>">
                                <label class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                <input type="number" name="guest_count" min="1" value="<?= $calculator->getValue('guestCount') ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter number of guests">
                                <?php if ($calculator->getValue('guestCount') > 30): ?>
                                    <p class="text-sm text-gray-600">₱100 per excess head over 30 pax</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Couple Promo Info -->
                        <div id="couple_promo_info" class="bg-gray-100 p-4 rounded-lg" style="display: <?= $calculator->getValue('villaType') === 'couple-promo' ? 'block' : 'none' ?>">
                            <p class="text-sm"><strong>Includes:</strong> 1 Air-conditioned Room, Free Breakfast, All Amenities (Shared resort use, weekdays only)</p>
                        </div>
                    </div>
                </div>

                <!-- Room Add-ons -->
                <div id="room_section" class="bg-white rounded-lg shadow-sm border border-gray-200" style="display: <?= $calculator->getValue('packageType') && $calculator->getValue('villaType') === 'none' ? 'block' : 'none' ?>">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">2. Add Rooms (Optional)</h2>
                        <p class="text-sm text-gray-600 mt-1">Max combined capacity: 14 pax</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Room Type</label>
                            <select name="room_type" id="room_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="handleRoomChange()">
                                <option value="">Select room type</option>
                                <option value="nipa-hut" <?= $calculator->isSelected('roomType', 'nipa-hut') ?>>Standard Nipa Hut (Fan) - ₱1,000</option>
                                <option value="twin-house" <?= $calculator->isSelected('roomType', 'twin-house') ?>>Twin House (Aircon) - ₱1,350</option>
                            </select>
                        </div>

                        <div id="room_details" style="display: <?= $calculator->getValue('roomType') ? 'block' : 'none' ?>">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Number of Rooms</label>
                                <input type="number" name="room_count" min="1" max="5" value="<?= $calculator->getValue('roomCount') ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter number of rooms">
                            </div>

                            <div class="space-y-2 mt-4">
                                <label class="block text-sm font-medium text-gray-700">Extra Beds (₱350 each)</label>
                                <input type="number" name="extra_beds" min="0" value="<?= $calculator->getValue('extraBeds') ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter number of extra beds">
                            </div>

                            <?php if ($calculator->getValue('packageType') === '22-hour'): ?>
                                <div class="bg-gray-100 p-3 rounded-lg mt-4">
                                    <p class="text-sm">+ ₱500 per room for 22-hour upgrade</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Add-ons -->
                <div id="addons_section" class="bg-white rounded-lg shadow-sm border border-gray-200" style="display: <?= $calculator->getValue('villaType') !== 'couple-promo' && ($calculator->getValue('packageType') || $calculator->getValue('villaType')) ? 'block' : 'none' ?>">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">
                            <?php 
                            if ($calculator->getValue('villaType') === 'none') echo '3';
                            elseif ($calculator->getValue('villaType')) echo '2';
                            ?>. Add-ons (Optional)
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Enhance your experience</p>
                    </div>
                    <div class="p-6 space-y-3">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="firewood" <?= $calculator->isChecked('firewood') ?> class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                </svg>
                                Firewood for Fire Pit - ₱100
                            </span>
                        </label>

                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="tent_rental" <?= $calculator->isChecked('tentRental') ?> class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Tent Rental - ₱300
                            </span>
                        </label>

                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="projector" <?= $calculator->isChecked('projector') ?> class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Smart Projector - ₱500
                            </span>
                        </label>

                        <?php if ($calculator->getValue('villaType') !== 'mi-carino'): ?>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="floating_tray" <?= $calculator->isChecked('floatingTray') ?> class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm">Floating Pool Tray - ₱150</span>
                            </label>
                        <?php endif; ?>

                        <?php if ($calculator->getValue('villaType') === 'mi-amore'): ?>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="gas_for_stove" <?= $calculator->isChecked('gasForStove') ?> class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm">Gas for 2-Burner Stove - ₱300</span>
                            </label>
                        <?php endif; ?>

                        <?php if ($calculator->getValue('villaType') === 'mi-carino'): ?>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Silog Breakfast (₱150/head)</label>
                                <input type="number" name="silog_breakfast" min="0" value="<?= $calculator->getValue('silogBreakfast') ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Number of breakfasts">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-blue-200 sticky top-24">
                    <div class="bg-blue-600 text-white p-6 rounded-t-lg">
                        <h2 class="text-lg font-semibold">Price Summary</h2>
                        <p class="text-sm text-blue-100 mt-1">Your estimated total</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center py-4 border-b border-gray-200">
                            <div>
                                <div class="font-semibold text-gray-900">Total</div>
                                <div class="text-xs text-gray-600">Estimated price</div>
                            </div>
                            <div class="text-2xl font-bold text-blue-600">₱<?= number_format($calculator->getTotal()) ?></div>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium transition-colors <?= $calculator->getTotal() === 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $calculator->getTotal() === 0 ? 'disabled' : '' ?>>
                            Calculate Price
                        </button>

                        <button type="button" onclick="window.location.href='<?= $_SERVER['PHP_SELF'] ?>'" class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-md hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 font-medium transition-colors">
                            Reset Calculator
                        </button>

                        <div class="text-xs text-gray-600 pt-4">
                            * This is an estimated price. Final pricing may vary. Please contact us for confirmation.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function handleVillaChange() {
            const villaType = document.getElementById('villa_type').value;
            
            document.getElementById('mi_amore_options').style.display = villaType === 'mi-amore' ? 'block' : 'none';
            document.getElementById('mi_carino_options').style.display = villaType === 'mi-carino' ? 'block' : 'none';
            document.getElementById('package_options').style.display = (villaType === 'none' || villaType === '') ? 'block' : 'none';
            document.getElementById('couple_promo_info').style.display = villaType === 'couple-promo' ? 'block' : 'none';
            document.getElementById('addons_section').style.display = villaType !== 'couple-promo' ? 'block' : 'none';
            
            if (villaType !== 'none') {
                document.getElementById('room_section').style.display = 'none';
            }
        }

        function handlePackageChange() {
            const packageType = document.getElementById('package_type').value;
            const villaType = document.getElementById('villa_type').value;
            
            document.getElementById('guest_count_section').style.display = packageType ? 'block' : 'none';
            document.getElementById('room_section').style.display = (packageType && villaType === 'none') ? 'block' : 'none';
            document.getElementById('addons_section').style.display = packageType ? 'block' : 'none';
        }

        function handleRoomChange() {
            const roomType = document.getElementById('room_type').value;
            document.getElementById('room_details').style.display = roomType ? 'block' : 'none';
        }

        // Auto-submit form on change for real-time calculation
        document.getElementById('calculatorForm').addEventListener('change', function() {
            this.submit();
        });
    </script>
</body>
</html>