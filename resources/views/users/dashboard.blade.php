<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Haven - User Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50 dark:bg-amber-900 min-h-screen">
    <!-- Navigation Bar -->
    <nav class="bg-white dark:bg-amber-800 shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <!-- Logo and Navigation Links -->
                <div class="flex items-center space-x-8">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold text-amber-900 dark:text-amber-50">Brew Haven</h1>
                    </div>
                    <div class="hidden md:flex space-x-4">
                        <button onclick="showSection('menu')"
                            class="text-amber-900 dark:text-amber-50 hover:text-amber-700 px-3 py-2 rounded-md">Home</button>
                    </div>
                </div>

                <!-- Right Side Nav Items -->
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()"
                        class="p-2 rounded-lg hover:bg-amber-100 dark:hover:bg-amber-700">
                        <i data-feather="moon" class="w-5 h-5 text-amber-900 dark:text-amber-50"></i>
                    </button>

                    <!-- Shopping Cart -->

                    <!-- User Menu -->
                    <div class="relative">
                        <button onclick="toggleUserMenu()"
                            class="p-2 rounded-full hover:bg-amber-100 dark:hover:bg-amber-700">
                            <p class="text-amber-50 hidden sm:block">{{ Auth::user()->name }}</p>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="user-menu"
                            class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-amber-800 rounded-lg shadow-lg py-1">
                            <button onclick="showSection('profile')"
                                class="block px-4 py-2 text-sm text-amber-900 dark:text-amber-50 hover:bg-amber-100 dark:hover:bg-amber-700 w-full text-left">Profile</button>
                            <button onclick="logout()"
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100 w-full text-left">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 px-4 max-w-7xl mx-auto">
        <!-- Menu Section -->
        <section id="menu" class="space-y-6">
            <!-- Search and Filter -->
            <div
                class="flex flex-col md:flex-row gap-4 items-center justify-between bg-white dark:bg-amber-800 p-4 rounded-lg shadow">
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <form action="{{ route('dashboard') }}" method="GET">
                            <input type="text" name="search" placeholder="Search menu..."
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50"
                                value="{{ request('search') }}" />
                            <i data-feather="search" class="absolute left-3 top-2.5 w-5 h-5 text-amber-400"></i>
                        </form>
                    </div>
                </div>
                <div class="flex gap-4">
                    <form action="{{ route('dashboard') }}" method="GET">
                        <select name="category"
                            class="px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50">
                            <option value="">All Categories</option>
                            <option value="coffee">Coffee</option>
                            <option value="snacks">Snacks</option>
                            <option value="specialty">Specialty</option>
                        </select>
                        <select name="price_range"
                            class="px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50">
                            <option value="">Price Range</option>
                            <option value="0-50">Under 50K</option>
                            <option value="50-100">50K - 100K</option>
                            <option value="100+">Above 100K</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-amber-500 text-white rounded-lg">Filter</button>
                    </form>
                </div>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($menus as $menu)
                <a href="{{ route('buy', $menu->id) }}">
                    <div class="bg-white dark:bg-amber-800 p-4 rounded-lg shadow">
                        @if ($menu->image)
                            <img src="{{ asset('storage/menu/' . $menu->image) }}" alt="{{ $menu->name }}"
                                class="w-full h-48 object-cover mb-4">
                        @endif
                        <h3 class="text-lg font-semibold text-amber-50">{{ $menu->name }}</h3>
                        <p class="text-amber-500">{{ $menu->category }}</p>
                        <p class="text-amber-700">{{ $menu->price }}K</p>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

        <!-- Order History Section -->
        <section id="orders" class="hidden space-y-6">
            <h2 class="text-2xl font-bold text-amber-900 dark:text-amber-50">Order History</h2>
            <div class="bg-white dark:bg-amber-800 rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-amber-100 dark:bg-amber-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                    Order ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                    Date</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                    Items</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                    Total</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-amber-100 dark:divide-amber-700">
                            <tr>
                                <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">#001</td>
                                <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">2024-01-29</td>
                                <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">Signature Latte x2</td>
                                <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">90K</td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Completed</span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <button class="text-amber-600 hover:text-amber-800">Reorder</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Profile Section -->
        <section id="profile" class="hidden space-y-6">
            <h2 class="text-2xl font-bold text-amber-900 dark:text-amber-50">Profile Settings</h2>
            <div class="bg-white dark:bg-amber-800 rounded-lg shadow-md p-6">
                <form class="space-y-6">
                    <div class="flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            <img src="/api/placeholder/100/100" alt="Profile picture"
                                class="h-24 w-24 rounded-full" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file"
                                class="block w-full text-sm text-amber-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Full
                                Name</label>
                            <input type="text" value="John Doe"
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Email</label>
                            <input type="email" value="john@example.com"
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Phone</label>
                            <input type="tel" value="+1234567890"
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-amber-800 hover:bg-amber-700 text-white px-6 py-2 rounded-lg">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Shopping Cart Sidebar -->
    <div id="cart-sidebar"
        class="fixed top-0 right-0 h-full w-80 bg-white dark:bg-amber-800 shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="p-4 h-full flex flex-col">
            <div class="flex justify-between items-center border-b border-amber-200 dark:border-amber-700 pb-4">
                <h3 class="text-lg font-bold text-amber-900 dark:text-amber-50">Shopping Cart</h3>
                <button onclick="toggleCart()" class="text-amber-900 dark:text-amber-50 hover:text-amber-700">
                    <i data-feather="x" class="w-5 h-5"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto py-4">
                <!-- Cart Items -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <img src="/api/placeholder/60/60" alt="Signature Latte"
                            class="w-16 h-16 rounded-lg object-cover" />
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-amber-900 dark:text-amber-50">Signature Latte</h4>
                            <p class="text-sm text-amber-600 dark:text-amber-200">45K x 1</p>
                        </div>
                        <button class="text-red-500 hover:text-red-700">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-amber-200 dark:border-amber-700 pt-4">
                <div class="flex justify-between mb-4">
                    <span class="text-amber-900 dark:text-amber-50">Total:</span>
                    <span class="text-lg font-bold text-amber-900 dark:text-amber-50">45K</span>
                </div>
                <button class="w-full bg-amber-800 hover:bg-amber-700 text-white py-3 rounded-lg font-medium">
                    Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- Live Chat Widget -->
    <div class="fixed bottom-4 right-4 z-40">
        <button onclick="toggleChat()" class="bg-amber-800 hover:bg-amber-700 text-white p-4 rounded-full shadow-lg">
            <i data-feather="message-circle" class="w-6 h-6"></i>
        </button>
    </div>

    <script>
        // Initialize Feather Icons
        feather.replace();

        // Dark mode toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
        }

        // Navigation
        function showSection(sectionId) {
            // Hide all sections
            document.getElementById('menu').classList.add('hidden');
            document.getElementById('orders').classList.add('hidden');
            document.getElementById('profile').classList.add('hidden');

            // Show selected section
            document.getElementById(sectionId).classList.remove('hidden');
        }

        // Cart functionality
        let cartVisible = false;

        function toggleCart() {
            const cart = document.getElementById('cart-sidebar');
            cartVisible = !cartVisible;
            cart.style.transform = cartVisible ? 'translateX(0)' : 'translateX(100%)';
        }

        // User menu toggle
        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }

        let cartCount = 0;

        function addToCart(itemId) {
            cartCount++;
            document.getElementById('cart-count').textContent = cartCount;
            // Add animation effect
            document.getElementById('cart-count').classList.add('scale-125');
            setTimeout(() => {
                document.getElementById('cart-count').classList.remove('scale-125');
            }, 200);
            // Show cart
            if (!cartVisible) {
                toggleCart();
            }
        }

        // Live chat toggle
        let chatVisible = false;

        function toggleChat() {
            chatVisible = !chatVisible;
            // Add your chat widget implementation here
        }

        // Logout functionality
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                // Add your logout logic here
                window.location.href = '/login';
            }
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userButton = event.target.closest('button');

            if (!userButton && !userMenu.classList.contains('hidden')) {
                userMenu.classList.add('hidden');
            }
        });

        // Add favorite functionality
        function toggleFavorite(itemId) {
            const heartIcon = event.currentTarget.querySelector('i');
            heartIcon.classList.toggle('fill-current');
        }
    </script>
</body>

</html>
