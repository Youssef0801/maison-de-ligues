<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/site.webmanifest">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
        
<body>
    <h2>Bienvenue, {{ session('admin_email') }}</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-default">Se déconnecter</button>
    </form>
</body>
</html>
