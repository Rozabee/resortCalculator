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
        "image" => "https://images.unsplash.com/photo-1697216563517-e48622ba218c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
    ],
    [
        "name" => "Night Tour",
        "time" => "7:00 PM – 6:00 AM",
        "price" => "₱5,900",
        "capacity" => "30 pax",
        "description" => " Evening relaxation under the stars. Experience the magic of Casa Celerina at night with our illuminated pools, bonfire setup, and free videoke. Perfect for creating unforgettable memories with friends and family.",
        "image" => "https://images.unsplash.com/photo-1663312790104-c16cd011b761?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
    ],
    [
        "name" => "22-Hour Stay",
        "time" => "7:00 AM – 6:00 AM (next day)",
        "price" => "₱8,900",
        "capacity" => "30 pax",
        "description" => " Full day and night experience. The ultimate getaway package combining both day and night tours. Enjoy the complete Casa Celerina experience from sunrise to sunset and beyond. All amenities included, rooms available for add-on.",
        "label" => "Best Value",
        "labelColor" => "#d4a574",
        "image" => "https://images.unsplash.com/photo-1759400616241-d933eb0dd6df?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
    ]
];



$rooms = [
    [
        "name" => "Standard Nipa Hut",
        "type" => "Fan-cooled",
        "capacity" => "3 pax (max 4)",
        "price" => "₱1,000",
        "extraBed" => "₱350",
        "image" => "https://images.unsplash.com/photo-1723165065325-3d5a8646f824?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxydXN0aWMlMjBuaXBhJTIwaHV0fGVufDF8fHx8MTc1OTgyNzAxNXww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral",
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
        "image" => "https://images.unsplash.com/photo-1690832307571-d78b5d346651?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjB2aWxsYSUyMGJlZHJvb218ZW58MXx8fHwxNzU5ODA2MTg3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral",
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

?>
