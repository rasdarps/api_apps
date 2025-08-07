<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>External API Login</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body { font-family: Figtree, sans-serif; background: #f3f4f6; }
        .container { max-width: 400px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; }
        input { width: 100%; padding: .5rem; border: 1px solid #ccc; border-radius: 4px; }
        .btn { background: #ef4444; color: #fff; border: none; padding: .75rem 1.5rem; border-radius: 4px; cursor: pointer; }
        .error { color: #b91c1c; margin-bottom: 1rem; }
        .success { color: #16a34a; margin-bottom: 1rem; }
        .user-info { background: #f0fdf4; padding: 1rem; border-radius: 6px; margin-top: 1rem; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to External App</h2>
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
            @if(session('user'))
                <div class="user-info">
                    <strong>User:</strong><br>
                    Name: {{ session('user.profile.first_name') }} {{ session('user.profile.last_name') }}<br>
                    Email: {{ session('user.email') }}<br>
                    Registration Code: {{ session('user.registration_code') }}
                </div>
            @endif
        @endif
        @if($errors->any())
            <div class="error">{{ $errors->first('login') ?? $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('external.login') }}">
            @csrf
            <div class="form-group">
                <label for="identifier">Identifier</label>
                <input type="text" name="identifier" id="identifier" value="{{ old('identifier') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</body>
</html>