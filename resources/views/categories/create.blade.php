<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
