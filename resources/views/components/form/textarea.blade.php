@props(['name'])

<x-form.field name="{{ $name }}">

<textarea class="border border-gray-400 p-2 w-full" name="{{ $name }}" required>
    {{old($name)}}
</textarea>

</x-form.field>
