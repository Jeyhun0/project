<!DOCTYPE html>
<html lang="en">
@include('guest.homeTop')
<body>
<div class="main-container">
    @include('guest.header')
    <div class="center-container">
        @include('guest.sidebar')
        <br>
        @yield('main-content')
    </div>
</div>
</body>
<script src="{{asset('scripts/home_page.js')}}"></script>
@include('guest.footer')
</html>
