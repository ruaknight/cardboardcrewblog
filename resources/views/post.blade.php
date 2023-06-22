<x-layout :post="$post">
    <x-slot name="banner"></x-slot>
    <article
        class="mx-auto p-5">

        <h1 style="font-family: Montserrat,sans-serif; font-weight: 500; font-size: xx-large; text-align: center">
            {{ $post->title }}
        </h1>

        <img src="{{ $post->main_image }}" alt="article image"
             class="w-[896px] object-cover my-5 rounded-xl border border-gray-300"/>

        <div class="flex align-middle text-blue-400 fill-blue-400 space-x-1">
            <img src="/images/user.svg" width="16" height="16" alt="">
            <a href="../?author={{$post->author->id}}">{{ $post->author->name }}</a>
            <img src="/images/clock.svg" width="16" height="16" alt="">
            <p>{{ $post->created_at->diffForHumans() }}</p>
            <img src="/images/tag.svg" width="16" height="16" alt="">
            <a href="../?category={{$post->category->name}}">
                {{ $post->category->name }}</a>
            @foreach($post->tags->pluck('name') as $tag)
                <a href="/tags/{{ $tag }}">{{ $tag }}</a>
            @endforeach
        </div>

        <p class="my-5">
            {{ $post->body }}
        </p>

        <hr>

        <h1 style="font-family: Montserrat; font-weight: 300; font-size: x-large;" class="pt-5 px-5" id="comment">
            Comments:</h1>
        @foreach($post->comments as $comment)
            <x-comment :comment="$comment"/>
        @endforeach

        @auth()
            <x-post-comment :post="$post"/>
        @endauth

    </article>
</x-layout>
