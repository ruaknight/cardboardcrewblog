<x-layout>

    <x-slot name="banner">
        <x-banner/>
    </x-slot>

    <div>
        <form method="POST" action="/admin/post/create">
            @csrf

            <select name="category_id">
                @php
                    $categories = \App\Models\Category::all()
                @endphp
                @foreach($categories as $category)

                    <option value= {{ $category->id }} >{{ $category->name}}</option>
                @endforeach
            </select>

            <label class="block mb-2 uppercase font-bold text-xs" for="title">
                Title
            </label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="title" value="{{old('title')}}" required>

            <label class="block mb-2 uppercase font-bold text-xs" for="excerpt">
                Summary
            </label>
            <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" value="{{old('excerpt')}}" required></textarea>

            <label class="block mb-2 uppercase font-bold text-xs" for="body">
                Content
            </label>
            <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" value="{{old('body')}}" required></textarea>

            <div class="mb-6 mt-6">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
