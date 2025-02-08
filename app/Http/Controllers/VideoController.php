<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class VideoController extends Controller
{
    public function showChoosePage($from, $to)
    {
        return view('choose', compact('from', 'to'));
    }

    public function convert(Request $request)
    {
        $request->validate([
            'videoFile' => 'required|mimes:mp4,avi,mov,mkv,flv,wmv|max:50000',
            'fromFormat' => 'required',
            'toFormat' => 'required',
        ]);

        $file = $request->file('videoFile');
        $fromFormat = $request->input('fromFormat');
        $toFormat = $request->input('toFormat');

        // Store the uploaded file
        $originalFilePath = $file->storeAs('videos/originals', $file->getClientOriginalName(), 'public');

        // Define paths for conversion
        $convertedFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $toFormat;
        $convertedFilePath = storage_path("app/public/videos/converted/{$convertedFileName}");

        try {
            // Convert using FFmpeg
            FFMpeg::fromDisk('public')
                ->open($originalFilePath)
                ->export()
                ->toDisk('public')
                ->inFormat(new X264('aac', 'libx264'))
                ->save("videos/converted/{$convertedFileName}");

            return response()->download($convertedFilePath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return back()->with('error', 'Conversion failed: ' . $e->getMessage());
        }
    }
}
