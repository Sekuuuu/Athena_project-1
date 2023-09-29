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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body>
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
                class=" z-20 absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 transform origin-top transition-all duration-300 ease-in-out">
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

    {{-- Main body --}}

    @php
        $i = 0;
    @endphp
    @foreach ($post as $item)
        @php
            $i = $loop->iteration;
        @endphp
    @endforeach


    <div class="text-xl font-semibold m-4">{{ $data->name }}'s Gallery ({{ $i }} images)</div>
    {{-- Images --}}
    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <div class="flex flex-col">

            @foreach ($post as $item)
                @php
                    $i = $loop->iteration;
                @endphp
            @endforeach


            @foreach ($post as $item)
                {{-- Image --}}
                <button class="relative h-max group"
                    onclick="openImageModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}', '{{ htmlspecialchars($item->description, ENT_QUOTES) }}')">
                    <img class="h-max w-full rounded-lg p-1 cursor-pointer" src="{{ asset('storage/' . $item->image) }}"
                        alt="">
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center opacity-0 bg-black bg-opacity-50 group-hover:opacity-100 transition-opacity">
                        <p class="text-gray-200 text-center select-none">
                            {{ $item->description }} <br>
                        </p>

                        <p class="text-gray-400">
                            --View--
                        </p>
                    </div>
                </button>
                @if ($loop->iteration % ceil($i / 3) == 0)
        </div>
        <div class="flex flex-col">
            @endif
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 hidden">
        <div class="flex items-center justify-center w-full h-full">
            <div class="absolute inset-0 bg-black bg-opacity-90"></div>

            <div class="w-[80%] mx-auto overflow-hidden rounded-lg shadow-lg grid grid-cols-4 relative">
                <!-- Image Column -->
                <div class="relative pb-[75%] col-span-3 flex items-center justify-center">
                    <img id="modalImage" class="absolute inset-0 max-w-full h-full object-cover" src=""
                        alt="">
                </div>

                <!-- Title and Description and Comments Column -->
                <div class="p-4 bg-white col-span-1 flex flex-col">
                    <!-- Title (Top-Left) -->
                    <h3 id="modalTitle" class="text-lg font-semibold mb-2 self-start"></h3>
                    <!-- Description -->
                    <p id="modalDescription" class="text-gray-400 mb-4"></p>
                    <!-- Like Button (with Font Awesome Palette Icon) -->
                    <button id="likeButton" onclick="toggleLike()"
                        class="text-gray-400 hover:text-red-400 focus:outline-none self-start">
                        <i class="fas fa-palette text-xl"></i> Like
                    </button>

                    <!-- Comments Section (Scrollable) -->
                    <div class="mt-4 overflow-y-auto">
                        <!-- Individual Comments Go Here -->

                        <div class="mb-2">
                            <strong>Username:</strong> This is a comment.
                        </div>

                    </div>
                </div>


            </div>


            <!-- Close Button -->
            <button onclick="closeImageModal()"
                class="absolute top-[2%] right-2 text-white hover:text-gray-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-8 w-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <div class="absolute right-5 top-[10%] mt-1/6 focus:outline-none">
                <!-- Triple Dot Button -->
                <button class="focus:outline-none" onclick="toggleDropdown()">
                    <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600 text-lg"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="absolute right-0 mt-2 w-32 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                    <ul class="py-2">
                        <!-- Edit Option -->
                        <li>
                            <a href="#" onclick="editImage()"
                                class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                        </li>
                        <!-- Delete Option -->
                        <li>
                            <a href="#" onclick="deleteImage()"
                                class="block px-4 py-2 text-red-600 hover:text-red-800">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>





    <script>
        function openImageModal(imageSrc, title, description) {

            console.log('Open modal called');

            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');

            modalImage.src = imageSrc;
            modalTitle.innerHTML = title;
            modalDescription.innerHTML = description;

            modal.classList.remove('hidden');
        }

        function deleteImage() {
            console.log("delete button called");
        }

        let isLiked = false;

        function toggleLike() {
            isLiked = !isLiked;
            const likeButton = document.getElementById('likeButton');

            if (isLiked) {
                likeButton.classList.remove('text-gray-400');
                likeButton.classList.add('text-red-400');
            } else {
                likeButton.classList.remove('text-red-400');
                likeButton.classList.add('text-gray-400');
            }
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }


        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }
    </script>

</body>


</html>
