<x-layout-auth>
    @foreach($posts as $post)
        <div class="flex justify-between">
            <p> {{ $post->title }}</p>
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
