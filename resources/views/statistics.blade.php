<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics - ARALNATICS</title>
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
        .tab-button {
            transition: all 0.2s ease;
        }
        .tab-button.active {
            color: #6366f1;
            border-color: #6366f1;
        }
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(82, 113, 255, 0.15);
        }
        .chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            border-radius: 9999px;
            padding: 0.35rem 0.9rem;
            font-size: 0.75rem;
        }
        .chip.success {
            background: rgba(52, 211, 153, 0.15);
            color: #047857;
        }
        .chip.warning {
            background: rgba(251, 191, 36, 0.15);
            color: #92400e;
        }
        .chip.danger {
            background: rgba(248, 113, 113, 0.15);
            color: #b91c1c;
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
    @include('layout.sidebar', ['active' => 'statistics'])

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-4 lg:px-8 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Statistics</h1>
                <p class="text-sm text-gray-500">Track performance and identify trends across your quizzes.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                    Export Report
                </button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                    + Add Metric
                </button>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-4 lg:p-8 space-y-6">
            <!-- Tabs -->
            <section class="bg-white border border-gray-200 rounded-xl p-4">
                <div class="flex flex-wrap gap-4">
                    <button class="tab-button active border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-900">Overview</button>
                    <button class="tab-button border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-500 hover:text-gray-900">Quiz Performance</button>
                    <button class="tab-button border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-500 hover:text-gray-900">Student Analytics</button>
                    <button class="tab-button border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-500 hover:text-gray-900">Intervention Suggestions</button>
                </div>
            </section>

            <!-- Charts -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Performance Trends</h2>
                        <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Last 6 weeks</option>
                            <option>Last 3 months</option>
                            <option>Last 12 months</option>
                        </select>
                    </div>
                    <img src="https://dummyimage.com/640x360/ffffff/000000&text=Performance+Trends" alt="Performance Trends Chart" class="w-full rounded-lg border border-dashed border-gray-200">
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Score Distribution</h2>
                        <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Current Term</option>
                            <option>Previous Term</option>
                        </select>
                    </div>
                    <img src="https://dummyimage.com/640x360/ffffff/000000&text=Score+Distribution" alt="Score Distribution Chart" class="w-full rounded-lg border border-dashed border-gray-200">
                </div>
            </section>

            <!-- Student Table -->
            <section class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="flex flex-wrap gap-3 items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Student Performance Overview</h2>
                        <p class="text-sm text-gray-500">Monitor quiz completion, score trends and flag students who need support.</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <button class="px-3 py-2 text-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Filter
                        </button>
                        <button class="px-3 py-2 text-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Export CSV
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Student</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Average Score</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Quizzes Completed</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Improvement Trends</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-900">Gon Freecss</td>
                                <td class="px-4 py-3">87.7%</td>
                                <td class="px-4 py-3">12/12</td>
                                <td class="px-4 py-3 text-green-600">+8.2% from last month</td>
                                <td class="px-4 py-3"><span class="chip success">Excellent</span></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-900">Killua Zoldyck</td>
                                <td class="px-4 py-3">93.3%</td>
                                <td class="px-4 py-3">10/12</td>
                                <td class="px-4 py-3 text-green-600">+9% from last month</td>
                                <td class="px-4 py-3"><span class="chip success">Excellent</span></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-900">Justin Nabunturan</td>
                                <td class="px-4 py-3">86.2%</td>
                                <td class="px-4 py-3">12/12</td>
                                <td class="px-4 py-3 text-green-600">+3.2% from last month</td>
                                <td class="px-4 py-3"><span class="chip warning">Needs Practice</span></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-900">Hisoka Morow</td>
                                <td class="px-4 py-3">64.5%</td>
                                <td class="px-4 py-3">4/12</td>
                                <td class="px-4 py-3 text-red-600">-12.2% from last month</td>
                                <td class="px-4 py-3"><span class="chip danger">At Risk</span></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-medium text-gray-900">Asta Staria</td>
                                <td class="px-4 py-3">75.4%</td>
                                <td class="px-4 py-3">9/12</td>
                                <td class="px-4 py-3 text-green-600">+2.2% from last month</td>
                                <td class="px-4 py-3"><span class="chip warning">Needs Practice</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mt-4">
                    <p class="text-sm text-gray-500">Showing 39-44 of 44 students</p>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">Previous</button>
                        <div class="flex items-center gap-1">
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">1</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">2</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">3</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">4</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">5</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">6</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">7</button>
                            <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors bg-indigo-600 text-white border-indigo-600">8</button>
                        </div>
                        <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">Next</button>
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

        // Tabs placeholder
        const tabs = document.querySelectorAll('.tab-button');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                alert('Tab content coming soon!');
            });
        });
    </script>
</body>
</html>

