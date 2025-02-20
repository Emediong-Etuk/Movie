<html>
    <h2>Register</h2>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('movie.signup') }}" method="post">
        @method('post')
        @csrf
        <input type="text" name="name" placeholder="name"><br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button type="submit">Register</button>
    </form>
</html>