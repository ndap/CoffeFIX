<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Haven - Your Daily Brew, Perfected</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans">

    @if (session('logout'))
        <div class="bg-green-500 text-white text-center py-4">
            {{ session('logout') }}
        </div>
    @endif
    <!-- Hero Section -->
    <div class="relative h-screen flex items-center justify-center bg-amber-950">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="{{ asset('assets/coffe1.png') }}" alt="Coffee cup with latte art"
            class="absolute inset-0 w-full h-full object-cover" />
        <div class="relative text-center text-white px-4 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-4">Your Daily Brew, Perfected</h1>
            <p class="text-xl md:text-2xl mb-8">Experience coffee crafted with passion and precision</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}">
                    <button
                        class="bg-amber-800 hover:bg-amber-700 text-white px-8 py-3 rounded-full font-medium transition">
                        Order Now
                    </button>
                </a>
                <button
                    class="border-2 border-white hover:bg-white/20 text-white px-8 py-3 rounded-full font-medium transition">
                    Learn More
                </button>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="py-20 bg-amber-50">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <h2 class="text-4xl font-bold text-amber-950 mb-6">Our Story</h2>
                <p class="text-lg text-amber-900 mb-6">
                    Di Brew Haven, kami percaya bahwa setiap cangkir kopi menceritakan sebuah kisah. Biji kopi kami yang
                    diperoleh dengan cermat, barista terampil, dan metode pembuatan bir tradisional bersatu untuk
                    menciptakan pengalaman yang membangkitkan indra Anda dan memperkaya hari Anda.


                </p>
                <p class="text-lg text-amber-900">
Dari biji hingga cangkir, kami menjaga standar kualitas dan keberlanjutan tertinggi, memastikan
                    bahwa setiap tegukan mencerminkan komitmen kami terhadap keunggulan kopi.
                </p>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('assets/coffe2.webp') }}" alt="Coffee brewing process"
                    class="rounded-lg shadow-xl w-full" />
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <div class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-amber-950 text-center mb-12">Our Menu</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Coffee Menu -->
                <div class="bg-amber-50 rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-amber-900 mb-6">Coffee</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Signature Latte</h4>
                                <p class="text-sm text-amber-700">Rich espresso with velvety steamed milk</p>
                            </div>
                            <span class="font-medium text-amber-900">45K</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Pour Over</h4>
                                <p class="text-sm text-amber-700">Single-origin beans, hand-brewed</p>
                            </div>
                            <span class="font-medium text-amber-900">35K</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Cappuccino</h4>
                                <p class="text-sm text-amber-700">Perfect balance of espresso, milk, and foam</p>
                            </div>
                            <span class="font-medium text-amber-900">40K</span>
                        </div>
                    </div>
                </div>

                <!-- Snacks Menu -->
                <div class="bg-amber-50 rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-amber-900 mb-6">Snacks</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Croissant</h4>
                                <p class="text-sm text-amber-700">Butter-rich, flaky pastry</p>
                            </div>
                            <span class="font-medium text-amber-900">25K</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Coffee Cake</h4>
                                <p class="text-sm text-amber-700">House-made daily</p>
                            </div>
                            <span class="font-medium text-amber-900">30K</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Sandwich</h4>
                                <p class="text-sm text-amber-700">Fresh-baked sourdough</p>
                            </div>
                            <span class="font-medium text-amber-900">35K</span>
                        </div>
                    </div>
                </div>

                <!-- Specialty Menu -->
                <div class="bg-amber-50 rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-amber-900 mb-6">Specialty</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Cold Brew</h4>
                                <p class="text-sm text-amber-700">24-hour steeped coffee</p>
                            </div>
                            <span class="font-medium text-amber-900">38K</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Affogato</h4>
                                <p class="text-sm text-amber-700">Espresso over vanilla gelato</p>
                            </div>
                            <span class="font-medium text-amber-900">42K</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-amber-950">Mocha</h4>
                                <p class="text-sm text-amber-700">Espresso with dark chocolate</p>
                            </div>
                            <span class="font-medium text-amber-900">48K</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-amber-950 text-amber-50 py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <i data-feather="mail" class="w-4 h-4"></i>
                            <span>uyul@brewhaven.com</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-feather="phone" class="w-4 h-4"></i>
                            <span>+62 123 456 789</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Hours</h3>
                    <div class="flex items-center gap-2">
                        <i data-feather="clock" class="w-4 h-4"></i>
                        <div>
                            <p>Mon-Fri: 7am - 10pm</p>
                            <p>Sat-Sun: 8am - 11pm</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Location</h3>
                    <p>Jln raya wanaherang</p>
                    <p>Gunung Putri, Indonesia</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                    <div class="flex gap-4">
                        <i data-feather="instagram" class="w-6 h-6 hover:text-amber-300 cursor-pointer transition"></i>
                        <i data-feather="facebook" class="w-6 h-6 hover:text-amber-300 cursor-pointer transition"></i>
                        <i data-feather="twitter" class="w-6 h-6 hover:text-amber-300 cursor-pointer transition"></i>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-amber-900 text-center">
                <p>&copy; 2025 Brew Haven. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
</body>

</html>
