@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Audio Converted Successfully 🎉</h2>
    <p>Your converted file is ready for download.</p>
    <a href="{{ $fileUrl }}" class="btn btn-success" download="{{ $fileName }}">Download {{ $fileName }}</a>
</div>
@endsection
