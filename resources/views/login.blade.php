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
    {{-- full body --}}
    <div class=" min-h-screen flex  ">
        {{-- first half --}}
        <div class="flex-1  p-4 h-auto">
            {{-- Just the app name --}}
            <div class=" text-3xl font-league-spartan p-3 font-bold">
                Athena.
            </div>

            {{-- Main login component  --}}
            <div class="flex justify-center items-center h-5/6 bg-white">
                <div class="flex flex-col justify-center items-center text-center">
                    <span class="text-8xl ">Hi there!</span>
                    <span class=" ">Welcome to Athena. Community Dashboard</span><br>
                    <a href="{{ 'auth/google' }}"
                        class="min-w-full bg-white ring-1 outline outline-slate-200 hover:bg-gray-100 focus:bg-gray-200  rounded-lg px-5 py-2.5  flex flex-row justify-center items-center text-center">
                        <img src="/images/google-icon.png" alt="" class=" w-4 mr-1">
                        Log in with Google
                    </a>
                    <div class="flex flex-row min-w-full justify-center items-center text-center my-1">
                        <hr class="my-5 w-1/6 border border-gray-200 block">
                        <span class=" mx-3 text-sm">or</span>
                        <hr class="my-5 w-1/6 border border-gray-300 block">

                    </div>

                    {{-- form --}}
                    <form class="bg-white min-w-full" autocomplete="off" action="{{ route('login-user') }}"
                        method="POST">
                        @csrf
                        @if (Session::has('success'))
                            <div class="text-green-700 text-xl bg-green-100 block mb-4 px-4 py-3 rounded">
                                {{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="text-red-700 text-xl bg-red-100 px-4 py-3 block mb-4 rounded">
                                {{ Session::get('fail') }}</div>
                        @endif

                        <!-- Email Input -->
                        <div class="mb-4 ">

                            <input type="email" id="email" name="email" placeholder="Your email"
                                autocomplete="off"
                                class="w-full px-4 py-3 border rounded focus:outline-none focus:border-gray-500 text-sm">
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">

                            <input type="password" id="password" name="password" placeholder="Password"
                                class="w-full px-4 py-3 border rounded focus:outline-none focus:border-gray-500  text-sm">
                        </div>

                        {{-- halna baki code  --}}
                        {{-- <div class="flex justify-end text-right text-sm">
                            <a href="#" class=" text-sky-500 font-bold">Forgot password?</a>
                        </div> --}}



                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full my-5 bg-gray-900 text-white font-semibold py-3 rounded-lg hover:bg-gray-600 ">
                            Log in
                        </button>

                        <div class="text-sm">Don't have an account?
                            <a href="register" class="pl-1 text-sky-500 font-bold">Sign up</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        {{-- second half picture  --}}
        <div class="">
            <img src="/images/login_image.jpg" alt="photowa" class=" max-h-screen m-0">
        </div>
    </div>
</body>

</html>
