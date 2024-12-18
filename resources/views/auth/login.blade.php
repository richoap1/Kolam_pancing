<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> <!-- Linking to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf <!-- Laravel CSRF Token -->
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

            <p>Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini.</a></p>
            <p><a href="{{ url('/admin_login') }}">Login sebagai Admin</a></p> <!-- Link to the admin login page -->
        </form>
        
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
