<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">

</head>
<body>
    @include('Components.adminheader')
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>
</html>
