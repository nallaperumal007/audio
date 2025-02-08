@php
    $fromFormat = request()->route('from');
    $toFormat = request()->route('to');

    // Ensure only the last part is used as the correct file extension
    $toFormat = strtolower(trim(explode('-', $toFormat)[count(explode('-', $toFormat)) - 1]));
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Converter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-light">
@include('header') 
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center p-4">
                <div class="card-body">
                    <i class="fas fa-file-audio fa-3x mb-3 text-success"></i>
                    <h4 class="card-title mb-3">Upload Your Audio File</h4>

                    <p class="alert alert-info">
                        Convert <strong>{{ strtoupper($fromFormat) }}</strong> to <strong>{{ strtoupper($toFormat) }}</strong>
                    </p>

                    <!-- File Upload Form -->
                    <form id="audioForm" action="{{ route('convert-audio') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="fromFormat" value="{{ $fromFormat }}">
                        <input type="hidden" name="toFormat" value="{{ $toFormat }}">

                        <div class="mb-3">
                            <label class="form-label">Choose Audio File:</label>
                            <input type="file" name="audioFile" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Convert & Download</button>
                    </form>

                    <!-- Loader -->
                    <div id="loading" class="mt-3" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Processing...</span>
                        </div>
                        <p>Processing your audio file...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer') 

<script>
    $(document).ready(function () {
        $('#audioForm').submit(function (event) {
            event.preventDefault(); // Prevent default form submission
            $('#loading').show();  // Show the loading animation

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('convert-audio') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    var xhr = new XMLHttpRequest();
                    xhr.responseType = 'blob';
                    return xhr;
                },
                success: function(response, status, xhr) {
                    $('#loading').hide();

                    // Correct extension extracted from Blade variable
                    var fileExtension = "{{ $toFormat }}"; 

                    var blob = new Blob([response], { type: xhr.getResponseHeader('Content-Type') });

                    var downloadLink = document.createElement('a');
                    downloadLink.href = window.URL.createObjectURL(blob);
                    downloadLink.download = "converted_audio." + fileExtension; // Fixed filename with correct extension
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                },
                error: function(xhr, status, error) {
                    $('#loading').hide();
                    alert('Error during conversion: ' + error);
                }
            });
        });
    });
</script>

</body>
</html>
