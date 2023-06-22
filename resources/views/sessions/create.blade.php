<x-layout>
    <section class="px-" py-8>
        <x-slot name="banner"></x-slot>


        <main class="max-w mx-auto">
            <form method="POST" action="/sessions">
                @csrf
                <div class="mb-6">
                    <x-form.input name="email"/>

                    <x-form.input name="password" type="password"/>

                    <x-form.button>
                        Log in
                    </x-form.button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
