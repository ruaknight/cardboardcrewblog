<x-layout>

    <x-slot name="banner">
        <x-banner/>
    </x-slot>

    <div>
        <form method="POST" action="/admin/post/create">
            @csrf
            <x-form.field name="category">
                <select name="category_id">
                    @php
                        $categories = \App\Models\Category::all()
                    @endphp
                    @foreach($categories as $category)

                        <option value= {{ $category->id }} >{{ $category->name}}</option>
                    @endforeach
                </select>
            </x-form.field>

            <x-form.input name="title"/>

            <x-form.input name="excerpt"/>

            <x-form.textarea name="body"/>

            <x-form.button>
                Submit
            </x-form.button>
        </form>
    </div>
</x-layout>
