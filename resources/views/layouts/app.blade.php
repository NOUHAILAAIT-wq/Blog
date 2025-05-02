<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>

    <!-- Lien vers ton fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
    <header>

    </header>

    <main>
        @yield('content')

        <footer>



            <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>