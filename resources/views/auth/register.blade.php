<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Gudang Bahan Kue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #F5F1E8;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-8">
    <!-- Register Form Container -->
    <div class="w-full max-w-md">
        <div class="bg-gray-300 rounded-lg shadow-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-xl font-bold text-gray-800 tracking-wide">GUDANG BAHAN KUE</h1>
                <p class="text-sm text-gray-600 mt-2">Create New Account</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-center text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input id="name" 
                           class="w-full px-4 py-3 bg-gray-800 text-gray-300 rounded-md border-0 focus:outline-none focus:ring-0 focus:bg-gray-700" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="name" />
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-center text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input id="email" 
                           class="w-full px-4 py-3 bg-gray-800 text-gray-300 rounded-md border-0 focus:outline-none focus:ring-0 focus:bg-gray-700" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="username" />
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-center text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" 
                           class="w-full px-4 py-3 bg-gray-800 text-gray-300 rounded-md border-0 focus:outline-none focus:ring-0 focus:bg-gray-700"
                           type="password"
                           name="password"
                           required 
                           autocomplete="new-password" />
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-center text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input id="password_confirmation" 
                           class="w-full px-4 py-3 bg-gray-800 text-gray-300 rounded-md border-0 focus:outline-none focus:ring-0 focus:bg-gray-700"
                           type="password"
                           name="password_confirmation"
                           required 
                           autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Register Button -->
                <div class="mb-4">
                    <button type="submit" 
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-0">
                        REGISTER
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <a class="text-sm text-gray-600 hover:text-gray-800 underline" 
                       href="{{ route('login') }}">
                        Already registered? Login here
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>