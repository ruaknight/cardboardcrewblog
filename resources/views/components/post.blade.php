@props(['post'])

<article
    class="mb-14 mx-auto transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 hover:drop-shadow-sm rounded-xl p-5">

    <h1 style="font-family: Montserrat,sans-serif; font-weight: 500; font-size: x-large; color: #60a5fa">
        {{ $post->title }}
    </h1>

    <img src="images\post1.jpg" alt="article image"
         class="h-64 w-[896px] object-cover my-5 rounded-xl border border-gray-300"/>

    <div class="flex align-middle text-blue-400 fill-blue-400 space-x-1">
        <img src="images\user.svg" width="16" height="16" alt="">
        <a href="#">{{ $post->author->name }}</a>
        <img src="images\clock.svg" width="16" height="16" alt="">
        <a href="#">{{ $post->created_at->diffForHumans() }}</a>
        <img src="images\tag.svg" width="16" height="16" alt="">
        <a href="#">
            {{ $post->category->name }}</a>
        <a href="#">{{ $post->tag->name }}</a>
        <a href="#">Tag2</a>
    </div>

    <p class="mt-5">
        {{ $post->body }}
    </p>

    <footer class="flex justify-between mt-5 text-blue-400">
        <a href="/post/{{ $post->id }}">Continue Reading</a>
        <a href="#">{{ $post->comment->count() }} comments</a>
    </footer>
</article>
