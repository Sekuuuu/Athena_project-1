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
            <span class="text-white mr-2">{{ $data->name }}</span>
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

    {{-- --------------- --}}
    {{-- --------------- --}}
    {{-- Main post form  --}}
    {{-- --------------- --}}
    {{-- --------------- --}}
    <div class="container mx-auto mt-10 p-6 bg-white rounded shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Welcome! {{ $data->name }} </h1>
        <form action="{{ route('create-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <!-- Title Input (marked as required) -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium">Title</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
            </div> --}}

            <!-- Description Input -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium">Description</label>
                <textarea id="description" name="description"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" rows="4" required></textarea>
            </div>

            <!-- Image File Input (marked as required) -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium">Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
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
