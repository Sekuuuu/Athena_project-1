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
                    onclick="openImageModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}', '{{ $item->description }}')">
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
    <div id="imageModal" class="fixed inset-0  hidden">
        <div class=" flex items-center justify-center w-full">
            <div class="absolute inset-0 bg-black bg-opacity-90"></div>
            <div class="max-w-3xl mx-auto overflow-hidden rounded-lg shadow-lg grid grid-cols-4">
                <!-- Title and Description Column -->
                <div class="p-4 bg-white col-span-1">
                    <h2 id="modalTitle" class="text-lg font-semibold mb-2"></h2>
                    <p id="modalDescription" class="text-gray-400"></p>
                </div>
                <!-- Image Column -->
                <div class="relative pb-[75%] col-span-3">
                    <img id="modalImage" class="absolute inset-0 w-full h-full object-cover" src=""
                        alt="">
                </div>
            </div>
            <button onclick="closeImageModal()"
                class="absolute top-2 right-2 text-white hover:text-gray-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
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
            modalTitle.textContent = title;
            modalDescription.textContent = description;

            modal.classList.remove('hidden');
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }
    </script>

</body>

</html>
