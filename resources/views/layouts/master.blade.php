<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
</head>
<header>
   @yield('header')
</header>

@yield('sidebar')
<body>
    
     @yield('content')
</body>
@yield('script')


@yield('paginate')

@yield('footer')
</html>