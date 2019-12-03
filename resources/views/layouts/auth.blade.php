<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photoboard</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 welcome">
                <h3>Welcome to Photoboard project</h3>
                <p>text</p>
            </div>
            <div class="col-4 auth-form">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ mix('js/auth.js') }}"></script>
</body>
</html>