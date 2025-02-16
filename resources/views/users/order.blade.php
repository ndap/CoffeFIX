<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Haven - Order Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50 dark:bg-amber-900 min-h-screen">

    <!-- Main Content -->
    <main class="pt-20 px-4 max-w-7xl mx-auto">
        <!-- Order Details Section -->
        <section id="order-details" class="space-y-6">
            <div class="bg-white dark:bg-amber-800 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-amber-900 dark:text-amber-50">Your Order</h2>
                <div class="mt-6 space-y-4">
                    <!-- Order Summary -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/menu/' . $menu->image) }}" alt="Product Image" class="w-24 h-24 object-cover rounded-lg">
                            <div>
                                <h3 class="text-lg font-semibold text-amber-900 dark:text-amber-50">{{ $menu->name }}</h3>
                                <p class="text-amber-500">{{ $menu->category }}</p>
                                <p class="text-amber-700">{{ $menu->price }}K</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-amber-900 dark:text-amber-50">x1</p>
                        </div>
                    </div>

                    <!-- Order Total -->
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-semibold text-amber-900 dark:text-amber-50">Total:</p>
                        <p class="text-lg font-semibold text-amber-700">{{ $menu->price }}K</p>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-amber-900 dark:text-amber-50">Shipping Information</h3>
                    <form class="space-y-4 mt-4">
                        <div>
                            <label for="address" class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-2">Address</label>
                            <input type="text" id="address" placeholder="Enter your address" class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-2">Phone Number</label>
                            <input type="tel" id="phone" placeholder="Enter your phone number" class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                    </form>
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <button onclick="placeOrder()" class="w-full bg-amber-800 hover:bg-amber-700 text-white py-3 rounded-lg font-medium">Place Order</button>
                </div>
            </div>
        </section>
    </main>
    <script>
        // Dark mode toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
        }

        // Navigation between sections
        function showSection(sectionId) {
            const sections = ['menu', 'orders', 'profile'];
            sections.forEach(section => {
                document.getElementById(section).classList.add('hidden');
            });

            document.getElementById(sectionId).classList.remove('hidden');
        }

        // Place order function
        function placeOrder() {
            const address = document.getElementById('address').value;
            const phone = document.getElementById('phone').value;

            if (address && phone) {
                alert(`Your order has been placed! Shipping to: ${address}, Phone: ${phone}`);
                window.location.href = '{{ route('dashboard') }}';
                // Add backend logic to process the order here
            } else {
                alert("Please enter all required information.");
            }
        }
    </script>
</body>

</html>
