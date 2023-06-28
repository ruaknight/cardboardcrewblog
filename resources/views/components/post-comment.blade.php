<div class="p-5">
    <h1 style="font-family: Montserrat; font-weight: 300; font-size: x-large;" class="py-5">Post
        something?</h1>
    <div class="flex space-x-3">
        <div class="flex flex-none flex-col align-middle items-center w-32">
            <img src="https://i.pravatar.cc/150?img={{ auth()->id() }}"
                 class="self-center h-14 w-14 rounded-full object-cover">
            <p>{{ auth()->user()->name }}</p>
        </div>
        <form method="POST" action="/comment" class="relative">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea class="border border-blue-400 rounded-lg p-2 pl-5 w-[450px] h-24 outline-none" type="text"
                      name="comment"></textarea>
            <div
                class="absolute top-[5px] left-0 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-4 h-4 bg-white border-l border-b border-blue-400">
            </div>
            @error('name')
            <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
            @enderror
            <button type="submit" class="w-full text-center mt-2 p-2 bg-blue-400 rounded-lg block">Submit</button>
        </form>
    </div>
</div>
