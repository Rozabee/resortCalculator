<?php
class PriceCalculator {
    private $packageType = '';
    private $guestCount = 0;
    private $roomType = '';
    private $roomCount = 0;
    private $extraBeds = 0;
    private $villaType = '';
    private $villaPaxRange = '';
    private $villaStayType = '';
    
    // Add-ons
    private $firewood = false;
    private $tentRental = false;
    private $projector = false;
    private $floatingTray = false;
    private $gasForStove = false;
    private $silogBreakfast = 0;
    
    private $total = 0;
    
    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->loadFromPost();
            $this->calculateTotal();
        }
    }
    
    private function loadFromPost() {
        $this->packageType = $_POST['package_type'] ?? '';
        $this->guestCount = intval($_POST['guest_count'] ?? 0);
        $this->roomType = $_POST['room_type'] ?? '';
        $this->roomCount = intval($_POST['room_count'] ?? 0);
        $this->extraBeds = intval($_POST['extra_beds'] ?? 0);
        $this->villaType = $_POST['villa_type'] ?? '';
        $this->villaPaxRange = $_POST['villa_pax_range'] ?? '';
        $this->villaStayType = $_POST['villa_stay_type'] ?? '';
        
        $this->firewood = isset($_POST['firewood']);
        $this->tentRental = isset($_POST['tent_rental']);
        $this->projector = isset($_POST['projector']);
        $this->floatingTray = isset($_POST['floating_tray']);
        $this->gasForStove = isset($_POST['gas_for_stove']);
        $this->silogBreakfast = intval($_POST['silog_breakfast'] ?? 0);
    }
    
    private function calculateTotal() {
        $calculatedTotal = 0;
        
        // Package pricing
        if ($this->packageType && $this->villaType !== 'mi-amore' && $this->villaType !== 'mi-carino' && $this->villaType !== 'couple-promo') {
            $packagePrices = [
                'day-tour' => 4900,
                'night-tour' => 5900,
                '22-hour' => 8900,
            ];
            $calculatedTotal += $packagePrices[$this->packageType] ?? 0;
            
            // Excess guest fee (over 30 pax)
            if ($this->guestCount > 30) {
                $calculatedTotal += ($this->guestCount - 30) * 100;
            }
        }
        
        // Room pricing
        if ($this->roomType && $this->roomCount > 0) {
            $roomPrices = [
                'nipa-hut' => 1000,
                'twin-house' => 1350,
            ];
            $calculatedTotal += ($roomPrices[$this->roomType] ?? 0) * $this->roomCount;
            
            // Extra beds
            if ($this->extraBeds > 0) {
                $calculatedTotal += $this->extraBeds * 350;
            }
            
            // 22-hour upgrade for rooms
            if ($this->packageType === '22-hour' && $this->roomCount > 0) {
                $calculatedTotal += $this->roomCount * 500;
            }
        }
        
        // Villa pricing - Mi Amore

        //NOTE: MAKE THIS MINIMUM PRICE, THEN MAKE ANOTHER IF ELSE FOR THE PAX RANGE OPTION SWITCH
        if ($this->villaType == 'mi-amore' && $this->villaType !== 'mi-carino' && $this->villaType !== 'couple-promo') {
            $miAmorePrices = [
                'day-tour' => 6500,
                'overnight' => 6500,
                '22-hour' => 8500,
                // 'day-tour' => ['4-6' => 6500, '7-8' => 7500, '9-10' => 8500],
                // 'overnight' => ['4-6' => 6500, '7-8' => 7500, '9-10' => 8500],
                // '22-hour' => ['4-6' => 8500, '7-8' => 10500, '9-10' => 11500],
            ];
            
            $calculatedTotal += $miAmorePrices[$this->villaStayType] ??0;
            
            if ($this->villaStayType == 'day-tour' ) {
                $miBmorePaxPrices = [
                    '4-6' => '',
                    '7-8' => 7500,
                    '9-10' => 8500,
                ];
            }
            
            $calculatedTotal += $miBmorePaxPrices[$this->villaPaxRange] ??0;
            // elseif ($this->villaStayType !== 'day-tour' && $this->villaStayType == 'overnight' && $this->villaStayType !== '22-hour') {
            //     $miBmorePaxPrices = [
            //         '4-6' => 6500,
            //         '7-8' => 7500,
            //         '9-10' => 8500,
                
            //     ];
            // }
            
        }
        
        // // Extra head fee
        // $maxPax = intval(explode('-', $this->villaPaxRange)[1]);
        // if ($this->guestCount > $maxPax) {
        //     $extraHeadFee = $this->villaStayType === '22-hour' ? 700 : 650;
        //     $calculatedTotal += ($this->guestCount - $maxPax) * $extraHeadFee;
        // }
        // Villa pricing - Mi Cariño
        if ($this->villaType === 'mi-carino') {
            $paxCount = intval($this->villaPaxRange);
            if ($paxCount === 2) {
                $calculatedTotal += 2950;
            } elseif ($paxCount >= 3) {
                $calculatedTotal += 3950;
            }
        }
        
        // Couple Promo
        if ($this->villaType === 'couple-promo') {
            $calculatedTotal = 2500;
        }
        
        // Add-ons
        if ($this->firewood) $calculatedTotal += 100;
        if ($this->tentRental) $calculatedTotal += 300;
        if ($this->projector) $calculatedTotal += 500;
        if ($this->floatingTray && $this->villaType !== 'mi-carino') $calculatedTotal += 150;
        if ($this->gasForStove) $calculatedTotal += 300;
        if ($this->silogBreakfast > 0) $calculatedTotal += $this->silogBreakfast * 150;
        
        $this->total = $calculatedTotal;
    }
    
    public function getTotal() {
        return $this->total;
    }
    
    public function getValue($field) {
        return $this->$field ?? '';
    }
    
    public function isChecked($field) {
        return $this->$field ? 'checked' : '';
    }
    
    public function isSelected($field, $value) {
        return $this->$field === $value ? 'selected' : '';
    }
}

$calculator = new PriceCalculator();
?>