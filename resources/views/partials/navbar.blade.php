<nav id="navbar" class="bg-slate-50 p-4 fixed w-screen shadow-md transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-lg font-semibold text-black">MyApp</a>
        <div class="space-x-4">
            <a href="#" class="text-black">Home</a>
            <a href="#" class="text-black">Products</a>
            <a href="#" class="text-black">Contact</a>
        </div>
    </div>
    <script>
        document.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'bg-opacity-30', 'text-black');
                navbar.classList.remove('bg-slate-50', 'text-black');
            } else {
                navbar.classList.add('bg-black-50', 'text-black');
                navbar.classList.remove('bg-black', 'bg-opacity-50', 'text-white');
            }
        });
    </script>
</nav>
