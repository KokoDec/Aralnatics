<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcards - ARALNATICS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
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
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(82, 113, 255, 0.15);
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
    @include('layout.sidebar', ['active' => 'flashcards'])

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-4 lg:px-8 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Flashcards</h1>
                <p class="text-sm text-gray-500">Create decks and study smarter with spaced repetition.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors" id="new-deck-btn">
                    + New Deck
                </button>
                <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors" id="import-deck-btn">
                    Import Deck
                </button>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-4 lg:p-8 space-y-6">
            <!-- Stats Overview -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl border border-gray-200 p-6 card-hover">
                    <p class="text-xs uppercase tracking-wide text-indigo-500 font-semibold mb-2">Total Decks</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <span class="text-sm text-gray-500">decks created</span>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-6 card-hover">
                    <p class="text-xs uppercase tracking-wide text-indigo-500 font-semibold mb-2">Cards Reviewed</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <span class="text-sm text-gray-500">this week</span>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-6 card-hover">
                    <p class="text-xs uppercase tracking-wide text-indigo-500 font-semibold mb-2">Streak</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <span class="text-sm text-gray-500">days in a row</span>
                    </div>
                </div>
            </section>

            <!-- Decks List -->
            <section class="bg-white rounded-xl border border-gray-200 p-6 min-h-[320px] flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Your Decks</h2>
                        <p class="text-sm text-gray-500">Manage and study your flashcard decks.</p>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="Search decks" class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <div id="deck-list" class="flex-1 border-2 border-dashed border-gray-200 rounded-lg p-8 text-center flex flex-col items-center justify-center space-y-3">
                    <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <p class="text-lg font-medium text-gray-900">No flashcard decks yet</p>
                    <p class="text-sm text-gray-500 max-w-sm">
                        Create your first deck to start building flashcards. You can also import existing decks from CSV or Quizlet exports.
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Create Deck
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                            Import Deck
                        </button>
                    </div>
                </div>
            </section>
        </main>
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

        const newDeckBtn = document.getElementById('new-deck-btn');
        const importDeckBtn = document.getElementById('import-deck-btn');

        if (newDeckBtn) {
            newDeckBtn.addEventListener('click', () => {
                alert('Deck creation feature coming soon!');
            });
        }

        if (importDeckBtn) {
            importDeckBtn.addEventListener('click', () => {
                alert('Import feature coming soon!');
            });
        }
    </script>
</body>
</html>

