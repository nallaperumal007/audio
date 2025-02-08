<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Converter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #f8f9fa !important;
        }
        .btn-primary {
            background-color: #ffcc00;
            border: none;
            color: black;
        }
        .btn-primary:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa-solid fa-music"></i> Audio Converter
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/formats') }}"><i class="fa-solid fa-file-audio"></i> Formats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}"><i class="fa-solid fa-circle-info"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}"><i class="fa-solid fa-envelope"></i> Contact</a>
                </li>
            </ul>
            <a href="{{ url('/convert') }}" class="btn btn-primary ms-3">
                <i class="fa-solid fa-music"></i> Convert Now
            </a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
