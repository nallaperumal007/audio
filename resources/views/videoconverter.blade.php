@include('header')

@php
    $selectedFormat = $format;
    $formats = ['3g2', '3gp', 'avi', 'flv', 'mkv', 'mov', 'mp4', 'mpg', 'ogv', 'webm', 'wmv'];
@endphp

<div class="col">
    <div class="card text-center p-4">
        <div class="card-body">
            <p class="card-text mb-2">Select a video format to convert to:</p>
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($formats as $format)
                    @if($format !== $selectedFormat)
                        <label class="format-box">
                            <strong>{{ strtoupper($selectedFormat) }}</strong> TO
                            <input type="radio" name="videoFormat" value="{{ $format }}" onchange="redirectToFormat('{{ $format }}')">
                            <span>{{ strtoupper($format) }}</span>
                        </label>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .format-box {
        display: inline-block;
        width: 120px;
        padding: 12px;
        margin: 6px;
        text-align: center;
        border: 2px solid #007bff;
        border-radius: 10px;
        cursor: pointer;
        background-color: white;
        font-weight: bold;
        transition: 0.3s;
    }
    .format-box input {
        display: none;
    }
    .format-box span {
        display: block;
        color: #007bff;
    }
    .format-box:hover {
        background-color: #f0f8ff;
    }
    .format-box input:checked + span {
        background-color: #007bff;
        color: white;
        padding: 6px;
        border-radius: 5px;
    }
</style>

<script>
    function redirectToFormat(targetFormat) {
        let selectedFormat = @json($selectedFormat);
        
    window.location.href = `/video/${selectedFormat}/${targetFormat}`;   }
</script>

@include('footer')