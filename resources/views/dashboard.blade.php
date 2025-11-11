<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ARALNATICS</title>
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
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateX(5px);
        }
        .sidebar-item.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .mobile-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-sidebar.open {
            transform: translateX(0);
        }
        .progress-bar {
            background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        }
        .streak-fire {
            animation: flicker 2s ease-in-out infinite alternate;
        }
        @keyframes flicker {
            0% { opacity: 1; }
            100% { opacity: 0.8; }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .subject-card {
            transition: all 0.3s ease;
        }
        .subject-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-lg">
        <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="mobile-sidebar lg:translate-x-0 fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-xl border-r border-gray-200">
        <!-- Logo Section -->
        <div class="flex items-center space-x-3 p-6 border-b border-gray-200">
            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center floating">
                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold gradient-text font-['Jaro',sans-serif]">ARALNATICS</h1>
                <p class="text-xs text-gray-500">Learning Platform</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <!-- Dashboard -->
            <a href="/dashboard" class="sidebar-item active flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <span>Dashboard</span>
            </a>

            <!-- My Quizzes -->
            <a href="/quizzes" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span>My Quizzes</span>
            </a>

            <!-- Take Quiz -->
            <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span>Take Quiz</span>
            </a>

            <!-- Flashcards -->
            <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span>Flashcards</span>
            </a>

            <!-- Reviewer -->
            <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <span>Reviewer</span>
            </a>

            <!-- Statistics -->
            <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span>Statistics</span>
            </a>

            <!-- Profile -->
            <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <span>Profile</span>
            </a>
        </nav>

        <!-- Sign Out Button -->
        <div class="p-4 border-t border-gray-200">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 font-medium transition-colors">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-4 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                    <p class="text-gray-600">
                        @php
                            $current_hour = date('H');
                            $greeting = $current_hour < 12 ? 'Good morning' : ($current_hour < 18 ? 'Good afternoon' : 'Good evening');
                        @endphp
                        {{ $greeting }}, {{ Auth::user()->name ?? 'User' }}! Here's your learning overview.
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.5 19.5L12 12l7.5 7.5" />
                        </svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- User Avatar -->
                    <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-4 lg:p-8">
            <!-- Subjects Container -->
            <div class="mb-8 fade-in">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Subjects</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                    <!-- Science -->
                    <div class="subject-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 cursor-pointer">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold text-gray-900">Science</h3>
                    </div>

                    <!-- Mathematics -->
                    <div class="subject-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 cursor-pointer">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold text-gray-900">Mathematics</h3>
                    </div>

                    <!-- English -->
                    <div class="subject-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 cursor-pointer">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold text-gray-900">English</h3>
                    </div>

                    <!-- History -->
                    <div class="subject-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 cursor-pointer">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold text-gray-900">History</h3>
                    </div>

                    <!-- Geography -->
                    <div class="subject-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 cursor-pointer">
                        <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold text-gray-900">Geography</h3>
                    </div>

                    <!-- Physics -->
                    <div class="subject-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 cursor-pointer">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold text-gray-900">Physics</h3>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Quizzes -->
                <div class="stat-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Quizzes</p>
                            <p class="text-3xl font-bold text-gray-900">24</p>
                            <p class="text-sm text-green-600">+3 this week</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Average Score -->
                <div class="stat-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Average Score</p>
                            <p class="text-3xl font-bold text-gray-900">87%</p>
                            <p class="text-sm text-green-600">+5% this month</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Flashcards -->
                <div class="stat-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Flashcards</p>
                            <p class="text-3xl font-bold text-gray-900">156</p>
                            <p class="text-sm text-blue-600">12 new today</p>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Study Streak -->
                <div class="stat-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Study Streak</p>
                            <p class="text-3xl font-bold text-gray-900">12 days</p>
                            <p class="text-sm text-orange-600">Keep it up!</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600 streak-fire" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="/create-quiz" class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-lg font-semibold">Create New Quiz</h3>
                            <p class="text-green-100">Build your custom quiz</p>
                        </div>
                    </div>
                </a>

                <button class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-lg font-semibold">Take a Quiz</h3>
                            <p class="text-purple-100">Test your knowledge</p>
                        </div>
                    </div>
                </button>

                <a href="#" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-lg font-semibold">Study Flashcards</h3>
                            <p class="text-orange-100">Review your cards</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Quiz Results -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Quiz Results</h3>
                        <a href="#" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">View all</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Mathematics Quiz</h4>
                                <p class="text-sm text-gray-600">Completed 2 hours ago</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-green-600">92%</p>
                                <p class="text-xs text-gray-500">15/16 correct</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Science Quiz</h4>
                                <p class="text-sm text-gray-600">Completed yesterday</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-blue-600">78%</p>
                                <p class="text-xs text-gray-500">12/15 correct</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">History Quiz</h4>
                                <p class="text-sm text-gray-600">Completed 2 days ago</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-orange-600">85%</p>
                                <p class="text-xs text-gray-500">17/20 correct</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Study Sets -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Study Sets</h3>
                        <a href="#" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">View all</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Biology Flashcards</h4>
                                <p class="text-sm text-gray-600">45 cards • Last studied 1 hour ago</p>
                            </div>
                            <div class="text-right">
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="h-2 bg-purple-500 rounded-full" style="width: 80%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">80% mastered</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Chemistry Terms</h4>
                                <p class="text-sm text-gray-600">32 cards • Last studied 3 hours ago</p>
                            </div>
                            <div class="text-right">
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="h-2 bg-teal-500 rounded-full" style="width: 65%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">65% mastered</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Physics Concepts</h4>
                                <p class="text-sm text-gray-600">28 cards • Last studied yesterday</p>
                            </div>
                            <div class="text-right">
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="h-2 bg-indigo-500 rounded-full" style="width: 45%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">45% mastered</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript -->
    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');

        // Mobile menu functionality
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.add('open');
                mobileOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }

        // Close mobile menu
        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                mobileOverlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }

        // Close mobile menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                mobileOverlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });

        // Animate stats on load
        const statCards = document.querySelectorAll('.stat-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.6s ease-out';
                }
            });
        });

        statCards.forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>
