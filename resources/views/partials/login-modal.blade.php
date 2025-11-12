<!-- Login Modal -->
<div id="login-modal" class="fixed inset-0 z-50 hidden">
    <div id="login-overlay" class="absolute inset-0 bg-black/50 modal-backdrop"></div>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md mx-auto p-8 z-10 slide-in">
            <!-- Close Button -->
            <button id="login-close" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Modal Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold gradient-text font-['Jaro',sans-serif] mb-2">Welcome Back</h2>
                <p class="text-gray-600">Sign in to continue your learning journey</p>
            </div>
            
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
            
            <!-- Login Form -->
            <form id="login-form" action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input id="login-username" type="text" name="username" value="{{ old('username') }}" required 
                           class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('username') border-red-500 @enderror" 
                           placeholder="Enter your username" />
                    @error('username')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="login-password" type="password" name="password" required 
                               class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('password') border-red-500 @enderror" 
                               placeholder="Enter your password" />
                        <button type="button" id="password-toggle" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg id="password-eye" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500 font-medium">Forgot password?</a>
                </div>
                
                <div class="space-y-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Sign In
                    </button>
                    <button id="create-account-btn" type="button" class="w-full border-2 border-gray-300 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                        Create New Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

