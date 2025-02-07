<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose File to Convert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe); /* Blue gradient */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            background-color: #fff;
            width: 100%;
            max-width: 650px;
            border: none;
        }

        .card-header {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #4facfe;
            margin-bottom: 2rem;
        }

        .btn {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
            border: none;
            font-size: 1.5rem;
            border-radius: 50px;
            padding: 16px 40px;
            transition: transform 0.3s, background 0.4s ease-in-out;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Upload Your Audio File
            </div>
            <form action="{{ url('/audio-converter/'.$inputFormat.'-to-'.$outputFormat) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="audioFile">Choose Your Audio File</label>
                    <input type="file" name="audio" id="audioFile" class="form-control" required accept="audio/*">
                </div>

                <button type="submit" class="btn mt-3">Convert</button>
            </form>
        </div>
    </div>
</body>
</html>
