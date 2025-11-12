<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('landing');
});

// Registration routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
});

// My Quizzes route
Route::get('/quizzes', function () {
    return view('quizzes');
})->name('quizzes.index');

// Create Quiz routes
Route::get('/create-quiz', function () {
    return view('createQuiz');
})->name('quiz.create');

// Flashcards route
Route::get('/flashcards', function () {
    return view('flashcards');
})->name('flashcards.index');

// Statistics route
Route::get('/statistics', function () {
    return view('statistics');
})->name('statistics.index');

// Profile route
Route::get('/profile', function () {
    return view('profile');
})->name('profile.show');

Route::post('/quiz', function () {
    // TODO: Handle quiz creation
    // For now, just redirect back with success message
    return redirect('/dashboard')->with('success', 'Quiz created successfully!');
})->name('quiz.store');

// Send quiz invitation emails
Route::post('/quiz/send-invitations', function () {
    // TODO: Implement email sending
    // For now, return success
    return response()->json(['success' => true, 'message' => 'Invitations sent successfully!']);
})->name('quiz.send-invitations');
