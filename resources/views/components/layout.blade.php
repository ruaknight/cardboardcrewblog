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
<nav class="mx-auto flex bg-white justify-evenly items-center h-20 sticky top-0 p-5 z-10 drop-shadow-md">
    <a href="#" class="uppercase" style="font-family: Montserrat; font-weight: 500;">Cardboard crew</a>
    <div class="flex space-x-6">
        <select name="categories" id="categories">
            <option value="news">news</option>
            <option value="reviews">reviews</option>
        </select>
        <select name="classification" id="classify">
            <option value="euro">euro</option>
            <option value="americatrash">americatrash</option>
        </select>
        <img src="images\Search_Icon.svg" alt="Search_Icon" width="15" height="15" />
    </div>
</nav>

<x-banner/>

<main class="bg-gray-100">
    <div class="max-w-4xl bg-white drop-shadow-sm mx-auto px-5 py-10">
        @foreach($posts as $post)
            <x-post :post="$post"/>
        @endforeach

    </div>
</main>
<footer>

</footer>
</body>

</html>
