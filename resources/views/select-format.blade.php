<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Audio Format</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="container">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center">Select Audio Format</h2>

            <form action="{{ route('audio.uploadFile') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputFormat" class="form-label">From Format</label>
                    <select id="inputFormat" name="inputFormat" class="form-select" required>
                        <option value="" disabled selected>Select Format</option>
                        @foreach($audioFormats as $format)
                            <option value="{{ $format }}">{{ strtoupper($format) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="outputFormat" class="form-label">To Format</label>
                    <select id="outputFormat" name="outputFormat" class="form-select" required>
                        <option value="" disabled selected>Select Format</option>
                        @foreach($audioFormats as $format)
                            <option value="{{ $format }}">{{ strtoupper($format) }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Next</button>
            </form>
        </div>
    </div>
</body>
</html>
