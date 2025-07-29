<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Admin</title>
    <link rel="stylesheet" href="{{asset('adminCssJs/assets/loginCss/login.css')}}">
</head>
<body>
<div class="login-container">
    <h1>Giriş et</h1>
    <form action="{{route('admin.loginAdmin')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">E-poçt</label>
            <input type="email" id="email" name="email" placeholder="E-poçt">
            @error('email')
            <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Şifrə</label>
            <input type="password" id="password" name="password" placeholder="Şifrə">
            @error('password')
            <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn">Giriş et</button>
    </form>
    @if (Session::has('message'))
        <div class="alert alert-info text-danger mt-2">{{ Session::get('message') }}</div>
    @endif
</div>
</body>
</html>

