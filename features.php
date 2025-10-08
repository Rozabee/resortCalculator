<?php
// data.php


$packages = [
    [
        "name" => "Day Tour",
        "time" => "7:00 AM – 5:00 PM",
        "price" => "₱4,900",
        "capacity" => "30 pax",
        "description" => "Perfect for day trips and group bonding. Enjoy all resort amenities including our main pool, kiddie pool, cottages, tree house, fire pit, and more. Bring your own food or cook on our grillers – no corkage fees.",
        "label" => "Most Popular",
        "labelColor" => "#8b9d7c",
        "image" => "img/dayUpperdeck.png"
    ],
    [
        "name" => "Night Tour",
        "time" => "7:00 PM – 6:00 AM",
        "price" => "₱5,900",
        "capacity" => "30 pax",
        "description" => " Evening relaxation under the stars. Experience the magic of Casa Celerina at night with our illuminated pools, bonfire setup, and free videoke. Perfect for creating unforgettable memories with friends and family.",
        "image" => "img/nighttour.png"
    ],
    [
        "name" => "22-Hour Stay",
        "time" => "7:00 AM – 6:00 AM (next day)",
        "price" => "₱8,900",
        "capacity" => "30 pax",
        "description" => " Full day and night experience. The ultimate getaway package combining both day and night tours. Enjoy the complete Casa Celerina experience from sunrise to sunset and beyond. All amenities included, rooms available for add-on.",
        "label" => "Best Value",
        "labelColor" => "#d4a574",
        "image" => "img/natureview.png"
    ]
];



$rooms = [
    [
        "name" => "Standard Nipa Hut",
        "type" => "Fan-cooled",
        "capacity" => "3 pax (max 4)",
        "price" => "₱1,000",
        "extraBed" => "₱350",
        "image" => "img/nipahut.png",
        "features" => [
            "Rustic charm and authentic Filipino experience",
            "Detached toilet & bath for privacy",
            "Extra bed available for ₱350",
            "Add ₱500 for 22-hour stay upgrade"
        ],
        "icon" => "fan"
    ],
    [
        "name" => "Twin House",
        "type" => "Air-conditioned",
        "capacity" => "2 pax (max 4)",
        "price" => "₱1,350",
        "extraBed" => "₱350",
        "image" => "img/twinhouse.png",
        "features" => [
            "Cool comfort with air conditioning",
            "Cozy twin beds for couples or friends",
            "Detached toilet & bath facilities",
            "Extra bed available for ₱350",
            "Add ₱500 for 22-hour stay upgrade"
        ],
        "icon" => "air"
    ]
];


$villas = [
    [
        "id" => "mi-amore",
        "badge" => "Exclusive Villa",
        "badgeColor" => "#d4a574",
        "title" => "In our villas you'll find everything you need",
        "highlight" => "everything you need",
        "description" => "Mi Amore Villa offers an exclusive whole-resort rental experience. Perfect for intimate gatherings, family reunions, or group celebrations - enjoy complete privacy with all amenities at your disposal.",
        "features" => [
            "Spacious family room with 2 queen beds, pullouts, and extra mattresses for up to 10 guests",
            "55\" Smart TV with Netflix for entertainment",
            "Fully equipped mini kitchen with essential cooking tools and 2-burner stove",
            "Private toilet and bath with hot & cold shower",
            "Pet-friendly environment with board games and Instagram-worthy interiors"
        ],
        "images" => [
            "img/kitchen.png",
            "img/deckView.png",
            "img/queensizebed.png"
        ],
        "pricing" => [
            ["label" => "Day Tour (4-6 pax)", "price" => "₱6,500", "timeslot" => "8AM-6PM or 10AM-8PM"],
            ["label" => "Overnight (4-6 pax)", "price" => "₱6,500", "timeslot" => "8PM-6AM or 10PM-8AM"],
            ["label" => "22-Hour (4-6 pax)", "price" => "₱8,500", "timeslot" => "12NN-10AM or 2PM-12NN"]
        ],
        "note" => "Pricing varies for 7-8 pax and 9-10 pax. Extra head fee: ₱650 (Day/Overnight), ₱700 (22-Hour)",
        "buttonText" => "Calculate Full Price"
    ],
    [
        "id" => "mi-carino",
        "badge" => "Private Room",
        "badgeColor" => "#8b9d7c",
        "title" => "Cozy private comfort",
        "highlight" => "comfort",
        "description" => "Mi Cariño Villa offers a cozy private room experience with non-exclusive resort access. Perfect for couples or small groups seeking comfort and relaxation.",
        "features" => [
            "Aesthetically designed aircon villa",
            "Queen-size bed + extra mattress (for 3–4 pax)",
            "55” TV with Netflix",
            "Free bonfire setup",
            "Hot tub with tray, wine & phone holder",
            "Hammock",
            "Toiletries",
            "Complimentary coffee, creamer, sugar, and bottled water"
        ],
        "images" => [
            "img/toiletries.png",
            "img/carino.png",
            "img/fire.jpg",
            
        ],
        "pricing" => [
            ["label" => "For 2 pax", "price" => "₱2,950", "subtext" => "Day or Overnight (12 hrs)"],
            ["label" => "For 3-4 pax", "price" => "₱3,950", "subtext" => "Day or Overnight (12 hrs)"]
        ],
        "note" => "Maximum of 4 pax only. NOT inclusive use of the whole resort.",
        "buttonText" => "Book Mi Cariño Villa"
    ],
    [
        "id" => "couple-promo",
        "badgeColor" => "#8b9d7c",
        "title" => "💑 Special Couple Promo",
        "subtitle" => "Weekdays only",
        "features" => [
            "1 Air-conditioned Room",
            "Free Breakfast",
            "All Amenities Access",
            "Shared Resort Use"
        ],
        "price" => "₱2,500",
        "note" => "Weekdays only; shared resort use (not exclusive)",
        "buttonText" => "Book Promo"
    ]
];


?>
