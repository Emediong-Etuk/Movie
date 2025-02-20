<html>
    <h2>Login</h2>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('movie.login') }}" method="post">
        @method('post')
        @csrf
        <input type="email" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button type="submit">Login</button>
        <a href="{{route('movie.register')}}">Register</a>
    </form>
</html>