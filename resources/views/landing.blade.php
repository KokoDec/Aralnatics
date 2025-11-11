<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARALYTICS - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Jaro (400) -->
    <link href="https://fonts.googleapis.com/css2?family=Jaro:wght@400&display=swap" rel="stylesheet">
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .modal-backdrop {
            backdrop-filter: blur(8px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-gray-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold gradient-text font-['Jaro',sans-serif]">ARALNATICS</h1>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Features</a>
                        <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">About</a>
                        <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Contact</a>
                    </div>
                </div>
                
                <!-- Login Button -->
                <div class="flex items-center space-x-4">
                    <button id="login-btn" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Login
                    </button>
                    <button id="register-btn" class="border-2 border-indigo-600 text-indigo-600 px-6 py-2 rounded-lg font-semibold hover:bg-indigo-50 transition-all duration-200">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Hero Content -->
            <div class="space-y-8 fade-in">
                <div class="space-y-4">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold font-['Jaro',sans-serif] leading-tight">
                        <span class="text-orange-500">Welcome to</span><br>
                        <span class="gradient-text">ARALNATICS</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-600 leading-relaxed max-w-2xl">
                        Start your learning journey with personalized flashcards, smart quizzes, and progress tracking.
                    </p>
                </div>
                
                <!-- Features List -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-gray-700">Interactive Learning Tools</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="text-gray-700">Progress Analytics</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="text-gray-700">AI-Powered Quizzes</span>
                    </div>
                </div>
            </div>
            
            <!-- Right: Robot Mascot -->
            <div class="relative flex justify-center lg:justify-end fade-in">
                <div class="relative">
                    <!-- Speech Bubble -->
                    <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 bg-white rounded-2xl shadow-2xl p-4 max-w-xs floating">
                        <div class="text-center">
                            <div class="text-sm font-bold text-gray-800">Ready to learn?</div>
                            <div class="text-xs text-gray-600 mt-1">Let's get started!</div>
                        </div>
                        <!-- Speech bubble tail -->
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full">
                            <div class="w-0 h-0 border-l-8 border-r-8 border-t-8 border-l-transparent border-r-transparent border-t-white"></div>
                        </div>
                    </div>
                    
                    <!-- Robot Image -->
                    <img src="{{ asset('img/robot.png') }}" 
                         alt="ARA - AI Learning Assistant" 
                         class="w-80 h-80 lg:w-96 lg:h-96 object-contain drop-shadow-2xl floating" />
                </div>
            </div>
        </div>
    </main>

    <!-- Include Login Modal -->
    @include('partials.login-modal')

    <!-- Include Register Modal -->
    @include('partials.register-modal')

    <!-- JavaScript -->
    <script>
        // Auto-open modals based on session or errors
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('open_login') || ($errors->has('username') && old('from_register_modal') != '1'))
                const loginModal = document.getElementById('login-modal');
                if (loginModal) {
                    loginModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            @endif

            @if(session('open_register') || old('from_register_modal') == '1' || ($errors->has('username') && old('from_register_modal') == '1'))
                const registerModal = document.getElementById('register-modal');
                if (registerModal) {
                    registerModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            @endif
        });
    </script>
    <script>
        // Modal functionality
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');
        const loginBtn = document.getElementById('login-btn');
        const registerBtn = document.getElementById('register-btn');
        const loginClose = document.getElementById('login-close');
        const registerClose = document.getElementById('register-close');
        const createAccountBtn = document.getElementById('create-account-btn');
        const registerBackLogin = document.getElementById('register-back-login');
        const passwordToggle = document.getElementById('password-toggle');
        const passwordInput = document.getElementById('login-password');

        // Show login modal
        if (loginBtn) {
            loginBtn.addEventListener('click', () => {
                loginModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }

        // Show register modal
        if (registerBtn) {
            registerBtn.addEventListener('click', () => {
                registerModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }

        // Hide login modal
        if (loginClose) {
            loginClose.addEventListener('click', () => {
                loginModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }

        // Hide register modal
        if (registerClose) {
            registerClose.addEventListener('click', () => {
                registerModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }

        // Show register modal from login
        if (createAccountBtn) {
            createAccountBtn.addEventListener('click', () => {
                loginModal.classList.add('hidden');
                registerModal.classList.remove('hidden');
            });
        }

        // Back to login from register
        if (registerBackLogin) {
            registerBackLogin.addEventListener('click', () => {
                registerModal.classList.add('hidden');
                loginModal.classList.remove('hidden');
            });
        }

        // Password toggle
        if (passwordToggle && passwordInput) {
            passwordToggle.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                const eye = document.getElementById('password-eye');
                if (type === 'text') {
                    eye.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />';
                } else {
                    eye.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                }
            });
        }

        // Close modals when clicking outside
        [loginModal, registerModal].forEach(modal => {
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal || e.target.classList.contains('modal-backdrop')) {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                });
            }
        });
    </script>
</body>
</html>

