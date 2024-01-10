<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('styles/login.css')}}">
</head>
<body>
<div class="login">
    <div class="welcome">
        <h2>Welcome back</h2>
        <p>Enter your email and password to sign in to the website.</p>
        <p>Not signed up yet? <a href="{{route('front.signup')}}">Sign up</a></p>
    </div>

    <div class="inputs" >
        <form action="{{route('front.login')}}" method="post">
            @csrf
            <label for="fName" >Email Address
                <input type="text" name="email">
            </label>
            <label for="lName">Password
                <input type="text" name="password" value="">
            </label>

            <label class="checkbox">
                <input type="checkbox" name="checkbox">
                <p> Keep me logged in </p>
            </label>

            <button type="submit">Sign in</button>
        </form>
    </div>
</div>

</body>
</html>
