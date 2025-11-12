<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Quiz - ARALNATICS</title>
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
        .question-item {
            transition: all 0.3s ease;
        }
        .question-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
    @include('layout.sidebar', ['active' => 'create-quiz'])

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-4 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900">Create a Quiz</h1>
        </header>

        <!-- Main Content Area -->
        <main class="p-4 lg:p-8">
            <form id="quiz-form" action="{{ route('quiz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column: Quiz Settings (1/3 width) -->
                    <div class="lg:col-span-1 space-y-6">
                        <!-- Quiz Type Section -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Quiz Type</h2>
                            <div class="relative">
                                <select name="quiz_type" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent appearance-none bg-white">
                                    <option value="multiple-choice">Multiple Choice</option>
                                    <option value="true-false">True/False</option>
                                    <option value="identification">Identification</option>
                                </select>
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        <!-- Quiz Settings -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="space-y-5">
                                <!-- Section -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Section</label>
                                    <div class="relative">
                                        <select name="group_id" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent appearance-none bg-white">
                                            <option value="">Select a Group</option>
                                            <option value="1" selected>Backend</option>
                                            <option value="2">Frontend</option>
                                            <option value="3">Full Stack</option>
                                        </select>
                                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Quiz Title -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Quiz Title</label>
                                    <input type="text" name="quiz_title" placeholder="Enter quiz title" 
                                           class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                </div>

                                <!-- Description -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                    <textarea name="description" rows="3" placeholder="Enter quiz description"
                                              class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></textarea>
                                </div>

                                <!-- Time Limit -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Time Limit</label>
                                    <input type="text" name="time_limit" placeholder="e.g. 60 minutes" 
                                           class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                </div>

                                <!-- Start Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                    <div class="relative">
                                        <input type="text" name="start_date" id="start-date" placeholder="mm/dd/yyyy" 
                                               class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                                    <div class="relative">
                                        <input type="text" name="end_date" id="end-date" placeholder="mm/dd/yyyy" 
                                               class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                             

                                <!-- Quiz Code -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Quiz Code</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" id="quiz-code" name="quiz_code" value="" placeholder="Generate code"
                                               class="flex-1 rounded-lg border border-gray-300 px-4 py-2.5 text-sm bg-gray-50 text-gray-700">
                                        <button type="button" id="generate-code-btn" class="px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                                            Generate Code
                                        </button>
                                    </div>
                                </div>

                                <!-- Show Results to Students -->
                                <div class="flex items-start space-x-3 pt-2">
                                    <input type="checkbox" name="show_results" id="show-results"
                                           class="mt-1 w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                    <div>
                                        <label for="show-results" class="text-sm font-medium text-gray-700 cursor-pointer">Show Results to Students</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Starter Options -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="space-y-3">
                                <button type="button" id="save-draft-btn" class="w-full px-4 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                                    Save as Draft
                                </button>
                                <button type="submit" class="w-full px-4 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                                    Create Quiz
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Quiz Generation (2/3 width) -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Quiz Generation Section -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Quiz Generation</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <button type="button" id="generate-ai-btn" class="flex items-center justify-center space-x-3 px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-blue-700 transition-all shadow-lg hover:shadow-xl">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <span>Generate with AI</span>
                                </button>
                                <button type="button" id="upload-file-btn" class="flex items-center justify-center space-x-3 px-6 py-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl font-semibold hover:from-purple-600 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span>Upload File</span>
                                </button>
                            </div>
                            
                            <!-- File Upload Area -->
                            <div id="file-upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition-all">
                                <input type="file" id="file-input" name="files[]" multiple accept=".pdf,.doc,.docx,.ppt,.pptx,.txt" class="hidden">
                                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-700 font-medium mb-2">Drag & Drop your files here or</p>
                                <button type="button" id="browse-files-btn" class="text-indigo-600 hover:text-indigo-700 font-medium">Browse files</button>
                                <div id="file-list" class="mt-4 space-y-2"></div>
                            </div>
                        </div>

                        <!-- Add New Question Area -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div id="questions-list" class="space-y-4 mb-6">
                                <!-- Empty State -->
                                <div id="empty-questions" class="text-center py-12">
                                    <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-900 mb-2">No questions yet</p>
                                    <p class="text-sm text-gray-500 mb-6">Generate questions with AI or upload a file to get started</p>
                                </div>
                            </div>
                            
                            <!-- Add New Question Button -->
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                <button type="button" id="add-question-btn" class="text-indigo-600 font-semibold text-lg hover:text-indigo-700 transition-colors">
                                    + Add New Question
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        // File Upload
        const uploadFileBtn = document.getElementById('upload-file-btn');
        const fileInput = document.getElementById('file-input');
        const fileUploadArea = document.getElementById('file-upload-area');
        const fileList = document.getElementById('file-list');
        
        if (uploadFileBtn && fileInput) {
            uploadFileBtn.addEventListener('click', () => {
                fileInput.click();
            });
        }
        
        const browseFilesBtn = document.getElementById('browse-files-btn');
        if (browseFilesBtn && fileInput) {
            browseFilesBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                fileInput.click();
            });
        }
        
        if (fileUploadArea && fileInput) {
            fileUploadArea.addEventListener('click', (e) => {
                if (e.target !== browseFilesBtn && !browseFilesBtn.contains(e.target)) {
                    fileInput.click();
                }
            });
            
            fileUploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                fileUploadArea.classList.add('border-indigo-500', 'bg-indigo-50');
            });
            
            fileUploadArea.addEventListener('dragleave', () => {
                fileUploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
            });
            
            fileUploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                fileUploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
                const files = e.dataTransfer.files;
                handleFiles(files);
            });
        }
        
        if (fileInput) {
            fileInput.addEventListener('change', (e) => {
                handleFiles(e.target.files);
            });
        }
        
        function handleFiles(files) {
            Array.from(files).forEach(file => {
                const fileItem = document.createElement('div');
                fileItem.className = 'flex items-center justify-between p-3 bg-gray-50 rounded-lg';
                fileItem.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-sm text-gray-700">${file.name}</span>
                    </div>
                    <button type="button" class="text-red-500 hover:text-red-700 remove-file">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                
                fileItem.querySelector('.remove-file').addEventListener('click', () => {
                    fileItem.remove();
                });
                
                fileList.appendChild(fileItem);
            });
        }

        // Generate AI Button
        const generateAIBtn = document.getElementById('generate-ai-btn');
        if (generateAIBtn) {
            generateAIBtn.addEventListener('click', () => {
                alert('AI Generation feature coming soon!');
            });
        }

        // Add Question Button
        const addQuestionBtn = document.getElementById('add-question-btn');
        const questionsList = document.getElementById('questions-list');
        const emptyQuestions = document.getElementById('empty-questions');
        let questionCount = 0;

        if (addQuestionBtn) {
            addQuestionBtn.addEventListener('click', () => {
                questionCount++;
                if (emptyQuestions) {
                    emptyQuestions.classList.add('hidden');
                }
                
                const questionItem = document.createElement('div');
                questionItem.className = 'question-item bg-gray-50 rounded-lg p-4 border border-gray-200';
                questionItem.innerHTML = `
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="font-semibold text-gray-900">Question ${questionCount}</h3>
                        <button type="button" class="text-red-500 hover:text-red-700 remove-question">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Question Type</label>
                        <div class="relative">
                            <select name="questions[${questionCount}][type]" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent appearance-none bg-white">
                                <option value="multiple-choice">Multiple Choice</option>
                                <option value="true-false">True/False</option>
                                <option value="identification">Identification</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <textarea name="questions[${questionCount}][question]" rows="3" 
                              class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 mb-3" 
                              placeholder="Enter your question here..."></textarea>
                    <div class="flex items-center space-x-4">
                        <input type="number" name="questions[${questionCount}][points]" value="1" min="1" 
                               class="w-20 rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                               placeholder="Points">
                    </div>
                `;
                
                questionItem.querySelector('.remove-question').addEventListener('click', () => {
                    questionItem.remove();
                    if (questionsList.children.length === 0 && emptyQuestions) {
                        emptyQuestions.classList.remove('hidden');
                    }
                });
                
                questionsList.appendChild(questionItem);
            });
        }

        // Date formatting (mm/dd/yyyy)
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
        
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        if (startDateInput) formatDateInput(startDateInput);
        if (endDateInput) formatDateInput(endDateInput);

        // Generate Quiz Code
        const generateCodeBtn = document.getElementById('generate-code-btn');
        const quizCodeInput = document.getElementById('quiz-code');
        if (generateCodeBtn && quizCodeInput) {
            generateCodeBtn.addEventListener('click', () => {
                const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
                let code = '';
                for (let i = 0; i < 3; i++) {
                    code += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                code += '-';
                for (let i = 0; i < 3; i++) {
                    code += Math.floor(Math.random() * 10);
                }
                code += '-';
                for (let i = 0; i < 3; i++) {
                    code += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                quizCodeInput.value = code;
            });
        }

        // Copy Shareable Link
        const copyLinkBtn = document.getElementById('copy-link-btn');
        if (copyLinkBtn) {
            copyLinkBtn.addEventListener('click', () => {
                const quizLink = `${window.location.origin}/quiz/${quizCodeInput.value}`;
                navigator.clipboard.writeText(quizLink).then(() => {
                    const originalText = copyLinkBtn.innerHTML;
                    copyLinkBtn.innerHTML = '<span class="text-green-600">✓ Copied!</span>';
                    setTimeout(() => {
                        copyLinkBtn.innerHTML = originalText;
                    }, 2000);
                });
            });
        }

        // Export to PDF
        const exportPdfBtn = document.getElementById('export-pdf-btn');
        if (exportPdfBtn) {
            exportPdfBtn.addEventListener('click', () => {
                window.print();
            });
        }

        // Save as Draft
        const saveDraftBtn = document.getElementById('save-draft-btn');
        if (saveDraftBtn) {
            saveDraftBtn.addEventListener('click', () => {
                const form = document.getElementById('quiz-form');
                const draftInput = document.createElement('input');
                draftInput.type = 'hidden';
                draftInput.name = 'is_draft';
                draftInput.value = '1';
                form.appendChild(draftInput);
                form.submit();
            });
        }
    </script>
</body>
</html>
