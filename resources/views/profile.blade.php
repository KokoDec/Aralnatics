<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - ARALNATICS</title>
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
    @include('layout.sidebar', ['active' => 'profile'])

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-4 lg:px-8 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Profile</h1>
                <p class="text-sm text-gray-500">Manage your account information and preferences.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                    View Activity
                </button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                    Save Changes
                </button>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-4 lg:p-8 space-y-6">
            <!-- Top Section -->
            <section class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                <!-- Profile Summary -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white text-3xl font-semibold mb-4">
                            JD
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900">John Doe</h2>
                        <p class="text-sm text-gray-500 mb-4">Faculty • Backend Section</p>
                        <div class="space-y-3 w-full">
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Member since</span>
                                <span class="font-medium text-gray-900">January 12, 2024</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Total quizzes created</span>
                                <span class="font-medium text-gray-900">18</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Active students</span>
                                <span class="font-medium text-gray-900">54</span>
                            </div>
                        </div>
                        <button class="mt-6 px-4 py-2 text-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Change Avatar
                        </button>
                    </div>
                </div>

                <!-- Account Details -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 xl:col-span-2 card-hover">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Account Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="john.doe@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option selected>Instructor</option>
                                <option>Administrator</option>
                                <option>Student</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                            <select class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option selected>Backend</option>
                                <option>Frontend</option>
                                <option>Full Stack</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea rows="3" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Write a short introduction...">Passionate instructor focusing on backend technologies and real-world problem solving.</textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                            Update Profile
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                            Reset Changes
                        </button>
                    </div>
                </div>
            </section>

            <!-- Preferences -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Notification Preferences</h2>
                    <div class="space-y-4 text-sm text-gray-700">
                        <label class="flex items-start gap-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" checked>
                            <span>
                                <span class="font-semibold text-gray-900 block">Quiz activity updates</span>
                                <span class="text-gray-500">Get notified when students complete or miss quizzes.</span>
                            </span>
                        </label>
                        <label class="flex items-start gap-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <span>
                                <span class="font-semibold text-gray-900 block">Weekly analytics report</span>
                                <span class="text-gray-500">Receive a weekly summary of quiz performance trends.</span>
                            </span>
                        </label>
                        <label class="flex items-start gap-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" checked>
                            <span>
                                <span class="font-semibold text-gray-900 block">Platform announcements</span>
                                <span class="text-gray-500">Product updates, feature releases and maintenance alerts.</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 card-hover">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Security</h2>
                    <div class="space-y-4 text-sm text-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900">Two-factor authentication</p>
                                <p class="text-gray-500">Add an extra layer of security to your account.</p>
                            </div>
                            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Enable
                            </button>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900">Password</p>
                                <p class="text-gray-500">Last updated 3 months ago.</p>
                            </div>
                            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Change
                            </button>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900">Connected devices</p>
                                <p class="text-gray-500">You have 3 active sessions.</p>
                            </div>
                            <button class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Manage
                            </button>
                        </div>
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
    </script>
</body>
</html>

