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

<body class="bg-gray-100">
    {{-- Navigation Bar --}}
    <div class="bg-gray-700 h-14 flex flex-row justify-between items-center px-4">
        {{-- Logo --}}
        <div class="flex items-center">
            <a href="{{ url('/dashboard') }}" class="text-white text-lg font-semibold">Athena</a>
        </div>

        {{-- Search Bar --}}
        <div class="relative flex-grow max-w-md">
            <input type="text" placeholder="Search"
                class="w-full h-8 px-4 rounded-full bg-gray-300 text-gray-800 focus:outline-none focus:ring focus:border-blue-300 text-center">
            <button id="searchButton"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17l-2-2M19 8a7 7 0 10-14 0h0"></path>
                </svg>
            </button>
        </div>

        {{-- Profile Dropdown --}}
        <div class="relative group">
            <button
                class="bg-purple-400 rounded-full flex items-center px-4 h-10 text-white hover:bg-purple-500 focus:outline-none transition duration-300 ease-in-out">
                <span class="mr-2">{{ $data->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-5 w-5 text-white transition-transform duration-300 ease-in-out transform group-hover:rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                </svg>
            </button>

            {{-- Profile Dropdown Menu --}}
            <div
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 transform origin-top transition-all duration-300 ease-in-out">
                <a href="{{ url('/createPost') }}"
                    class="block px-4 py-2 hover:bg-gray-100 text-gray-800 hover:text-gray-900 transition duration-300 ease-in-out">Create
                    Post</a>
                <a href="{{ url('/profile') }}"
                    class="block px-4 py-2 hover:bg-gray-100 text-gray-800 hover:text-gray-900 transition duration-300 ease-in-out">Profile</a>
                <a href="logout"
                    class="block px-4 py-2 hover:bg-gray-100 text-gray-800 hover:text-gray-900 transition duration-300 ease-in-out">Logout</a>
            </div>
        </div>

    </div>



    {{-- --------------- --}}
    {{-- --------------- --}}
    {{-- Main post form  --}}
    {{-- --------------- --}}
    {{-- --------------- --}}
    <div class="container mx-auto mt-10 p-6 bg-white rounded shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Welcome! {{ $data->name }} </h1>
        <form action="{{ route('create-post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Input (marked as required) -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium">Title</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500"
                    placeholder="Enter the title" required>
            </div>

            <!-- Description Input -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium">Description</label>
                <textarea id="description" name="description"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" rows="4"
                    placeholder="Enter the description" required></textarea>
            </div>

            <!-- Image File Input (with improved styling) -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium">Image</label>
                <div class="mt-1 flex items-center space-x-4">
                    <label
                        class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                        <span>Upload a file</span>
                        <input id="image" name="image" type="file" class="sr-only" accept="image/*" required>
                    </label>
                    <p class="text-gray-500">or drag and drop</p>
                </div>
                <p class="mt-2 text-sm text-gray-500" id="image-description">JPEG, PNG, GIF up to 50MB</p>
            </div>

            <!-- Image Preview -->
            <div class="mb-4 text-center">
                <img id="image-preview" class="image-preview hidden rounded-md mx-auto max-h-[85vh]" src=""
                    alt="Image Preview">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>



    <!-- JavaScript to handle image preview -->
    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        });
    </script>
</body>

</html>
