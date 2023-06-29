<x-layout-auth>
    <h1 class="uppercase py-2 px-1" style="font-family: Montserrat; font-size: x-large; font-weight: 500;">All posts</h1>

    @foreach($posts as $post)
        <div class="flex justify-between py-2 border-t-2 border-gray-100">
            <div class="flex">
                <p> {{$post->id }}</p>
                <p class="px-5"> {{ $post->title }}</p>
            </div>
            <div class="flex">
                <a href="/admin/post/{{ $post->id }}/edit" class="px-5">Edit</a>
                <form method="POST" action="/admin/post/{{ $post->id }}">
                    @csrf
                    @method('DELETE')

                    <button>Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</x-layout-auth>
