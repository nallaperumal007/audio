<?php
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AudioController;
use Illuminate\Support\Facades\Route;

// Route to the homepage
Route::get('/', function () {
    return view('welcome');
});

// Video Routes
Route::get('/{format}-videoconverter', function ($format) {
    return view('videoconverter', compact('format')); // Pass the selected format to the view
})->name('videoconverter');

Route::get('/video/{from}/{to}', [VideoController::class, 'showChoosePage'])->name('choose.form');
Route::post('/convert-video', [VideoController::class, 'convert'])->name('convert-video');

// Audio Routes
Route::get('/{format}-converter', function ($format) {
    return view('converter', compact('format')); // Pass the selected format to the view
})->name('converter');

Route::get('/audio/{from}/{to}', [AudioController::class, 'showUploadForm'])->name('upload.form');
Route::post('/convert-audio', [AudioController::class, 'convertAudio'])->name('convert-audio');
