<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Brew Haven</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen font-sans">
    <!-- Main Container -->
    <div class="relative min-h-screen flex items-center justify-center bg-amber-950">
        <!-- Background Image with Blur -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('assets/coffe1.png')}}"
                alt="Coffee latte art background"
                class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
        </div>

        <!-- Register Form Container -->
        <div class="relative w-full max-w-lg mx-4 my-8">
            <div class="bg-white/95 rounded-2xl shadow-xl p-8 md:p-10">
                <!-- Brand Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-amber-950">Join the</h1>
                    <h2 class="text-4xl font-bold text-amber-800">Brew Haven Community</h2>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>

                @endif
                <!-- Register Form -->
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Full Name Field -->
                    <div>
                        <label for="fullname" class="block text-sm font-medium text-amber-900 mb-1">
                            User name
                        </label>
                        <input
                            type="text"
                            id="fullname"
                            name="name"
                            placeholder="Enter your user name"
                            class="w-full px-4 py-3 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition"
                            required
                        />
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-amber-900 mb-1">
                            Email Address
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            class="w-full px-4 py-3 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition"
                            required
                        />
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-amber-900 mb-1">
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                            class="w-full px-4 py-3 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition"
                            required
                        />
                    </div>

                    <!-- Terms and Conditions Checkbox -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                type="checkbox"
                                id="terms"
                                class="w-4 h-4 border-amber-300 rounded focus:ring-amber-500 text-amber-600"
                                required
                            />
                        </div>
                        <label for="terms" class="ml-2 text-sm text-amber-900">
                            I agree to the
                            <a href="#" class="text-amber-700 hover:text-amber-500 font-medium">Terms & Conditions</a>
                        </label>
                    </div>

                    <!-- Sign Up Button -->
                    <button
                        type="submit"
                        class="w-full bg-amber-800 hover:bg-amber-700 text-white py-3 rounded-lg font-medium transition duration-200 transform hover:scale-[1.02]"
                    >
                        Sign Up
                    </button>

                    <!-- Login Link -->
                    <div class="text-center text-sm">
                        <span class="text-amber-900">Already have an account? </span>
                        <a href="{{ route('login') }}" class="text-amber-700 hover:text-amber-500 font-medium transition">
                            Login here
                        </a>
                    </div>
                </form>

                <!-- Social Icons & Copyright -->
                <div class="mt-8 pt-6 border-t border-amber-100">
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="text-amber-700 hover:text-amber-500 transition">
                            <i data-feather="instagram" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="text-amber-700 hover:text-amber-500 transition">
                            <i data-feather="facebook" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="text-amber-700 hover:text-amber-500 transition">
                            <i data-feather="twitter" class="w-5 h-5"></i>
                        </a>
                    </div>
                    <div class="text-center mt-4 text-sm text-amber-900">
                        &copy; 2024 Brew Haven. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
</body>
</html>
