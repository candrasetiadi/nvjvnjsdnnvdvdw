<meta charset="UTF-8">
<title>{{ ucfirst(env('APP_NAME', 'matter')) }} Admin</title>
<link rel="stylesheet" href="{{ asset('bower/normalize-css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower/nprogress/nprogress.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
<script>
    var development = {{ env('APP_DEBUG', 'false') }};
</script>
