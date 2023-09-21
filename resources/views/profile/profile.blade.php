<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Noto+Sans+JP:wght@300&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- nav bar  --}}
    <div class="bg-gray-700 h-10 flex flex-row justify-between">
        {{-- logo --}}
        <div class="bg-gray-500 flex items-center px-4"><a href="{{ url('/dashboard') }}">Logo</a></div>

        {{-- Search --}}
        <div class="bg-gray-300 flex-grow flex items-center justify-center">
            <!-- Search bar content goes here -->
        </div>

        {{-- Profile dropdown --}}
        <div class="bg-purple-400 rounded-full flex items-center px-4 relative group">
            <!-- Profile icon or name -->
            <span class="text-white mr-2">Username</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-5 w-5 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
            </svg>

            <!-- Profile dropdown menu -->
            <div
                class="absolute right-0 mt-40 w-40 bg-white border border-gray-300 rounded-lg shadow-lg hidden group-hover:block">
                <a href="{{ url('/createPost') }}" class="block px-4 py-2 hover:bg-gray-100">Create Post</a>
                <a href="{{ url('/profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                <a href="logout" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>


    {{-- Images --}}
    <div class=" bg-[]">

    </div>
</body>

</html>
