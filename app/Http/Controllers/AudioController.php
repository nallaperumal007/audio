<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function showUploadForm($from, $to)
    {
        return view('upload', compact('from', 'to'));
    }

    public function convertAudio(Request $request)
    {
        // Validate the request
        $request->validate([
            'fromFormat' => 'required|string',
            'toFormat' => 'required|string',
            'audioFile' => 'required|file|mimes:mp3,wav,flac,aac,ogg,opus,m4a,aiff,mmf',
        ]);

        $audioFile = $request->file('audioFile');
        $outputFormat = strtolower($request->input('toFormat'));

        // Store uploaded file temporarily
        $inputPath = storage_path('app/temp/' . uniqid('input_') . '.' . $audioFile->getClientOriginalExtension());
        $audioFile->move(dirname($inputPath), basename($inputPath));

        $outputDirectory = storage_path('app/converted');
        $outputFilename = uniqid('audio_') . '.' . $outputFormat;
        $outputPath = $outputDirectory . '/' . $outputFilename;

        try {
            if (!is_dir($outputDirectory)) {
                mkdir($outputDirectory, 0777, true);
            }

            $command = $this->getFfmpegCommand($inputPath, $outputPath, $outputFormat);

            \Log::info('FFmpeg command: ' . implode(' ', $command));

            $process = new Process($command);
            $process->setTimeout(120); // Set timeout to prevent hanging
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            \Log::info('Converted audio file path: ' . $outputPath);

            if (!file_exists($outputPath)) {
                throw new \Exception("Converted audio file not found.");
            }

            // Delete the input file after conversion
            unlink($inputPath);

            // Return the converted file for download and delete it after sending
            return response()->download($outputPath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            \Log::error('Error during conversion: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Error during conversion: ' . $e->getMessage()]);
        }
    }

    private function getFfmpegCommand($inputPath, $outputPath, $outputFormat)
    {
        $command = ['ffmpeg', '-y', '-i', $inputPath];

        switch ($outputFormat) {
            case 'mp3':
            case 'aac':
            case 'ogg':
                $command = array_merge($command, ['-ar', '44100', '-ac', '2', '-b:a', '128k', $outputPath]);
                break;
            case 'wav':
                $command = array_merge($command, ['-ar', '44100', '-ac', '2', $outputPath]);
                break;
            case 'flac':
                $command = array_merge($command, ['-ar', '44100', '-ac', '2', '-compression_level', '5', $outputPath]);
                break;
            case 'opus':
                $command = array_merge($command, ['-ar', '48000', '-ac', '2', '-b:a', '128k', $outputPath]);
                break;
            case 'm4a':
                $command = array_merge($command, ['-ar', '44100', '-ac', '2', '-b:a', '128k', $outputPath]);
                break;
            case 'aiff':
                $command = array_merge($command, ['-ar', '44100', '-ac', '2', $outputPath]);
                break;
            case 'mmf': // Custom MMF conversion
                $command = array_merge($command, ['-ar', '8000', '-ac', '1', '-b:a', '32k', $outputPath]);
                break;
            default:
                throw new \Exception("Unsupported output format: $outputFormat");
        }

        return $command;
    }
}
