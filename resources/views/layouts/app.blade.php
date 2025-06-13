<!DOCTYPE html>
<html>

<head>
    <title>LMS Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <h1>Gwapo ko</h1>
        
    @include('partials.nav')
    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>