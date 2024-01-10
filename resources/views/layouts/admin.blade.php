@include('admin.parties.top')
<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
@include('admin.parties.sidebar')
<main class="main-content position-relative border-radius-lg ">
    @include('admin.parties.header')
    <div class="container-fluid py-4">
        @yield('content')
        @include('admin.parties.footer')
    </div>
</main>
@include('admin.parties.bottom')
