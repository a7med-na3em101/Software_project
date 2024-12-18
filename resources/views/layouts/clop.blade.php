<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('style')
</head>

<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>@yield('header')</h1>
        <a href="{{route('clienthome')}}" class="btn" style="
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
">Go To Client Home</a>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="bg-dark text-center text-white py-3">
        <p>&copy; {{ date('Y') }} Pharmacy Management System</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
