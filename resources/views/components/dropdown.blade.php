<div x-data="{ show: false }" @click.outside="show = false">
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{ $slot }}

</div>
