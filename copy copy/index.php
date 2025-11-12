<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sample user data - in real application, this would come from database
$user = [
    'name' => 'Lowegie Raga',
    'initials' => 'LR',
    'email' => 'lowegieraga@gmail.com',
    'join_date' => '2024-01-15'
];

// Sample dashboard statistics - in real application, this would come from database
$stats = [
    'total_quizzes' => 24,
    'quizzes_this_week' => 3,
    'average_score' => 87,
    'score_improvement' => 5,
    'total_flashcards' => 156,
    'new_flashcards_today' => 12,
    'study_streak' => 12
];

// Sample recent quiz results - in real application, this would come from database
$recent_quizzes = [
    [
        'id' => 1,
        'title' => 'Mathematics Quiz',
        'score' => 92,
        'correct' => 15,
        'total' => 16,
        'completed_at' => '2 hours ago',
        'subject' => 'Mathematics',
        'color' => 'green'
    ],
    [
        'id' => 2,
        'title' => 'Science Quiz',
        'score' => 78,
        'correct' => 12,
        'total' => 15,
        'completed_at' => 'yesterday',
        'subject' => 'Science',
        'color' => 'blue'
    ],
    [
        'id' => 3,
        'title' => 'History Quiz',
        'score' => 85,
        'correct' => 17,
        'total' => 20,
        'completed_at' => '2 days ago',
        'subject' => 'History',
        'color' => 'orange'
    ]
];

// Sample recent study sets - in real application, this would come from database
$recent_study_sets = [
    [
        'id' => 1,
        'title' => 'Biology Flashcards',
        'card_count' => 45,
        'mastery_percentage' => 80,
        'last_studied' => '1 hour ago',
        'subject' => 'Biology',
        'color' => 'purple'
    ],
    [
        'id' => 2,
        'title' => 'Chemistry Terms',
        'card_count' => 32,
        'mastery_percentage' => 65,
        'last_studied' => '3 hours ago',
        'subject' => 'Chemistry',
        'color' => 'teal'
    ],
    [
        'id' => 3,
        'title' => 'Physics Concepts',
        'card_count' => 28,
        'mastery_percentage' => 45,
        'last_studied' => 'yesterday',
        'subject' => 'Physics',
        'color' => 'indigo'
    ]
];

// Get current time for greeting
$current_hour = date('H');
$greeting = $current_hour < 12 ? 'Good morning' : ($current_hour < 18 ? 'Good afternoon' : 'Good evening');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ARALYTICS</title>
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
                <h1 class="text-2xl font-bold gradient-text font-['Jaro',sans-serif]">ARALYTICS</h1>
                <p class="text-xs text-gray-500">Learning Platform</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <!-- Dashboard -->
            <a href="index.php" class="sidebar-item active flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <span>Dashboard</span>
            </a>

            <!-- Create Quiz -->
            <a href="../Pages/createQuiz.php" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <span>Create Quiz</span>
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
            <a href="../Pages/flashCard.php" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
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
            <button class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 font-medium transition-colors">
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <span>Sign Out</span>
            </button>
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
                    <p class="text-gray-600"><?= $greeting ?>, <?= htmlspecialchars($user['name']) ?>! Here's your learning overview.</p>
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
                        <span class="text-white font-semibold"><?= htmlspecialchars($user['initials']) ?></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-4 lg:p-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Quizzes -->
                <div class="stat-card bg-white rounded-xl p-6 shadow-lg border border-gray-200 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Quizzes</p>
                            <p class="text-3xl font-bold text-gray-900"><?= $stats['total_quizzes'] ?></p>
                            <p class="text-sm text-green-600">+<?= $stats['quizzes_this_week'] ?> this week</p>
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
                            <p class="text-3xl font-bold text-gray-900"><?= $stats['average_score'] ?>%</p>
                            <p class="text-sm text-green-600">+<?= $stats['score_improvement'] ?>% this month</p>
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
                            <p class="text-3xl font-bold text-gray-900"><?= $stats['total_flashcards'] ?></p>
                            <p class="text-sm text-blue-600"><?= $stats['new_flashcards_today'] ?> new today</p>
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
                            <p class="text-3xl font-bold text-gray-900"><?= $stats['study_streak'] ?> days</p>
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
                <a href="../Pages/createQuiz.php" class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
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

                <a href="../Pages/flashCard.php" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
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
                        <?php foreach ($recent_quizzes as $quiz): ?>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-<?= $quiz['color'] ?>-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-<?= $quiz['color'] ?>-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900"><?= htmlspecialchars($quiz['title']) ?></h4>
                                <p class="text-sm text-gray-600">Completed <?= $quiz['completed_at'] ?></p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-<?= $quiz['color'] ?>-600"><?= $quiz['score'] ?>%</p>
                                <p class="text-xs text-gray-500"><?= $quiz['correct'] ?>/<?= $quiz['total'] ?> correct</p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Recent Study Sets -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Study Sets</h3>
                        <a href="#" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">View all</a>
                    </div>
                    <div class="space-y-4">
                        <?php foreach ($recent_study_sets as $set): ?>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-<?= $set['color'] ?>-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-<?= $set['color'] ?>-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900"><?= htmlspecialchars($set['title']) ?></h4>
                                <p class="text-sm text-gray-600"><?= $set['card_count'] ?> cards • Last studied <?= $set['last_studied'] ?></p>
                            </div>
                            <div class="text-right">
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="h-2 bg-<?= $set['color'] ?>-500 rounded-full" style="width: <?= $set['mastery_percentage'] ?>%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1"><?= $set['mastery_percentage'] ?>% mastered</p>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.add('open');
            mobileOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        // Close mobile menu
        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });

        // Close mobile menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                mobileOverlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });

        // Add active state to sidebar items
        const sidebarItems = document.querySelectorAll('.sidebar-item');
        sidebarItems.forEach(item => {
            item.addEventListener('click', (e) => {
                // Remove active class from all items
                sidebarItems.forEach(sidebarItem => sidebarItem.classList.remove('active'));
                // Add active class to clicked item
                item.classList.add('active');
            });
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

        // Real-time clock update
        function updateTime() {
            const now = new Date();
            const hour = now.getHours();
            const greeting = hour < 12 ? 'Good morning' : (hour < 18 ? 'Good afternoon' : 'Good evening');
            
            // Update greeting if needed (optional)
            const greetingElement = document.querySelector('p.text-gray-600');
            if (greetingElement) {
                const currentGreeting = greetingElement.textContent.split(',')[0];
                if (currentGreeting !== greeting) {
                    greetingElement.textContent = `${greeting}, <?= htmlspecialchars($user['name']) ?>! Here's your learning overview.`;
                }
            }
        }

        // Update time every minute
        setInterval(updateTime, 60000);
    </script>
</body>
</html>
