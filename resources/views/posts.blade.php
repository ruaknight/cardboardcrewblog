<x-layout :posts="$posts">
    <x-slot name="banner">
        <x-banner/>
    </x-slot>

    @foreach($posts as $post)
        <main class="mb-14 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 hover:drop-shadow-sm rounded-xl p-5">
            <x-post-card :post="$post"/>
        </main>
    @endforeach
</x-layout>
