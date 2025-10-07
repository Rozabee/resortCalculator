<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASA CELERINA</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>



</head>

<body>
    <div class="min-h-screen bg-neutral-800">
        <?php
        include("sections/header.php");
        ?>
        <!-- <header class="fixed top-0 w-full bg-white z-50 absolute inset-x-0 max-w-full mx-auto lg:px-20 z-50">
            <nav class="flex items-center justify-between">
                <a href="/dashboard" class="font-medium rounded-xl text-white hover:text-emerald-200">
                    <img src="img/logo.png" class="w-40 h-40" />
                </a>
                <div class="space-x-4">
                    <a href="packages.php"
                        class="px-4 py-2 text-sm rounded-lg text-white border border-white hover:bg-emerald-700">
                        Packages
                    </a>
                    <a href="estimation.php"
                        class="px-4 py-2 text-sm rounded-lg text-white bg-emerald-900 hover:bg-emerald-950">
                        Get Estimated Price
                    </a>
                </div>
            </nav>
        </header> -->

        <section class="relative h-screen flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 z-0  mask-b-from-80% mask-b-to-100% ">
                <img
                    src="img/casa.jpg"
                    alt="Casa Celerina Resort"
                    class="w-full h-full object-cover bg-fixed" />
                <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/60 "></div>
            </div>

            <div class="relative z-10 text-center text-white px-4 max-w-4xl ">
                <!-- <a class="bg-emerald-800 text-white border-white hover:bg-emerald-700 rounded-lg px-3">A Private Natural Getaway</a> -->
                <h1 class="font-serif font-normal text-5xl px-5 md:text-6xl lg:text-6xl mb-6 text-white">A retreat rooted in nature, crafted for rest, and remembered for a <i>lifetime</i>.</h1>
                <!-- <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Your Private Getaway with Pools, Villas & Nature Vibes
                </p> -->
                <!-- <div class="flex flex-col sm:flex-row gap-4 justify-center">

                    <Button size="lg" variant="outline" class="bg-white/10 text-white border-white">
                        Calculate Your Stay
                    </Button>
                    <Button size="lg" variant="outline" class="bg-emerald-800 text-white border-white hover:bg-emerald-700">
                        Explore Amenities
                    </Button>
                </div> -->
            </div>

             <!-- Scroll Down Indicator -->
    <div class="absolute bottom-1 text-white text-center">
       <!-- Concentric Circles -->
    <div class="relative flex items-center justify-center">
      
      <!-- Largest Circle -->
      <div class="absolute w-[200px] h-[200px] rounded-full border border-dotted border-white opacity-35"></div>
      
      <!-- Medium Circle -->
      <div class="absolute w-[150px] h-[150px] rounded-full border border-dotted border-white opacity-60"></div>
      
      <!-- Smallest Circle with text inside -->
      <div class="absolute w-[100px] h-[100px] rounded-full border border-dotted border-white flex items-top justify-center ">
        <p class="text-white text-xs tracking-widest opacity-100 mt-4">
          EXPLORE<br>MORE
        </p>
      </div>

    </div>
      </div>

      
        </section>





        <?php

        //include("sections/promo.php");
        include("sections/amenities.php");
        include("sections/dayNight.php");
        include("sections/rooms.php");
        
        ?>

    

    </div>



</body>

</html>