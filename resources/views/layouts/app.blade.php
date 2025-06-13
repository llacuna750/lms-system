<!DOCTYPE html>
<html>

<head>
    <title>LMS Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.nav')
    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>