<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Converter Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f0f8ff, #e6f7ff);
            font-family: Arial, sans-serif;
        }
       
        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
        }
        .card-body {
            background: linear-gradient(135deg, #ff9d6c, #f5c62f);
            color: white;
            border-radius: 10px;
            padding: 20px;
            transition: background 0.3s;
        }
        .card-body:hover {
            background: linear-gradient(135deg, #f5c62f, #ff9d6c);
        }
        .card-title {
            font-weight: bold;
            font-size: 1.25rem;
        }
        .btn-primary {
            background-color: #1e3d58;
            border-color: #1e3d58;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #162f42;
            transform: scale(1.05);
        }
        i {
            color: #fff;
        }
        h1 {
            color: #333;
        }
        .footer {
            background-color: #1e3d58;
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 40px;
        }
        .footer i {
            margin: 0 10px;
            font-size: 1.5rem;
        }
        .navbar {
            background-color: #1e3d58;
        }
        .navbar-brand,
        .nav-link {
            color: white !important;
        }
    </style>
</head>
<body>
@include('header') 


   
        <h1 class="text-center mb-4">Welcome to the Converter Website</h1>

        <!-- Row of Converter Boxes -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Video Converter -->
            <div class="col">
            <div class="card text-center">
            <div class="card-body">
    <i class="fas fa-video fa-3x mb-3"></i>
    <h5 class="card-title">Video Converter</h5>
    <p class="card-text">Convert your video files easily.</p>
    
    <select class="form-select mb-3" id="videoFormat">
        <option selected disabled>Select Video Format</option>
        <option value="3g2">3G2 Converter</option>
        <option value="3gp">3GP Converter</option>
        <option value="avi">AVI Converter</option>
        <option value="flv">FLV Converter</option>
        <option value="mkv">MKV Converter</option>
        <option value="mov">MOV Converter</option>
        <option value="mp4">MP4 Converter</option>
        <option value="mpg">MPG Converter</option>
        <option value="ogv">OGV Converter</option>
        <option value="webm">WEBM Converter</option>
        <option value="wmv">WMV Converter</option>
    </select>

    <a href="#" id="videoConvertBtn" class="btn btn-primary">Go to Video Converter</a>
</div>
</div>
</div>

<script>
    document.getElementById("videoFormat").addEventListener("change", function() {
        let format = this.value;
        let convertBtn = document.getElementById("videoConvertBtn");
        convertBtn.href = `/${format}-videoconverter`; // Set correct route URL
    });

    document.getElementById("videoConvertBtn").addEventListener("click", function(event) {
        let format = document.getElementById("videoFormat").value;
        if (!format) {
            event.preventDefault(); // Prevent navigation if no format is selected
            alert("Please select a video format.");
        }
    });
</script>


            <!-- Audio Converter -->
            <div class="col">
    <div class="card text-center">
        <div class="card-body">
            <i class="fas fa-headphones fa-3x mb-3"></i>
            <h5 class="card-title">Audio Converter</h5>
            <p class="card-text">Convert your audio files quickly.</p>
            
            <select class="form-select mb-3" id="audioFormat">
                <option selected disabled>Select Audio Format</option>
                <option value="mp3" values="mp3-converter">MP3 Converter</option>
                <option value="aac"  values="aac-converter">AAC Converter</option>
                <option value="aiff" values="aiff-converter">AIFF Converter</option>
                <option value="flac" values="flac-converter">FLAC Converter</option>
                <option value="m4a" values="m4a-converter">M4A Converter</option>
                <option value="m4r" values="m4r-converter">M4R Converter</option>
                <option value="mmf" values="mmf-converter">MMF Converter</option>
                <option value="ogg" values="ogg-converter">OGG Converter</option>
                <option value="opus" values="opus-converter">OPUS Converter</option>
                <option value="wav" values="wav-converter">WAV Converter</option>
                <option value="wma" values="wma-converter">WMA Converter</option>
            </select>
            
            <a href="#" id="convertBtn" class="btn btn-primary">Go to Audio Converter</a>
        </div>
    </div>
</div>
<script>
      document.getElementById("audioFormat").addEventListener("change", function() {
        let format = this.value;
        let convertBtn = document.getElementById("convertBtn");
        convertBtn.href = `{{ url('${format}-converter') }}`;
    });

    document.getElementById("convertBtn").addEventListener("click", function(event) {
        let format = document.getElementById("audioFormat").value;
        if (!format) {
            event.preventDefault(); // Prevent navigation if no format is selected
            alert("Please select an audio format.");
        }
    });
</script>



            <!-- Image Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <h5 class="card-title">Image Converter</h5>
                        <p class="card-text">Convert your images easily.</p>
                        <a href="{{ url('image_converter') }}" class="btn btn-primary">Go to Image Converter</a>
                    </div>
                </div>
            </div>

            <!-- Document Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-file-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Document Converter</h5>
                        <p class="card-text">Convert your document files.</p>
                        <a href="{{ url('document_converter') }}" class="btn btn-primary">Go to Document Converter</a>
                    </div>
                </div>
            </div>

            <!-- PDF Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-file-pdf fa-3x mb-3"></i>
                        <h5 class="card-title">PDF Converter</h5>
                        <p class="card-text">Convert your PDF files.</p>
                        <a href="{{ url('pdf_converter') }}" class="btn btn-primary">Go to PDF Converter</a>
                    </div>
                </div>
            </div>

            <!-- Text Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-font fa-3x mb-3"></i>
                        <h5 class="card-title">Text Converter</h5>
                        <p class="card-text">Convert your text files.</p>
                        <a href="{{ url('text_converter') }}" class="btn btn-primary">Go to Text Converter</a>
                    </div>
                </div>
            </div>

            <!-- CSV Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-table fa-3x mb-3"></i>
                        <h5 class="card-title">CSV Converter</h5>
                        <p class="card-text">Convert your CSV files.</p>
                        <a href="{{ url('csv_converter') }}" class="btn btn-primary">Go to CSV Converter</a>
                    </div>
                </div>
            </div>

            <!-- ZIP Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-archive fa-3x mb-3"></i>
                        <h5 class="card-title">ZIP Converter</h5>
                        <p class="card-text">Convert or extract ZIP files.</p>
                        <a href="{{ url('zip_converter') }}" class="btn btn-primary">Go to ZIP Converter</a>
                    </div>
                </div>
            </div>

            <!-- EBook Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-book fa-3x mb-3"></i>
                        <h5 class="card-title">EBook Converter</h5>
                        <p class="card-text">Convert your eBooks.</p>
                        <a href="{{ url('ebook_converter') }}" class="btn btn-primary">Go to EBook Converter</a>
                    </div>
                </div>
            </div>

            <!-- Code Converter -->
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-code fa-3x mb-3"></i>
                        <h5 class="card-title">Code Converter</h5>
                        <p class="card-text">Convert your code snippets.</p>
                        <a href="{{ url('code_converter') }}" class="btn btn-primary">Go to Code Converter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer') 


    <!-- Bootstrap JS (Optional but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>