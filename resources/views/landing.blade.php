<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARALYTICS - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Jaro (400) -->
    <link href="https://fonts.googleapis.com/css2?family=Jaro:wght@400&display=swap" rel="stylesheet">
    <!-- Google Font: Inter for body text -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
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
        .hero-gradient {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }
        .section-padding {
            padding: 5rem 0;
        }
        @media (max-width: 768px) {
            .section-padding {
                padding: 3rem 0;
            }
        }
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-white min-h-screen">
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
                        <a href="#home" class="nav-link text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="#features" class="nav-link text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Features</a>
                        <a href="#about" class="nav-link text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">About</a>
                        <a href="#contact" class="nav-link text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Contact</a>
                    </div>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-indigo-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden absolute top-16 left-0 right-0 bg-white border-b border-gray-200 shadow-lg">
                    <div class="px-4 py-4 space-y-3">
                        <a href="#home" class="block text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Home</a>
                        <a href="#features" class="block text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Features</a>
                        <a href="#about" class="block text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">About</a>
                        <a href="#contact" class="block text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
                
                <!-- Login Button -->
                <div class="hidden md:flex items-center space-x-4">
                    <button id="login-btn" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Login
                    </button>
                    <button id="register-btn" class="border-2 border-indigo-600 text-indigo-600 px-6 py-2 rounded-lg font-semibold hover:bg-indigo-50 transition-all duration-200">
                        Register
                    </button>
                </div>
                
                <!-- Mobile Login/Register Buttons -->
                <div class="md:hidden flex items-center space-x-2">
                    <button id="login-btn-mobile" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-24 pb-20 min-h-screen flex items-center hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Hero Content -->
            <div class="space-y-8 fade-in">
                    <div class="space-y-6">
                        <div class="inline-block px-4 py-2 bg-indigo-100 rounded-full">
                            <span class="text-sm font-semibold text-indigo-700">Welcome to the Future of Learning</span>
                        </div>
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold font-['Jaro',sans-serif] leading-tight">
                            <span class="text-gray-900">Transform Your</span><br>
                            <span class="gradient-text">Learning Experience</span>
                    </h1>
                        <p class="text-xl sm:text-2xl text-gray-600 leading-relaxed max-w-2xl font-light">
                            Start your learning journey with personalized flashcards, smart quizzes, and AI-powered progress tracking designed to help you succeed.
                    </p>
                </div>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button id="register-hero-btn" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 text-lg">
                            Get Started Free
                        </button>
                        <a href="#features" class="border-2 border-indigo-600 text-indigo-600 px-8 py-4 rounded-xl font-semibold hover:bg-indigo-50 transition-all duration-200 text-center text-lg">
                            Learn More
                        </a>
                </div>
                
                <!-- Features List -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8">
                    <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                            <span class="text-gray-700 font-medium">Interactive Tools</span>
                    </div>
                    <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                            <span class="text-gray-700 font-medium">Analytics</span>
                    </div>
                    <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                            <span class="text-gray-700 font-medium">AI-Powered</span>
                    </div>
                </div>
            </div>
            
            <!-- Right: Robot Mascot -->
            <div class="relative flex justify-center lg:justify-end fade-in">
                <div class="relative">
                    <!-- Speech Bubble -->
                        <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 bg-white rounded-2xl shadow-2xl p-5 max-w-xs floating z-10">
                        <div class="text-center">
                                <div class="text-base font-bold text-gray-800">Ready to learn?</div>
                                <div class="text-sm text-gray-600 mt-1">Let's get started together!</div>
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
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl sm:text-5xl font-bold font-['Jaro',sans-serif] mb-4">
                    <span class="gradient-text">Powerful Features</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Everything you need to enhance your learning experience
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 card-hover fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Smart Flashcards</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Create and study with intelligent flashcards that adapt to your learning pace and help you retain information better.
                    </p>
                </div>
                
                <!-- Feature Card 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 card-hover fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Progress Analytics</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Track your learning progress with detailed analytics and insights to identify strengths and areas for improvement.
                    </p>
                </div>
                
                <!-- Feature Card 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 card-hover fade-in">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">AI-Powered Quizzes</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Take intelligent quizzes powered by AI that adapt to your knowledge level and provide personalized feedback.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="section-padding bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Content -->
                <div class="fade-in">
                    <div class="inline-block px-4 py-2 bg-indigo-100 rounded-full mb-6">
                        <span class="text-sm font-semibold text-indigo-700">About Us</span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-bold font-['Jaro',sans-serif] mb-6">
                        <span class="gradient-text">Who We Are</span>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        ARALNATICS is a cutting-edge learning platform designed to revolutionize how students and professionals approach education. We combine the power of artificial intelligence with proven learning methodologies to create an engaging and effective learning experience.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed mb-8">
                        Our mission is to make learning accessible, personalized, and enjoyable for everyone. Whether you're preparing for exams, learning new skills, or expanding your knowledge, ARALNATICS provides the tools you need to succeed.
                    </p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6">
                        <div>
                            <div class="text-3xl font-bold gradient-text">10K+</div>
                            <div class="text-sm text-gray-600 mt-1">Active Users</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold gradient-text">50K+</div>
                            <div class="text-sm text-gray-600 mt-1">Flashcards</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold gradient-text">95%</div>
                            <div class="text-sm text-gray-600 mt-1">Success Rate</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right: Visual -->
                <div class="fade-in">
                    <div class="bg-white rounded-2xl p-8 shadow-2xl">
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Innovation First</h3>
                                    <p class="text-gray-600">We continuously innovate to bring you the latest in learning technology.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">User-Centered</h3>
                                    <p class="text-gray-600">Your success is our priority. We design every feature with you in mind.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">AI-Powered</h3>
                                    <p class="text-gray-600">Leverage advanced AI to personalize your learning journey.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl sm:text-5xl font-bold font-['Jaro',sans-serif] mb-4">
                    <span class="gradient-text">Get In Touch</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="fade-in">
                    <form class="space-y-6 bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                            <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" placeholder="Your name" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" placeholder="your.email@example.com" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                            <input type="text" class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" placeholder="What's this about?" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                            <textarea rows="5" class="w-full rounded-xl border border-gray-300 shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" placeholder="Your message..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                </div>
                
                <!-- Contact Info -->
                <div class="fade-in space-y-8">
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                                    <p class="text-gray-600">support@aralnatics.com</p>
                                    <p class="text-gray-600">info@aralnatics.com</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Phone</h4>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                    <p class="text-gray-600">+1 (555) 987-6543</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Address</h4>
                                    <p class="text-gray-600">123 Learning Street</p>
                                    <p class="text-gray-600">Education City, EC 12345</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center hover:bg-indigo-200 transition-colors">
                                <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center hover:bg-indigo-200 transition-colors">
                                <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center hover:bg-indigo-200 transition-colors">
                                <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-2xl font-bold font-['Jaro',sans-serif] mb-4 text-white">ARALNATICS</h2>
                    <p class="text-gray-400 mb-4 max-w-md">
                        Transform your learning experience with AI-powered tools designed to help you succeed.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Features</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">About</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} ARALNATICS. All rights reserved.</p>
            </div>
        </div>
    </footer>

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
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                        // Close mobile menu if open
                        const mobileMenu = document.getElementById('mobile-menu');
                        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                        }
                    }
                }
            });
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });

        // Modal functionality
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');
        const loginBtn = document.getElementById('login-btn');
        const loginBtnMobile = document.getElementById('login-btn-mobile');
        const registerBtn = document.getElementById('register-btn');
        const registerHeroBtn = document.getElementById('register-hero-btn');
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

        // Show login modal from mobile button
        if (loginBtnMobile) {
            loginBtnMobile.addEventListener('click', () => {
                loginModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                // Close mobile menu if open
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // Show register modal
        if (registerBtn) {
            registerBtn.addEventListener('click', () => {
                registerModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }

        // Show register modal from hero button
        if (registerHeroBtn) {
            registerHeroBtn.addEventListener('click', () => {
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

