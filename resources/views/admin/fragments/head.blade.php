<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst(env('APP_NAME', 'matter')) }} Admin</title>
    <link rel="stylesheet" href="{{ asset('bower/normalize-css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('bower/nprogress/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('bower/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('bower/medium-editor/dist/css/medium-editor.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
    <script>
        var development = {{ env('APP_DEBUG', 'false') }};
        var base_url = "{{ url('/') }}";
    </script>
</head>
