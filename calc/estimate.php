<?php
session_start();

// Initialize form data from session or defaults
$packageType = isset($_SESSION['packageType']) ? $_SESSION['packageType'] : '';
$guestCount = isset($_SESSION['guestCount']) ? (int)$_SESSION['guestCount'] : 0;
$roomType = isset($_SESSION['roomType']) ? $_SESSION['roomType'] : '';
$roomCount = isset($_SESSION['roomCount']) ? (int)$_SESSION['roomCount'] : 0;
$extraBeds = isset($_SESSION['extraBeds']) ? (int)$_SESSION['extraBeds'] : 0;
$villaType = isset($_SESSION['villaType']) ? $_SESSION['villaType'] : '';
$villaPaxRange = isset($_SESSION['villaPaxRange']) ? $_SESSION['villaPaxRange'] : '';
$villaStayType = isset($_SESSION['villaStayType']) ? $_SESSION['villaStayType'] : '';
$firewood = isset($_SESSION['firewood']) ? (bool)$_SESSION['firewood'] : false;
$tentRental = isset($_SESSION['tentRental']) ? (bool)$_SESSION['tentRental'] : false;
$projector = isset($_SESSION['projector']) ? (bool)$_SESSION['projector'] : false;
$floatingTray = isset($_SESSION['floatingTray']) ? (bool)$_SESSION['floatingTray'] : false;
$gasForStove = isset($_SESSION['gasForStove']) ? (bool)$_SESSION['gasForStove'] : false;
$silogBreakfast = isset($_SESSION['silogBreakfast']) ? (int)$_SESSION['silogBreakfast'] : 0;
$total = 0;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update session with form data
    $packageType = isset($_POST['packageType']) ? $_POST['packageType'] : '';
    $guestCount = isset($_POST['guestCount']) ? (int)$_POST['guestCount'] : 0;
    $roomType = isset($_POST['roomType']) ? $_POST['roomType'] : '';
    $roomCount = isset($_POST['roomCount']) ? (int)$_POST['roomCount'] : 0;
    $extraBeds = isset($_POST['extraBeds']) ? (int)$_POST['extraBeds'] : 0;
    $villaType = isset($_POST['villaType']) ? $_POST['villaType'] : '';
    $villaPaxRange = isset($_POST['villaPaxRange']) ? $_POST['villaPaxRange'] : '';
    $villaStayType = isset($_POST['villaStayType']) ? $_POST['villaStayType'] : '';
    $firewood = isset($_POST['firewood']);
    $tentRental = isset($_POST['tentRental']);
    $projector = isset($_POST['projector']);
    $floatingTray = isset($_POST['floatingTray']);
    $gasForStove = isset($_POST['gasForStove']);
    $silogBreakfast = isset($_POST['silogBreakfast']) ? (int)$_POST['silogBreakfast'] : 0;

    // Save to session
    $_SESSION['packageType'] = $packageType;
    $_SESSION['guestCount'] = $guestCount;
    $_SESSION['roomType'] = $roomType;
    $_SESSION['roomCount'] = $roomCount;
    $_SESSION['extraBeds'] = $extraBeds;
    $_SESSION['villaType'] = $villaType;
    $_SESSION['villaPaxRange'] = $villaPaxRange;
    $_SESSION['villaStayType'] = $villaStayType;
    $_SESSION['firewood'] = $firewood;
    $_SESSION['tentRental'] = $tentRental;
    $_SESSION['projector'] = $projector;
    $_SESSION['floatingTray'] = $floatingTray;
    $_SESSION['gasForStove'] = $gasForStove;
    $_SESSION['silogBreakfast'] = $silogBreakfast;

    // Calculate total
    $total = 0;

    // Package pricing
    if ($packageType && $villaType === 'none') {
        $packagePrices = [
            'day-tour' => 4900,
            'night-tour' => 5900,
            '22-hour' => 8900,
        ];
        $total += $packagePrices[$packageType] ?? 0;
        if ($guestCount > 30) {
            $total += ($guestCount - 30) * 100;
        }
    }

    // Room pricing
    if ($roomType && $roomCount > 0) {
        $roomPrices = [
            'nipa-hut' => 1000,
            'twin-house' => 1350,
        ];
        $total += ($roomPrices[$roomType] ?? 0) * $roomCount;
        if ($extraBeds > 0) {
            $total += $extraBeds * 350;
        }
        if ($packageType === '22-hour' && $roomCount > 0) {
            $total += $roomCount * 500;
        }
    }

    // Villa pricing - Mi Amore
    if ($villaType === 'mi-amore' && $villaStayType && $villaPaxRange) {
        $miAmorePrices = [
            'day-tour' => ['4-6' => 6500, '7-8' => 7500, '9-10' => 8500],
            'overnight' => ['4-6' => 6500, '7-8' => 7500, '9-10' => 8500],
            '22-hour' => ['4-6' => 8500, '7-8' => 10500, '9-10' => 11500],
        ];
        $total += $miAmorePrices[$villaStayType][$villaPaxRange] ?? 0;
        $maxPax = (int) explode('-', $villaPaxRange)[1];
        if ($guestCount > $maxPax) {
            $extraHeadFee = $villaStayType === '22-hour' ? 700 : 650;
            $total += ($guestCount - $maxPax) * $extraHeadFee;
        }
    }

    // Villa pricing - Mi Cariño
    if ($villaType === 'mi-carino' && $villaPaxRange) {
        $paxCount = (int) $villaPaxRange;
        if ($paxCount === 2) {
            $total += 2950;
        } elseif ($paxCount >= 3) {
            $total += 3950;
        }
    }

    // Couple Promo
    if ($villaType === 'couple-promo') {
        $total = 2500;
    }

    // Add-ons
    if ($firewood) $total += 100;
    if ($tentRental) $total += 300;
    if ($projector) $total += 500;
    if ($floatingTray && $villaType !== 'mi-carino') $total += 150;
    if ($gasForStove) $total += 300;
    if ($silogBreakfast > 0) $total += $silogBreakfast * 150;
}

