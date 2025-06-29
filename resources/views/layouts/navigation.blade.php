<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-10">
                <!-- Logo/Tulisan -->
                <a href="{{ url('/') }}" class="text-2xl font-bold text-babyblue">Glow Stories</a>

                <!-- Menu Navigasi -->
                <div class="flex items-center space-x-6 text-sm font-medium">
                    <a href="/" class="text-gray-700 hover:text-babyblue">Home</a>
                    <a href="#" class="text-gray-700 hover:text-babyblue">Promo</a>
                    <a href="#" class="text-gray-700 hover:text-babyblue">Brand</a>
                    <a href="#" class="text-gray-700 hover:text-babyblue">Best Sellers</a>
                </div>
            </div>

            <!-- Ikon Keranjang dan Notifikasi -->
            <div class="flex items-center space-x-4">
                <a href="#">
                    <img src="{{ asset('images/keranjang.png') }}" alt="Keranjang" class="h-6 w-6 object-contain">
                </a>
                <a href="#">
                    <img src="{{ asset('images/lonceng.png') }}" alt="Notifikasi" class="h-6 w-6 object-contain">
                </a>
            </div>
        </div>
    </div>
</nav>
