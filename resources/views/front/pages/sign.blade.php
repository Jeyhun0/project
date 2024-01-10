<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/login.css')}}">
    <title>Document</title>
</head>
<body>
<div class="login register">
    <div class="welcome">
        <h2>Register an Account</h2>
        <p>Welcome to the Notation</p>
        <p>Already have an account? <a href="{{route('front.login')}}">Sign in</a></p>
    </div>

    <div class="inputs">
        <form action="{{route('front.register')}}" method="post">
            @csrf
            <label for="fName">Email Address
                <input type="text" name="email">
                @error('email')
                <span>{{$message}}</span>
                @enderror
            </label>
            <label for="lName">Password
                <input type="text" name="password">
                @error('password')
                <span>{{$message}}</span>
                @enderror
            </label>

            <button type="submit">Sign up</button>
        </form>
        <p>By creating an account, you agree to the <span> Terms of Use</span> and <span>Privacy Policy</span>.
        </p>
    </div>
</div>

</body>
</html>
