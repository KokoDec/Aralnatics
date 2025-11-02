<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - Aralytics</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h1>
            <p class="text-gray-600">Join Aralytics today</p>
        </div>

        <!-- Registration Form -->
        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Username Field -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                    Username
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 @error('username') border-red-500 @enderror"
                    placeholder="Enter your username"
                    required
                >
                @error('username')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 @error('password') border-red-500 @enderror"
                    placeholder="Enter your password"
                    required
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm Password
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                    placeholder="Confirm your password"
                    required
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit"
                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200 transform hover:scale-[1.02]"
            >
                Create Account
            </button>
        </form>

        <!-- Login Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
                    Sign in here
                </a>
            </p>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>
</body>
</html>