// Reset form
if (isset($_POST['reset'])) {
    session_unset();
    $packageType = '';
    $guestCount = 0;
    $roomType = '';
    $roomCount = 0;
    $extraBeds = 0;
    $villaType = '';
    $villaPaxRange = '';
    $villaStayType = '';
    $firewood = false;
    $tentRental = false;
    $projector = false;
    $floatingTray = false;
    $gasForStove = false;
    $silogBreakfast = 0;
    $total = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#15803d', // Green
                        secondary: '#f0fdf4', // Light green
                        accent: '#22c55e', // Lighter green
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-secondary min-h-screen">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <a href="/PHP/casaCelerina/" class="inline-flex items-center text-primary hover:text-accent mb-2">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Home
            </a>
            <div class="flex items-center gap-3">
                <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                <div>
                    <h1 class="text-2xl text-primary">Price Calculator</h1>
                    <p class="text-sm text-gray-500">Get an instant estimate for your stay</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Booking Type Selection -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-primary">1. Choose Your Booking Type</h2>
                        <p class="text-sm text-gray-500">Select between packages, villas, or couple promo</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Villa or Package?</label>
                            <select name="villaType" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" onchange="this.form.submit()">
                                <option value="none" <?= $villaType === 'none' ? 'selected' : '' ?>>Regular Package (No Villa)</option>
                                <option value="mi-amore" <?= $villaType === 'mi-amore' ? 'selected' : '' ?>>Mi Amore Villa (Exclusive)</option>
                                <option value="mi-carino" <?= $villaType === 'mi-carino' ? 'selected' : '' ?>>Mi Cariño Villa (Private Room)</option>
                                <option value="couple-promo" <?= $villaType === 'couple-promo' ? 'selected' : '' ?>>Couple Promo (Weekdays)</option>
                            </select>
                        </div>
                        <?php if ($villaType === 'mi-amore'): ?>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Stay Type</label>
                                <select name="villaStayType" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" onchange="this.form.submit()">
                                    <option value="" <?= !$villaStayType ? 'selected' : '' ?>>Select stay type</option>
                                    <option value="day-tour" <?= $villaStayType === 'day-tour' ? 'selected' : '' ?>>Day Tour (8 AM–6 PM or 10 AM–8 PM)</option>
                                    <option value="overnight" <?= $villaStayType === 'overnight' ? 'selected' : '' ?>>Overnight (8 PM–6 AM or 10 PM–8 AM)</option>
                                    <option value="22-hour" <?= $villaStayType === '22-hour' ? 'selected' : '' ?>>22-Hour (12 NN–10 AM or 2 PM–12 NN)</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                <select name="villaPaxRange" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" onchange="this.form.submit()">
                                    <option value="" <?= !$villaPaxRange ? 'selected' : '' ?>>Select pax range</option>
                                    <option value="4-6" <?= $villaPaxRange === '4-6' ? 'selected' : '' ?>>4-6 pax</option>
                                    <option value="7-8" <?= $villaPaxRange === '7-8' ? 'selected' : '' ?>>7-8 pax</option>
                                    <option value="9-10" <?= $villaPaxRange === '9-10' ? 'selected' : '' ?>>9-10 pax</option>
                                </select>
                            </div>
                            <?php if ($villaPaxRange): ?>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Exact Guest Count (for excess calculation)</label>
                                    <input type="number" name="guestCount" min="4" max="15" value="<?= $guestCount ?: '' ?>" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" placeholder="Enter exact number" required>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($villaType === 'mi-carino'): ?>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                <select name="villaPaxRange" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" onchange="this.form.submit()">
                                    <option value="" <?= !$villaPaxRange ? 'selected' : '' ?>>Select guests</option>
                                    <option value="2" <?= $villaPaxRange === '2' ? 'selected' : '' ?>>2 pax</option>
                                    <option value="3" <?= $villaPaxRange === '3' ? 'selected' : '' ?>>3-4 pax</option>
                                </select>
                            </div>
                        <?php endif; ?>
                        <?php if ($villaType === 'none' || !$villaType): ?>
                            <hr class="border-gray-200">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Package Type</label>
                                <select name="packageType" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" onchange="this.form.submit()">
                                    <option value="" <?= !$packageType ? 'selected' : '' ?>>Select package</option>
                                    <option value="day-tour" <?= $packageType === 'day-tour' ? 'selected' : '' ?>>Day Tour - ₱4,900 (7 AM–5 PM)</option>
                                    <option value="night-tour" <?= $packageType === 'night-tour' ? 'selected' : '' ?>>Night Tour - ₱5,900 (7 PM–6 AM)</option>
                                    <option value="22-hour" <?= $packageType === '22-hour' ? 'selected' : '' ?>>22-Hour Stay - ₱8,900 (7 AM–6 AM)</option>
                                </select>
                            </div>
                            <?php if ($packageType): ?>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                    <input type="number" name="guestCount" min="1" value="<?= $guestCount ?: '' ?>" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" placeholder="Enter number of guests" required>
                                    <?php if ($guestCount > 30): ?>
                                        <p class="text-sm text-gray-500">₱100 per excess head over 30 pax</p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($villaType === 'couple-promo'): ?>
                            <div class="bg-secondary p-4 rounded-lg">
                                <p class="text-sm">Includes: 1 Air-conditioned Room, Free Breakfast, All Amenities (Shared resort use, weekdays only)</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Room Add-ons -->
                <?php if ($packageType && $villaType === 'none'): ?>
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-primary">2. Add Rooms (Optional)</h2>
                            <p class="text-sm text-gray-500">Max combined capacity: 14 pax</p>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Room Type</label>
                                <select name="roomType" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" onchange="this.form.submit()">
                                    <option value="" <?= !$roomType ? 'selected' : '' ?>>Select room type</option>
                                    <option value="nipa-hut" <?= $roomType === 'nipa-hut' ? 'selected' : '' ?>>Standard Nipa Hut (Fan) - ₱1,000</option>
                                    <option value="twin-house" <?= $roomType === 'twin-house' ? 'selected' : '' ?>>Twin House (Aircon) - ₱1,350</option>
                                </select>
                            </div>
                            <?php if ($roomType): ?>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Number of Rooms</label>
                                    <input type="number" name="roomCount" min="1" max="5" value="<?= $roomCount ?: '' ?>" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" placeholder="Enter number of rooms">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Extra Beds (₱350 each)</label>
                                    <input type="number" name="extraBeds" min="0" value="<?= $extraBeds ?: '' ?>" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" placeholder="Enter number of extra beds">
                                </div>
                                <?php if ($packageType === '22-hour'): ?>
                                    <div class="bg-secondary p-3 rounded-lg">
                                        <p class="text-sm">+ ₱500 per room for 22-hour upgrade</p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Add-ons -->
                <?php if ($villaType !== 'couple-promo'): ?>
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-primary"><?= ($packageType || $villaType) ? ($villaType === 'none' ? '3' : '2') : '' ?>. Add-ons (Optional)</h2>
                            <p class="text-sm text-gray-500">Enhance your experience</p>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="space-y-3">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="firewood" id="firewood" <?= $firewood ? 'checked' : '' ?> class="h-4 w-4 text-accent focus:ring-accent border-gray-300 rounded">
                                    <label for="firewood" class="text-sm cursor-pointer flex items-center gap-2">
                                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path></svg>
                                        Firewood for Fire Pit - ₱100
                                    </label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="tentRental" id="tent" <?= $tentRental ? 'checked' : '' ?> class="h-4 w-4 text-accent focus:ring-accent border-gray-300 rounded">
                                    <label for="tent" class="text-sm cursor-pointer flex items-center gap-2">
                                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-9 15-9-15z"></path></svg>
                                        Tent Rental - ₱300
                                    </label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="projector" id="projector" <?= $projector ? 'checked' : '' ?> class="h-4 w-4 text-accent focus:ring-accent border-gray-300 rounded">
                                    <label for="projector" class="text-sm cursor-pointer flex items-center gap-2">
                                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        Smart Projector - ₱500
                                    </label>
                                </div>
                                <?php if ($villaType !== 'mi-carino'): ?>
                                    <div class="flex items-center space-x-2">
                                        <input type="checkbox" name="floatingTray" id="floatingTray" <?= $floatingTray ? 'checked' : '' ?> class="h-4 w-4 text-accent focus:ring-accent border-gray-300 rounded">
                                        <label for="floatingTray" class="text-sm cursor-pointer">Floating Pool Tray - ₱150</label>
                                    </div>
                                <?php endif; ?>
                                <?php if ($villaType === 'mi-amore'): ?>
                                    <div class="flex items-center space-x-2">
                                        <input type="checkbox" name="gasForStove" id="gas" <?= $gasForStove ? 'checked' : '' ?> class="h-4 w-4 text-accent focus:ring-accent border-gray-300 rounded">
                                        <label for="gas" class="text-sm cursor-pointer">Gas for 2-Burner Stove - ₱300</label>
                                    </div>
                                <?php endif; ?>
                                <?php if ($villaType === 'mi-carino'): ?>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Silog Breakfast (₱150/head)</label>
                                        <input type="number" name="silogBreakfast" min="0" value="<?= $silogBreakfast ?: '' ?>" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-accent focus:border-accent" placeholder="Number of breakfasts">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Summary Section -->
            <div class="lg:col-span-1">
                <div class="bg-white shadow rounded-lg sticky top-24 border-primary/30">
                    <div class="bg-primary text-white px-6 py-4 rounded-t-lg">
                        <h2 class="text-lg font-semibold">Price Summary</h2>
                        <p class="text-sm text-white/80">Your estimated total</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <?php if ($packageType && $villaType === 'none'): ?>
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-sm"><?= $packageType === 'day-tour' ? 'Day Tour Package' : ($packageType === 'night-tour' ? 'Night Tour Package' : '22-Hour Package') ?></div>
                                    <?php if ($guestCount > 0): ?>
                                        <div class="text-xs text-gray-500"><?= $guestCount ?> guests</div>
                                    <?php endif; ?>
                                </div>
                                <div class="text-sm"><?= '₱' . number_format($packageType === 'day-tour' ? 4900 : ($packageType === 'night-tour' ? 5900 : 8900)) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($villaType === 'mi-amore' && $villaStayType && $villaPaxRange): ?>
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-sm">Mi Amore Villa</div>
                                    <div class="text-xs text-gray-500">
                                        <?= $villaStayType === 'day-tour' ? 'Day Tour' : ($villaStayType === 'overnight' ? 'Overnight' : '22-Hour') ?> • <?= $villaPaxRange ?> pax
                                    </div>
                                </div>
                                <div class="text-sm">
                                    ₱<?php
                                        $miAmorePrices = [
                                            'day-tour' => ['4-6' => 6500, '7-8' => 7500, '9-10' => 8500],
                                            'overnight' => ['4-6' => 6500, '7-8' => 7500, '9-10' => 8500],
                                            '22-hour' => ['4-6' => 8500, '7-8' => 10500, '9-10' => 11500],
                                        ];
                                        echo number_format($miAmorePrices[$villaStayType][$villaPaxRange] ?? 0);
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($villaType === 'mi-carino' && $villaPaxRange): ?>
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-sm">Mi Cariño Villa</div>
                                    <div class="text-xs text-gray-500"><?= $villaPaxRange === '2' ? '2 pax' : '3-4 pax' ?></div>
                                </div>
                                <div class="text-sm"><?= '₱' . number_format($villaPaxRange === '2' ? 2950 : 3950) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($villaType === 'couple-promo'): ?>
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-sm">Couple Promo</div>
                                    <div class="text-xs text-gray-500">Weekdays only</div>
                                </div>
                                <div class="text-sm">₱2,500</div>
                            </div>
                        <?php endif; ?>
                        <?php if ($guestCount > 30 && $packageType && $villaType === 'none'): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Excess guests (<?= $guestCount - 30 ?>)</div>
                                <div>₱<?= number_format(($guestCount - 30) * 100) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($villaType === 'mi-amore' && $villaPaxRange && $guestCount > 0):
                            $maxPax = (int) explode('-', $villaPaxRange)[1];
                            if ($guestCount > $maxPax): ?>
                                <div class="flex justify-between items-start text-sm">
                                    <div>Excess heads (<?= $guestCount - $maxPax ?>)</div>
                                    <div>₱<?= number_format(($guestCount - $maxPax) * ($villaStayType === '22-hour' ? 700 : 650)) ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($roomCount > 0 && $roomType): ?>
                            <hr class="border-gray-200">
                            <div class="flex justify-between items-start text-sm">
                                <div><?= $roomType === 'nipa-hut' ? 'Nipa Hut' : 'Twin House' ?> x<?= $roomCount ?></div>
                                <div>₱<?= number_format(($roomType === 'nipa-hut' ? 1000 : 1350) * $roomCount) ?></div>
                            </div>
                            <?php if ($packageType === '22-hour'): ?>
                                <div class="flex justify-between items-start text-sm">
                                    <div>22-hour room upgrade</div>
                                    <div>₱<?= number_format(500 * $roomCount) ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($extraBeds > 0): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Extra beds x<?= $extraBeds ?></div>
                                <div>₱<?= number_format(350 * $extraBeds) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($firewood || $tentRental || $projector || $floatingTray || $gasForStove || $silogBreakfast > 0): ?>
                            <hr class="border-gray-200">
                            <div class="text-sm text-gray-500">Add-ons:</div>
                        <?php endif; ?>
                        <?php if ($firewood): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Firewood</div>
                                <div>₱100</div>
                            </div>
                        <?php endif; ?>
                        <?php if ($tentRental): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Tent Rental</div>
                                <div>₱300</div>
                            </div>
                        <?php endif; ?>
                        <?php if ($projector): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Smart Projector</div>
                                <div>₱500</div>
                            </div>
                        <?php endif; ?>
                        <?php if ($floatingTray && $villaType !== 'mi-carino'): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Floating Pool Tray</div>
                                <div>₱150</div>
                            </div>
                        <?php endif; ?>
                        <?php if ($gasForStove): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Gas for Stove</div>
                                <div>₱300</div>
                            </div>
                        <?php endif; ?>
                        <?php if ($silogBreakfast > 0): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>Silog Breakfast x<?= $silogBreakfast ?></div>
                                <div>₱<?= number_format(150 * $silogBreakfast) ?></div>
                            </div>
                        <?php endif; ?>
                        <hr class="border-gray-200">
                        <div class="flex justify-between items-center pt-2">
                            <div>
                                <div>Total</div>
                                <div class="text-xs text-gray-500">Estimated price</div>
                            </div>
                            <div class="text-2xl text-primary">₱<?= number_format($total) ?></div>
                        </div>
                        <button type="submit" class="w-full bg-accent text-white py-2 rounded-md hover:bg-primary <?= $total === 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $total === 0 ? 'disabled' : '' ?>>Book Now</button>
                        <button type="submit" name="reset" class="w-full border border-primary text-primary py-2 rounded-md hover:bg-secondary mt-2">Reset Calculator</button>
                        <div class="text-xs text-gray-500 pt-4">* This is an estimated price. Final pricing may vary. Please contact us for confirmation.</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>