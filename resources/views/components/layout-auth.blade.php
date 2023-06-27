<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board game blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body>
{{--{{ dd($hotBgs) }}--}}
<nav class="mx-auto flex align-middle items-center bg-white justify-evenly h-20 sticky top-0 p-5 z-10 drop-shadow-md">
    <a href="/" class="uppercase" style="font-family: Montserrat; font-weight: 500;">Cardboard crew</a>

    <div class="flex space-x-6 align-middle items-center">

        @if(auth()->guest())
            <a href="/register">register</a>
            <a href="/login">log in</a>
        @endif

        <div class="relative flex inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>
                <x-slot name="trigger">
                    <button type="button" class="py-2 pl-3 pr-9">Category</button>
                </x-slot>

                <div x-show="show" class="w-full py-2 absolute bg-gray-100 rounded-xl mt-2 z-10" style="display: none">
                    @php
                        $categories = \App\Models\Category::all()
                    @endphp
                    @foreach($categories as $category)
                        <a href="/?category={{ $category->name }}"
                           class="block text-sm px-3 leading-6 hover:bg-gray-300 focus:bg-gray-400">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </x-dropdown>
        </div>

        <div class="flex items-center align-middle">
            <form method="GET" action="/" class="bg-gray-100 py-1.5 px-3 rounded-full flex items-center align-middle">
                <img src="/images/Search_Icon.svg" alt="Search_Icon" width="20" height="20"/>
                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-gray-100 outline-none pl-2"
                       value="{{ request('search') }}">
            </form>
        </div>
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button type="button">
                        <img src="https://i.pravatar.cc/150?img={{ auth()->id() }}"
                             class="self-center h-10 w-10 rounded-full object-cover">
                    </button>
                </x-slot>

                <div x-show="show" class="py-2 text-sm px-3 absolute bg-gray-100 rounded-xl mt-2 z-10"
                     style="display: none">

                    @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
                        <a href="/admin/post/create">Create a post</a>
                    @endif
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit">log out</button>
                    </form>
                </div>
            </x-dropdown>
        @endauth
    </div>
</nav>

<main class="bg-gray-100">
    <div class="max-w-5xl drop-shadow-sm mx-auto px-5 py-10 grid grid-cols-7 gap-2">
        <div class="col-start-1 col-end-8 bg-white rounded-xl px-5 pt-5">
            {{ $slot }}
        </div>
    </div>
</main>

<form method="POST" action="/newsletter" class="py-1.5 px-3 rounded-full flex items-center align-middle">
    @csrf
    <input type="text"
           name="email"
           placeholder="you email"
           class="bg-gray-100 outline-none pl-2"
           value="{{ request('email') }}">

    @error('email')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</form>

</body>

<footer>


</footer>

@if(session()->has('success'))
    <div>
        <p class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">{{ session()->get('success') }}</p>
    </div>
@endif

</html>
