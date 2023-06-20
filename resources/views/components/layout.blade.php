<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board game blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body>
<nav class="mx-auto flex align-middle items-center bg-white justify-evenly h-20 sticky top-0 p-5 z-10 drop-shadow-md">
    <a href="/" class="uppercase" style="font-family: Montserrat; font-weight: 500;">Cardboard crew</a>



    <div class="flex space-x-6 align-middle items-center">
        <select name="categories" id="categories">
            <option value="news">news</option>
            <option value="reviews">reviews</option>
        </select>

        @auth
            @if(auth()->user()->role === 'author' || auth()->user()->role === 'admin')
                <a href="/admin/post/create">Create a post</a>
            @endif
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">log out</button>
            </form>
        @else
            <a href="/register">register</a>
            <a href="/login">log in</a>
        @endauth

        <div class="flex items-center align-middle">
            <form method="GET" action="#" class="bg-gray-100 py-1.5 px-3 rounded-full flex items-center align-middle">
                <img src="/images/Search_Icon.svg" alt="Search_Icon" width="20" height="20" />
                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-gray-100 outline-none pl-2"
                       value="{{ request('search') }}">
            </form>
        </div>
        @auth
            <img src="https://i.pravatar.cc/150?img={{ auth()->id() }}"
                 class="self-center h-10 w-10 rounded-full object-cover">
        @endauth
    </div>
</nav>

{{ $banner }}

<main class="bg-gray-100">
    <div class="max-w-4xl bg-white drop-shadow-sm mx-auto px-5 py-10">

        {{ $slot }}

    </div>
</main>

<footer>

</footer>
</body>

@if(session()->has('success'))
    <div>
        <p class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">{{ session()->get('success') }}</p>
    </div>
@endif

</html>
