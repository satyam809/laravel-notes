<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Your Application')</title>
    <!-- Include CSS stylesheets and other meta tags -->
</head>

<body>
    <header>
        <!-- Include your website's header here (e.g., logo, navigation menu) -->
    </header>

    <div class="container">
        <!-- Content section, where the specific page content will be injected -->
        @yield('content')
    </div>

    <footer>
        <!-- Include your website's footer here -->
    </footer>

    <!-- Include JavaScript scripts -->
</body>

</html>