<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes - ARALNATICS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Jaro (400) -->
    <link href="https://fonts.googleapis.com/css2?family=Jaro:wght@400&display=swap" rel="stylesheet">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
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
        .mobile-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-sidebar.open {
            transform: translateX(0);
        }
        .quiz-card {
            transition: all 0.3s ease;
        }
        .quiz-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .tab {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .tab.active {
            color: #667eea;
            border-bottom: 2px solid #667eea;
        }
        .status-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }
        .status-active {
            background-color: #10b981;
            color: white;
        }
        .status-draft {
            background-color: #fbbf24;
            color: #1f2937;
        }
        .status-closed {
            background-color: #9ca3af;
            color: #1f2937;
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
    @include('layout.sidebar', ['active' => 'quizzes'])

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <h1 class="text-3xl font-bold text-gray-900">Quizzes</h1>
                <a href="/create-quiz" class="flex items-center space-x-2 px-6 py-2 border-2 border-indigo-600 text-indigo-600 rounded-lg font-semibold hover:bg-indigo-50 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Create Quiz</span>
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-4 lg:p-8">
            <!-- Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <div class="flex space-x-8">
                    <button class="tab active pb-4 px-1 text-base font-semibold text-gray-900" data-tab="active">
                        Active Quizzes <span class="text-gray-500 font-normal">12</span>
                    </button>
                    <button class="tab pb-4 px-1 text-base font-semibold text-gray-600" data-tab="closed">
                        Closed Quizzes <span class="text-gray-500 font-normal">12</span>
                    </button>
                    <button class="tab pb-4 px-1 text-base font-semibold text-gray-600" data-tab="drafts">
                        Drafts <span class="text-gray-500 font-normal">12</span>
                    </button>
                </div>
            </div>

            <!-- Search and Filters -->
            <div class="mb-6 flex flex-col md:flex-row gap-4 relative">
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="search-input" 
                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent" 
                           placeholder="Search quizzes by the title or subject">
                </div>
                <div class="flex gap-3 relative">
                    <button id="filter-subject-btn" class="px-4 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all flex items-center space-x-2">
                        <span>By Subject</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <button id="filter-date-btn" class="px-4 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all flex items-center space-x-2">
                        <span>By Date</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Quiz Cards Grid -->
            <div id="quizzes-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Active Quiz Card Example -->
                <div class="quiz-card bg-white rounded-xl shadow-lg border border-gray-200 p-6" data-status="active">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">math</h3>
                        <span class="status-badge status-active">ACTIVE</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Published to : Araling Panlipunan</p>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>15 Questions</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>15 Minutes</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>2 Attempts</span>
                        </div>
                    </div>
                    
                    <p class="text-sm text-gray-600 mb-4">Available : Mar 5, 2025 – Mar 12, 2025</p>
                    
                    <div class="mb-4">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">Participation</span>
                            <span class="font-semibold text-gray-900">50% (30/60)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="View">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Edit">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Security">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Analytics">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="More">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Draft Quiz Card Example -->
                <div class="quiz-card bg-white rounded-xl shadow-lg border border-gray-200 p-6" data-status="draft">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">Physics</h3>
                        <span class="status-badge status-draft">DRAFT</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Published to : Science</p>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>20 Questions</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>30 Minutes</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>1 Attempts</span>
                        </div>
                    </div>
                    
                    <p class="text-sm text-gray-600 mb-4">Available : December 5, 2025 – December 12, 2025</p>
                    <p class="text-sm text-gray-500 mb-4">No Data Range set.</p>
                    <p class="text-sm text-gray-500 mb-4">No progress to show</p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="View">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Edit">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Publish">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        <button class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Delete">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="More">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>
                    </div>
    </div>

                <!-- Closed Quiz Card Example -->
                <div class="quiz-card bg-white rounded-xl shadow-lg border border-gray-200 p-6" data-status="closed">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">Law of Demand</h3>
                        <span class="status-badge status-closed">CLOSED</span>
            </div>
                    <p class="text-sm text-gray-600 mb-4">Published to : Araling Panlipunan</p>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>15 Questions</span>
                </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>15 Minutes</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>2 Attempts</span>
                        </div>
                    </div>
                    
                    <p class="text-sm text-gray-600 mb-4">Available : Sep 22, 2025 – Sep 23, 2025</p>
                    
                    <div class="mb-4">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">Participation</span>
                            <span class="font-semibold text-gray-900">50% (30/60)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gray-500 h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="View">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Analytics">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Reopen">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Archive">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                </button>
                        <button class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="More">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Empty State (hidden by default) -->
            <div id="empty-state" class="hidden text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No quizzes found</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new quiz.</p>
                <div class="mt-6">
                    <a href="/create-quiz" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Create Quiz
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- Filter Dropdowns (Hidden by default) -->
    <div id="subject-filter" class="hidden absolute z-50 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 p-2">
        <div class="space-y-1">
            <label class="flex items-center px-3 py-2 rounded hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600" value="science">
                <span class="ml-2 text-sm text-gray-700">Science</span>
            </label>
            <label class="flex items-center px-3 py-2 rounded hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600" value="mathematics">
                <span class="ml-2 text-sm text-gray-700">Mathematics</span>
            </label>
            <label class="flex items-center px-3 py-2 rounded hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600" value="english">
                <span class="ml-2 text-sm text-gray-700">English</span>
            </label>
            <label class="flex items-center px-3 py-2 rounded hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600" value="history">
                <span class="ml-2 text-sm text-gray-700">History</span>
            </label>
        </div>
    </div>

    <div id="date-filter" class="hidden absolute z-50 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 p-4">
        <div class="space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">From Date</label>
                <input type="text" id="from-date" placeholder="dd/mm/yyyy" 
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       pattern="\d{2}/\d{2}/\d{4}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">To Date</label>
                <input type="text" id="to-date" placeholder="dd/mm/yyyy" 
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                       pattern="\d{2}/\d{2}/\d{4}">
            </div>
            <button id="apply-date-filter" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                Apply Filter
            </button>
        </div>
    </div>

    <script>
        // Mobile menu
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.add('open');
                mobileOverlay.classList.remove('hidden');
            });
        }

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                mobileOverlay.classList.add('hidden');
            });
        }

        // Tab switching
        const tabs = document.querySelectorAll('.tab');
        const quizzesContainer = document.getElementById('quizzes-container');
        const quizCards = document.querySelectorAll('.quiz-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => {
                    t.classList.remove('active', 'text-gray-900');
                    t.classList.add('text-gray-600');
                });
                
                // Add active class to clicked tab
                tab.classList.add('active', 'text-gray-900');
                tab.classList.remove('text-gray-600');
                
                // Filter quiz cards
                const status = tab.getAttribute('data-tab');
                quizCards.forEach(card => {
                    if (status === 'active' && card.dataset.status === 'active') {
                        card.classList.remove('hidden');
                    } else if (status === 'closed' && card.dataset.status === 'closed') {
                        card.classList.remove('hidden');
                    } else if (status === 'drafts' && card.dataset.status === 'draft') {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('search-input');
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            quizCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const subject = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || subject.includes(searchTerm)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });

        // Filter dropdowns
        const filterSubjectBtn = document.getElementById('filter-subject-btn');
        const filterDateBtn = document.getElementById('filter-date-btn');
        const subjectFilter = document.getElementById('subject-filter');
        const dateFilter = document.getElementById('date-filter');

        filterSubjectBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isHidden = subjectFilter.classList.contains('hidden');
            
            // Close date filter
            dateFilter.classList.add('hidden');
            
            // Toggle subject filter
            if (isHidden) {
                subjectFilter.classList.remove('hidden');
                const rect = filterSubjectBtn.getBoundingClientRect();
                const scrollY = window.scrollY || window.pageYOffset;
                const scrollX = window.scrollX || window.pageXOffset;
                
                // Position relative to button
                subjectFilter.style.position = 'absolute';
                subjectFilter.style.top = (rect.bottom + scrollY + 4) + 'px';
                subjectFilter.style.left = (rect.left + scrollX) + 'px';
                
                // Adjust if it goes off screen
                const filterRect = subjectFilter.getBoundingClientRect();
                if (filterRect.right > window.innerWidth) {
                    subjectFilter.style.left = (window.innerWidth - filterRect.width - 10) + 'px';
                }
                if (filterRect.bottom > window.innerHeight) {
                    subjectFilter.style.top = (rect.top + scrollY - filterRect.height - 4) + 'px';
                }
            } else {
                subjectFilter.classList.add('hidden');
            }
        });

        filterDateBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isHidden = dateFilter.classList.contains('hidden');
            
            // Close subject filter
            subjectFilter.classList.add('hidden');
            
            // Toggle date filter
            if (isHidden) {
                dateFilter.classList.remove('hidden');
                const rect = filterDateBtn.getBoundingClientRect();
                const scrollY = window.scrollY || window.pageYOffset;
                const scrollX = window.scrollX || window.pageXOffset;
                
                // Position relative to button
                dateFilter.style.position = 'absolute';
                dateFilter.style.top = (rect.bottom + scrollY + 4) + 'px';
                dateFilter.style.left = (rect.left + scrollX) + 'px';
                
                // Adjust if it goes off screen
                const filterRect = dateFilter.getBoundingClientRect();
                if (filterRect.right > window.innerWidth) {
                    dateFilter.style.left = (window.innerWidth - filterRect.width - 10) + 'px';
                }
                if (filterRect.bottom > window.innerHeight) {
                    dateFilter.style.top = (rect.top + scrollY - filterRect.height - 4) + 'px';
                }
            } else {
                dateFilter.classList.add('hidden');
            }
        });

        // Date formatting (dd/mm/yyyy)
        const fromDateInput = document.getElementById('from-date');
        const toDateInput = document.getElementById('to-date');
        
        function formatDateInput(input) {
            input.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2);
                }
                if (value.length >= 5) {
                    value = value.substring(0, 5) + '/' + value.substring(5, 9);
                }
                e.target.value = value;
            });
        }
        
        if (fromDateInput) formatDateInput(fromDateInput);
        if (toDateInput) formatDateInput(toDateInput);
        
        // Apply date filter
        const applyDateFilterBtn = document.getElementById('apply-date-filter');
        if (applyDateFilterBtn) {
            applyDateFilterBtn.addEventListener('click', () => {
                const fromDate = fromDateInput.value;
                const toDate = toDateInput.value;
                
                // Convert dd/mm/yyyy to Date object for comparison
                function parseDate(dateStr) {
                    if (!dateStr) return null;
                    const parts = dateStr.split('/');
                    if (parts.length !== 3) return null;
                    return new Date(parts[2], parts[1] - 1, parts[0]);
                }
                
                const from = parseDate(fromDate);
                const to = parseDate(toDate);
                
                quizCards.forEach(card => {
                    const availableText = card.querySelector('p.text-sm.text-gray-600')?.textContent || '';
                    const dateMatch = availableText.match(/(\w{3}\s\d{1,2},\s\d{4})/g);
                    
                    if (dateMatch && dateMatch.length >= 2) {
                        const cardFrom = new Date(dateMatch[0]);
                        const cardTo = new Date(dateMatch[1]);
                        
                        let show = true;
                        if (from && cardTo < from) show = false;
                        if (to && cardFrom > to) show = false;
                        
                        if (show) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    }
                });
                
                dateFilter.classList.add('hidden');
            });
        }
        
        // Close filters when clicking outside
        document.addEventListener('click', (e) => {
            if (!filterSubjectBtn.contains(e.target) && !subjectFilter.contains(e.target)) {
                subjectFilter.classList.add('hidden');
            }
            if (!filterDateBtn.contains(e.target) && !dateFilter.contains(e.target)) {
                dateFilter.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
