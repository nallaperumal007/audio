@php
    $formats = ['mp3', 'aac', 'aiff', 'flac', 'm4a', 'm4r', 'mmf', 'ogg', 'opus', 'wav', 'wma'];
@endphp

<div class="col">
    <div class="card text-center p-4">
        <div class="card-body">
            <i class="fas fa-headphones fa-3x mb-3 text-primary"></i>
            <h4 class="card-title mb-3">Audio Converter</h4>

            <p class="card-text mb-2">Select an audio format to convert from:</p>
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($formats as $format)
                    <a href="{{ route('audio.upload.form', ['from' => $format, 'to' => '']) }}" class="btn btn-primary m-2">{{ strtoupper($format) }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
