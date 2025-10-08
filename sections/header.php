
<header id="header" class="fixed top-0 w-full bg-transparent transition-colors duration-300 shadow z-50 absolute inset-x-0 max-w-full mx-auto lg:px-20 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <img src="img/logo.png" class="w-32 h-15 object-cover" alt="Logo">
    <nav class="space-x-4">

                <div class="space-x-4">
                    <a id="package" href="packages.php"
                        class="px-4 py-2 text-sm rounded-lg border-2 border-white-50 bg-white/10 text-white border-white hover:bg-white/20">
                        Packages
                    </a>
                    <a id="price" href="pages/pricecalc.php"
                        class="px-4 py-2 text-sm rounded-lg text-white bg-emerald-900 hover:bg-emerald-950">
                        Get Estimated Price
                    </a>
    </nav>
  </div>
</header>

<script>
window.addEventListener('scroll', function(){
  const h = document.getElementById('header');
  const p= document.getElementById('package');
  const r= document.getElementById('price');
  if(window.scrollY > 50){
    h.classList.add('bg-emerald-900','shadow');
    h.classList.remove('bg-transparent');
    p.classList.add('text-emerald-950','shadow', "border-white");
    r.classList.add('bg-emerald-950');
    p.classList.remove('bg-white/10','shadow', "border-white");
  } else {
    h.classList.remove('bg-emerald-900','shadow');
    r.classList.add('bg-emerald-900');
    r.classList.remove('bg-emerald-950');
    h.classList.add('bg-transparent');
    p.classList.add('text-emerald-950','shadow', "border-white");
  }
});
</script>