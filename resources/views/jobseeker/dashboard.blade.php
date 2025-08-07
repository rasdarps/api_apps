<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jobseeker Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">API Apps</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('external.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="nav-link btn btn-link" type="submit" style="padding:0;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h2>Welcome, {{ $user['profile']['first_name'] ?? '' }}!</h2>
    <div class="card mt-4">
        <div class="card-header">
            Jobseeker Details
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $user['profile']['first_name'] ?? '' }}</p>
            <p><strong>Other Names:</strong> {{ $user['profile']['other_names'] ?? '' }}</p>
            <p><strong>Last Name:</strong> {{ $user['profile']['last_name'] ?? '' }}</p>
            <p><strong>Email:</strong> {{ $user['email'] ?? '' }}</p>
            <p><strong>Phone:</strong> {{ $user['profile']['phone_number'] ?? '' }}</p>
            <p><strong>Registration Code:</strong> {{ $user['registration_code'] ?? '' }}</p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>