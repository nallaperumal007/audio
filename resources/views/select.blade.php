@php
    $selectedFormat = $format; // Get the selected format from URL
    $formats = ['mp3', 'aac', 'aiff', 'flac', 'm4a', 'm4r', 'mmf', 'ogg', 'opus', 'wav', 'wma'];
@endphp

<div class="col">
    <div class="card text-center p-4">
        <div class="card-body">
          
            <p class="card-text mb-2">Select an audio format:</p>
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($formats as $format)
                    @if($format !== $selectedFormat)
                        <label class="format-box">
                            <strong>{{ strtoupper($selectedFormat) }}</strong> TO
                            <input type="radio" name="audioFormat" value="{{ $format }}">
                            <span>{{ strtoupper($format) }}</span>
                        </label>
                    @endif
                @endforeach
            </div>

            <br>
            <button id="convertBtn" class="btn btn-primary mt-3" type="button">Convert Audio</button>
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
    document.getElementById("convertBtn").addEventListener("click", function(event) {
        let selected = document.querySelector(".format-box input:checked");

        if (!selected) {
            event.preventDefault();
            alert("Please select an audio format.");
            return;
        }

        let targetFormat = selected.value.toUpperCase();
        let selectedFormat = @json($selectedFormat);

        if (!selectedFormat) {
            alert("No input format selected.");
            return;
        }

        // Format the URL as required
        let newUrl = `/${selectedFormat}/${selectedFormat.toUpperCase()}-TO-${targetFormat}`;
        
        // Redirect to the new formatted URL
        window.location.href = newUrl;
    });
</script>
