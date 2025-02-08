@include('header')

@php
    $fromFormat = request()->route('from');
    $toFormat = request()->route('to');
@endphp

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center p-4">
                <div class="card-body">
                    <i class="fas fa-video fa-3x mb-3 text-success"></i>
                    <h4 class="card-title mb-3">Upload Your Video File</h4>

                    <p class="alert alert-info">
                        Convert <strong>{{ strtoupper($fromFormat) }}</strong> to <strong>{{ strtoupper($toFormat) }}</strong>
                    </p>

                    <form id="videoForm" action="{{ route('convert-video') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="fromFormat" value="{{ $fromFormat }}">
                        <input type="hidden" name="toFormat" value="{{ $toFormat }}">

                        <div class="mb-3">
                            <label class="form-label">Choose Video File:</label>
                            <input type="file" name="videoFile" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Convert & Download</button>
                    </form>

                    <div id="loading" class="mt-3" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Processing...</span>
                        </div>
                        <p>Processing your video file...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
