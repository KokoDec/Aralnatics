

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
		@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
	   <div class="min-h-screen bg-cover bg-center bg-no-repeat bg-fixed relative" style="background-image: url('/images/hall.jpg');">
		   <!-- Overlay for blur/dim effect -->
		   <div class="absolute inset-0 backdrop-blur-sm bg-black/30 z-0"></div>
		   @include('layout.navbar')
		   <div class="pt-20 px-4 relative z-10">
			   <div class="flex justify-center mt-16 mb-8">
				   <form class="w-full max-w-md flex bg-white/80 rounded-full shadow border border-[#B77466] overflow-hidden">
					   <input type="text" placeholder="Search..." class="flex-1 px-5 py-3 bg-transparent focus:outline-none text-[#B77466] placeholder-[#B77466] font-medium" />
					   <button type="submit" class="px-5 text-[#B77466] hover:text-white hover:bg-[#B77466] transition"><i class="fa-solid fa-magnifying-glass"></i></button>
				   </form>
			   </div>
			   <div class="max-w-2xl mx-auto text-center bg-[#FFE1AF] rounded-2xl shadow-lg p-10 border border-[#FFE1AF]">
				   <div class="flex justify-center mb-4 gap-4">
					   <i class="fa-solid fa-hand-wave text-5xl text-[#B77466] drop-shadow"></i>
					   <i class="fa-solid fa-book-open text-5xl text-[#B77466] drop-shadow"></i>
				   </div>
				   <h1 class="text-4xl font-extrabold text-[#B77466] drop-shadow mb-4">Welcomeback Students</h1>
				   <p class="text-lg text-[#B77466] mb-2">We're glad to see you again! Explore your subjects, track your progress, and make the most out of your learning journey here at Aralnatics. Let's achieve new milestones together this school year!</p>
			   </div>
			   <h2 class="text-2xl font-bold text-[#FFE1AF] mt-12 mb-6 text-center">Subjects</h2>
			   <div class="flex flex-wrap justify-center gap-8">
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>English</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Mother Tongue</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Filipino</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Mathematics</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Science</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Araling Panlipunan</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Edukasyon sa Pagpapakatao (EsP)</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Music</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Arts</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Physical Education</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Health</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Edukasyong Pantahanan at Pangkabuhayan (EPP)</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
				   <div class="rounded-xl shadow p-12 text-center font-bold text-2xl w-80 flex flex-col items-center justify-center gap-6" style="background: linear-gradient(135deg, #B77466 0%, #FFE1AF 100%);">
					   <span>Technology and Livelihood Education (TLE)</span>
					   <button class="mt-2 px-6 py-2 bg-[#B77466] hover:bg-[#a05d4d] text-[#FFE1AF] font-semibold rounded-full flex items-center gap-2 shadow transition">
						   <i class="fa-solid fa-book-open-reader"></i>
						   Learn More
					   </button>
				   </div>
			   </div>
		   </div>
	   </div>
</body>
</html>
