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

<body class="font-league-spartan">
    {{-- Navigation Bar --}}
    <div class=" bg-slate-200 h-14 flex flex-row justify-between items-center px-4">
        {{-- Logo --}}
        <div class="flex items-center ml-4 mr-24">
            <a href="{{ url('/dashboard') }}" class="text-black text-lg font-semibold">Athena</a>
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
                class="bg-gray-400 rounded-full flex items-center px-4 h-10 text-white hover:bg-gray-500 focus:outline-none transition duration-300 ease-in-out">
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


    <div class=" max-w-full text-2xl my-4 text-center flex flex-col justify-center items-center">

        <div class="w-24 h-24 rounded-full overflow-hidden mb-4">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $item->image) }}">
        </div>
        <div>
            {{ $data->name }}
        </div>
        <div class="flex flex-row">
            {{ $i }} images | 7 Followers
        </div>

    </div>
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
                    onclick="openImageModal('{{ asset('storage/' . $item->image) }}', '{{ htmlspecialchars($item->title, ENT_QUOTES) }}', '{{ htmlspecialchars($item->description, ENT_QUOTES) }}')">
                    <img class="h-max w-full rounded-lg p-1 cursor-pointer "
                        src="{{ asset('storage/' . $item->image) }}" alt="">
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center opacity-0 bg-black bg-opacity-50 group-hover:opacity-100 transition-opacity">
                        <p class="text-gray-200 text-center select-none text-lg">
                            {{ $item->title }} <br>
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
    <div id="imageModal"
        class="fixed inset-0 w-screen h-screen hidden bg-black bg-opacity-90 flex items-center justify-center p-6">
        <button onclick="closeImageModal()"
            class="text-gray-300 hover:text-red-500 transition focus:outline-none absolute top-5 left-4">
            <i class="fas fa-arrow-left text-lg"></i> Back
        </button>
        <div class="min-w-[60%] min-h-[70%] max-w-[70%] max-h-[80%] bg-white flex flex-row relative rounded-md">

            <div class="relative flex items-center justify-center w-[75%] group overflow-hidden">
                <img id="modalbackground" class="absolute top-0 left-0 w-full h-full object-cover blur-md">
                <img id="modalImage" class="relative z-10 max-w-full max-h-full">
            </div>

            <div class="w-[25%]">
                <div class="rounded-lg overflow-hidden shadow-lg p-6 mb-6">

                    <div class="flex flex-row justify-between">
                        <div id="modalTitle" class="text-3xl font-bold mb-2"></div>
                        <!-- Dropdown menu -->
                        <div class="relative inline-block text-left">
                            <button onclick="toggleDropdown()" type="button"
                                class="text-gray-500 hover:text-red-500 transition focus:outline-none">
                                <i class="fas fa-ellipsis-v text-lg"></i>
                            </button>

                            <!-- Dropdown menu content -->
                            <div id="dropdownMenu"
                                class="hidden absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <div class="hover:bg-gray-100 px-4 py-2 cursor-pointer" onclick="editItem()">Edit</div>
                                <div class="hover:bg-gray-100 px-4 py-2 cursor-pointer text-red-500"
                                    onclick="deleteItem()">Delete</div>
                            </div>
                        </div>

                    </div>
                    <div id="modalDescription" class="text-lg text-gray-700 mb-4"></div>
                    <div class="flex items-center justify-center">
                        <button id="likeButton" onclick="toggleLike()"
                            class="flex items-center space-x-2 text-gray-500 hover:text-red-500 transition focus:outline-none">
                            <i id="likeIcon" class="fas fa-paint-brush text-lg w-12"></i>
                        </button>
                        <!-- Add more user-related elements here -->
                    </div>
                </div>

                <!-- Comment Section -->
                <div class="rounded-lg overflow-hidden shadow-lg p-6">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Comments</h3>
                        <!-- Single Comment -->
                        <div class="flex items-center space-x-2">
                            <p class="text-gray-700">Example Comment</p>
                        </div>
                        <!-- Add more comments as needed -->
                    </div>
                    <!-- Your comment section content goes here -->
                </div>
            </div>
        </div>
    </div>





    <script>
        function openImageModal(imageSrc, title, description) {

            console.log('Open modal called');

            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalBG = document.getElementById('modalbackground');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');

            let bgimg = "url('" + imageSrc + "')";

            modalBG.src = imageSrc;

            // modalBG.classList.add('backdrop-blur-md');

            modalImage.src = imageSrc;

            modalTitle.innerHTML = title;
            modalDescription.innerHTML = description;

            modal.classList.remove('hidden');
        }

        function editItem() {
            // Add your logic for editing an item here
            console.log('Edit item clicked');
        }

        function deleteImage() {
            console.log("delete button called");
        }

        let isLiked = false;

        function toggleLike() {
            isLiked = !isLiked;
            const likeButton = document.getElementById('likeButton');
            const likeIcon = document.getElementById('likeIcon');

            if (isLiked) {
                likeIcon.classList.remove('text-gray-500');
                likeIcon.classList.add('text-red-500');
            } else {
                likeIcon.classList.remove('text-red-500');
                likeIcon.classList.add('text-gray-500');
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
