<!-- Register Modal -->
<div id="register-modal" class="fixed inset-0 z-50 hidden">
    <div id="register-overlay" class="absolute inset-0 bg-black/50 modal-backdrop"></div>
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md mx-auto p-8 z-10 slide-in">
            <!-- Close Button -->
            <button id="register-close" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Modal Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold gradient-text font-['Jaro',sans-serif] mb-2">Join ARALYTICS</h2>
                <p class="text-gray-600">Create your account and start learning</p>
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
            
            <!-- Register Form -->
            <form id="register-form" action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="from_register_modal" value="1">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input id="reg-username" name="username" type="text" value="{{ old('username') }}" required 
                           class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('username') border-red-500 @enderror" 
                           placeholder="Enter your username" />
                    @error('username')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input id="reg-password" name="password" type="password" required 
                           class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('password') border-red-500 @enderror" 
                           placeholder="Create a password" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                    <input id="reg-confirm" name="password_confirmation" type="password" required 
                           class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" 
                           placeholder="Confirm your password" />
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" required class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-600">I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms of Service</a> and <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a></span>
                </div>
                
                <div class="space-y-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Create Account
                    </button>
                    <button id="register-back-login" type="button" class="w-full border-2 border-gray-300 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                        Already have an account? Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

