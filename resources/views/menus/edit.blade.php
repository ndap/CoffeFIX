<!-- filepath: /C:/laragon/www/coffeBrew/resources/views/menus/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto p-6 bg-white dark:bg-amber-800 rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold text-amber-900 dark:text-amber-50 mb-6">Edit Menu Item</h2>
        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Name</label>
                <input type="text" name="name" value="{{ $menu->name }}" required
                    class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Category</label>
                <select name="category" required
                    class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50">
                    <option value="Regular" {{ $menu->category == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option value="Specialty" {{ $menu->category == 'Specialty' ? 'selected' : '' }}>Specialty</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Price</label>
                <input type="text" name="price" value="{{ $menu->price }}" required
                    class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Stock Status</label>
                <select name="stock" required
                    class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50">
                    <option value="Available" {{ $menu->stock == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Out of Stock" {{ $menu->stock == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-amber-900 dark:text-amber-50 mb-1">Image</label>
                <input type="file" name="image"
                    class="w-full px-4 py-2 rounded-lg border border-amber-200 dark:border-amber-700 focus:ring-2 focus:ring-amber-500 dark:bg-amber-900 dark:text-amber-50" />
                @if ($menu->image)
                    <img src="{{ asset('storage/menu/' . $menu->image) }}" alt="Image" class="w-20 h-20 object-cover rounded-full mt-2">
                @endif
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-amber-800 hover:bg-amber-700 text-white px-4 py-2 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</body>
</html>