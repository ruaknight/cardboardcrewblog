<x-layout>
    <section class="px-" py-8>
        <x-slot name="banner"></x-slot>


        <main class="max-w mx-auto">
            <form method="POST" action="/register">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs" for="name">
                        Username
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" value="{{old('name')}}" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                    <label class="block mb-2 uppercase font-bold text-xs" for="email">
                        Email address
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="email" value="{{old('email')}}" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                    <label class="block mb-2 uppercase font-bold text-xs" for="password">
                        Password
                    </label>
                    <input type="password" class="border border-gray-400 p-2 w-full" name="password" required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                    <div class="mb-6 mt-6">
                        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </main>
    </section>

    @if(session()->has('success'))
        <div>
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
</x-layout>
