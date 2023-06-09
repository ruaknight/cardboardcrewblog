<div class="mt-5">

    <div class="flex justify-center">

        <div class="flex flex-col items-center w-100 px-5">
            <div class="flex flex-col">
                <img src="/images/post1.jpg" class="self-center h-14 w-14 rounded-full bg-red-500 object-cover" alt="">
                <p class="self-center">{{ $comment->user->name }}</p>
                <p class="self-center">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="relative">
            <div class="text-gray-800 text-sm bg-gray-100 w-[600px] p-3 border border-gray-300 rounded-lg">
                <p> {{ $comment->comment }} </p>
            </div>
            <div
                class="absolute top-[10px] left-0 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-4 h-4 bg-gray-100 border-l border-b border-gray-300">
            </div>
        </div>
    </div>
</div>
