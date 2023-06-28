<x-layout-auth>
    @foreach($posts as $post)
        <div class="flex">
            <p> {{ $post->title }}</p>
            <a href="/admin/post/{{ $post->id }}/edit">Edit</a>
            <form method="POST" action="/admin/post/{{ $post->id }}">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>
        </div>
    @endforeach
</x-layout-auth>
