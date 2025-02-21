<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div><a href="{{route('movie.register')}}">Register</a></div>
        <div><a href="{{route('movie.loginpage')}}">Login</a></div>
    </div>

    <div class="movies">
        @if (session('activated'))
            <div class="alert alert-success" role="alert">
                {{ session('activated') }}
            </div>
            
        @endif

        <p>You are now logged in</p>
    </div>
</body>
</html>