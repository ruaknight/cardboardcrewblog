<x-layout>

    <x-slot name="banner">
        <x-banner/>
    </x-slot>

    <div>
        <form method="POST" action="/admin/post/create">
            @csrf
            <x-form.input name="title"/>

            <x-form.field name="category">
                <select class="bg-gray-100 rounded-xl w-30 px-2 py-1">
                @php
                    $categories = \App\Models\Category::all()
                @endphp
                @foreach($categories as $category)
                    <option value="{{ $category->name }}"
                       class="block text-sm px-3 leading-6 hover:bg-gray-300 focus:bg-gray-400">
                        {{ $category->name }}
                    </option>
                @endforeach
                </select>
            </x-form.field>

            <x-form.input name="excerpt"/>

            <x-form.textarea name="body"/>

            <x-form.button>
                Submit
            </x-form.button>
        </form>
    </div>
</x-layout>
