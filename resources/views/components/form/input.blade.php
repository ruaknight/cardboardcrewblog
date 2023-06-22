@props(['name', 'type' => 'text'])

<x-form.field name="{{ $name }}">

    <input class="border border-gray-400 p-2 w-full" type="{{ $type }}" name="{{ $name }}"
           value="{{old($name)}}" required>

</x-form.field>
