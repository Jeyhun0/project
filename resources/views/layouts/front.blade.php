<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('styles/home_page.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Roboto Mono' rel='stylesheet'>
</head>
<body>
<div class="main-container">
    @include('front.components.navbar')
    <div class="center-container">
       @include('front.components.sidebar')
        <br>
        @yield('content')

    </div>
</div>
</body>
<script src="{{asset('scripts/home_page.js')}}"></script>
@include('front.components.footer')
</html>
