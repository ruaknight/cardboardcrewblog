@props(['post'])

<article
    class="mx-auto">

    <a href="/post/{{ $post->title }}" style="font-family: Montserrat,sans-serif; font-weight: 500; font-size: x-large; color: #60a5fa">
        {{ $post->title }}
    </a>

    <img src="{{ $post->main_image }}" alt="article image"
         class="h-64 w-[896px] max-w object-cover my-5 rounded-xl border border-gray-300"/>

    <div class="flex align-middle text-blue-400 fill-blue-400 space-x-1">
        <img src="/images/user.svg" width="16" height="16" alt="">
        <a href="/authors/{{$post->author->name}}">{{ $post->author->name }}</a>
        <img src="/images/clock.svg" width="16" height="16" alt="">
        <p>{{ $post->created_at->diffForHumans() }}</p>
        <img src="/images/tag.svg" width="16" height="16" alt="">
        <a href="/categories/{{$post->category->name}}">
            {{ $post->category->name }}</a>
        @foreach($post->tags->pluck('name') as $tag)
            <a href="/tags/{{ $tag }}">{{ $tag }}</a>
        @endforeach
    </div>

    <p class="mt-5">
        {{ $post->body }}
    </p>

    <footer class="flex justify-between mt-5 text-blue-400">
        <a href="/post/{{ $post->title }}">Continue Reading</a>
        <a href="/post/{{ $post->title }}/#comment">{{ $post->comments->count() }} comments</a>
    </footer>
</article>
