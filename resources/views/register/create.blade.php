<x-layout-auth>
    <section class="px-" py-8>
        <main class="max-w mx-auto">
            <form method="POST" action="/register">
                @csrf
                <div class="mb-6">

                    <x-form.input name="name"/>

                    <x-form.input name="email"/>

                    <x-form.input name="password"/>

                    <x-form.button>
                        Submit
                    </x-form.button>
                </div>
            </form>
        </main>
    </section>
</x-layout-auth>
