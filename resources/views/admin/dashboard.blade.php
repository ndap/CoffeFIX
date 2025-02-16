<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Brew Haven</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-amber-50 dark:bg-amber-900">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-amber-800 shadow-lg fixed h-full">
            <div class="p-4 border-b border-amber-100 dark:border-amber-700">
                <h1 class="text-xl font-bold text-amber-900 dark:text-amber-50">Brew Haven Admin</h1>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <button onclick="showSection('dashboard')"
                            class="w-full flex items-center space-x-2 py-2 px-4 rounded-lg hover:bg-amber-100 dark:hover:bg-amber-700 text-amber-900 dark:text-amber-50">
                            <i data-feather="home" class="w-5 h-5"></i>
                            <span>Dashboard</span>
                        </button>
                    </li>
                    <li>
                        <button onclick="showSection('manage-menu')"
                            class="w-full flex items-center space-x-2 py-2 px-4 rounded-lg hover:bg-amber-100 dark:hover:bg-amber-700 text-amber-900 dark:text-amber-50">
                            <i data-feather="coffee" class="w-5 h-5"></i>
                            <span>Manage Menu</span>
                        </button>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center space-x-2 py-2 px-4 rounded-lg hover:bg-red-100 dark:hover:bg-red-900 text-red-600 dark:text-red-400">
                                <i data-feather="log-out" class="w-5 h-5"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-8">
                <h2 id="page-title" class="text-2xl font-bold text-amber-900 dark:text-amber-50">Dashboard</h2>
                <button onclick="toggleDarkMode()"
                    class="p-2 rounded-lg hover:bg-amber-100 dark:hover:bg-amber-700 text-amber-900 dark:text-amber-50">
                    <i data-feather="moon" class="w-5 h-5"></i>
                </button>
            </div>
            <!-- Dashboard Section -->
            <section id="dashboard" class="space-y-8">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif

                @if (session('update'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('update') }}</span>
                    </div>

                @endif

                @if (session('delete'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('delete') }}</span>
                    </div>

                @endif

                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif
                <!-- Overview Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Menu Items -->
                    <div class="bg-white dark:bg-amber-800 p-6 rounded-xl shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-amber-600 dark:text-amber-200">Total Menu Items</p>
                                <h3 class="text-2xl font-bold text-amber-900 dark:text-amber-50">40
                                </h3>
                            </div>
                            <div class="p-3 bg-amber-100 dark:bg-amber-700 rounded-lg">
                                <i data-feather="coffee" class="w-6 h-6 text-amber-600 dark:text-amber-200"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Orders -->
                    <div class="bg-white dark:bg-amber-800 p-6 rounded-xl shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-amber-600 dark:text-amber-200">Total Orders</p>
                                <h3 class="text-2xl font-bold text-amber-900 dark:text-amber-50">156</h3>
                            </div>
                            <div class="p-3 bg-amber-100 dark:bg-amber-700 rounded-lg">
                                <i data-feather="shopping-bag" class="w-6 h-6 text-amber-600 dark:text-amber-200"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue -->
                    <div class="bg-white dark:bg-amber-800 p-6 rounded-xl shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-amber-600 dark:text-amber-200">Revenue</p>
                                <h3 class="text-2xl font-bold text-amber-900 dark:text-amber-50">Rp 12.5M</h3>
                            </div>
                            <div class="p-3 bg-amber-100 dark:bg-amber-700 rounded-lg">
                                <i data-feather="dollar-sign" class="w-6 h-6 text-amber-600 dark:text-amber-200"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Manage Menu Section -->
            <section id="manage-menu" class="hidden space-y-8">
                <!-- Add Menu Button -->
                <div class="flex justify-end">
                    <button onclick="showAddMenuForm()"
                        class="flex items-center space-x-2 bg-amber-800 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition">
                        <i data-feather="plus" class="w-5 h-5"></i>
                        <span>Add Menu Item</span>
                    </button>
                </div>

                <!-- Search Form -->

                <!-- Menu Table -->
                <div class="bg-white dark:bg-amber-800 rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-amber-100 dark:bg-amber-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                        Image</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                        Category</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                        Price</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                        Stock</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-amber-900 dark:text-amber-50">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-amber-100 dark:divide-amber-700">
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">{{ $menu->name }}</td>
                                        <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">
                                            @if ($menu->image)
                                                <img src="{{ asset('storage/menu/' . $menu->image) }}" alt="Image" class="w-10 h-10 object-cover rounded-full" />
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">{{ $menu->category }}</td>
                                        <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">{{ $menu->price }}</td>
                                        <td class="px-6 py-4 text-sm text-amber-900 dark:text-amber-50">{{ $menu->stock }}</td>
                                        <td class="px-6 py-4 text-sm space-x-2">
                                            <a href="{{ route('menus.edit', $menu->id) }}">
                                                <button class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                                    <i data-feather="edit" class="w-4 h-4"></i>
                                                </button>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400">
                                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Add more menu items here -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Add/Edit Menu Form Modal -->

            <form id="menu-form-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center"
                method="POST" action="{{ route('menus.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="bg-white dark:bg-amber-800 rounded-xl p-8 max-w-md w-full mx-4">
                    <h3 class="text-xl font-bold text-amber-900 dark:text-amber-50 mb-6">Add Menu Item</h3>
                    <div id="menu-form" class="space-y-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Name</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Image</label>
                            <input type="file" name="image"

                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Category</label>
                            <select name="category" required

                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50">
                                <option value="Coffee">Coffee</option>
                                <option value="Snacks">Snacks</option>
                                <option value="Specialty">Specialty</option>
                            </select>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Price</label>
                            <input type="text" name="price" required

                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Stock
                                Status</label>
                            <select name="stock" required
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50">
                                <option value="Available">Available</option>
                                <option value="Out of Stock">Out of Stock</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-4 mt-6">
                            <button type="button" onclick="closeMenuForm()"
                                class="px-4 py-2 text-amber-900 dark:text-amber-50 hover:bg-amber-100 dark:hover:bg-amber-700 rounded-lg">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-amber-800 hover:bg-amber-700 text-white rounded-lg">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
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
            document.getElementById('dashboard').classList.add('hidden');
            document.getElementById('manage-menu').classList.add('hidden');

            // Show selected section
            document.getElementById(sectionId).classList.remove('hidden');

            // Update page title
            document.getElementById('page-title').textContent =
                sectionId === 'dashboard' ? 'Dashboard' : 'Manage Menu';
        }

        // Menu Form Modal
        function showAddMenuForm() {
            document.getElementById('menu-form-modal').classList.remove('hidden');
            document.getElementById('menu-form-modal').classList.add('flex');
        }

        function closeMenuForm() {
            document.getElementById('menu-form-modal').classList.add('hidden');
            document.getElementById('menu-form-modal').classList.remove('flex');
        }

        // Form submission
        document.getElementById('menu-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            closeMenuForm();
        });

        // Menu Item Actions
        function editMenuItem(id) {
            showAddMenuForm();
            // Add your edit logic here
        }

        function deleteMenuItem(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                // Add your delete logic here
            }
        }

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                // Add your logout logic here
                window.location.href = '/login';
            }
        }
    </script>
</body>

</html>
