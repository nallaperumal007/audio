<form id="audioForm" action="{{ url('/audio-converter/'.$from.'-to-'.$to) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4">
        <label for="audioFile" class="form-label">Choose an Audio File:</label>
        <input type="file" id="audioFile" name="audioFile" class="form-control" accept="audio/*" required>
    </div>
    <button id="uploadBtn" class="btn btn-primary mt-3" type="submit">Upload and Convert</button>
</form>
