<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Your Blog App</title>
    <!-- Include your CSS and other necessary meta tags -->
</head>

<body>

    <nav>
        <ul>
            <li><a href="{{ route('posts.index') }}">Home</a></li>
            <li><a href="{{ route('posts.create') }}">Create Post</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Your footer content -->
    </footer>

</body>

</html>
