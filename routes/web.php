<?php
use App\Http\Controllers\AudioController;
use App\Http\Controllers\AudioConverterController;
use Illuminate\Support\Facades\Route;

// Route to the homepage
Route::get('/', function () {
    return view('welcome');
});
Route::get('/{format}-converter', function ($format) {
    return view('converter', compact('format')); // Pass the selected format to the view
})->name('converter');



// Route to display the select view for formats
Route::get('{from}/{to}', [AudioController::class, 'showUploadForm'])->name('upload.form');
// Route to handle audio conversion (must be POST)
Route::post('/convert-audio', [AudioController::class, 'convertAudio'])->name('convert-audio');
// Route to display the select view for formats
