<div class="mt-5">
    <div class="flex justify-center px-5 space-x-3 py-2">
        <div class="flex flex-col w-32  shrink-0">
            <img src="/images/post1.jpg" class="self-center h-14 w-14 rounded-full bg-red-500 object-cover">
            <p class="text-center text-sm text-gray-800">{{ $comment->user->name }}</p>
        </div>

        <div class="relative">
            <div class="text-gray-800 w-full bg-white p-3 border border-blue-400 rounded-lg">
                <p>{{ $comment->comment }}</p>
            </div>
            <div
                class="absolute top-[5px] left-0 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-4 h-4 bg-white border-l border-b border-blue-400">
            </div>

            <p class="text-right text-gray-500 text-sm">posted {{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
