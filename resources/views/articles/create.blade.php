<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('articles.store') }}">
                @csrf

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />

                <label for="full_text">Full Text:</label>
                <textarea id="full_text" name="full_text"
                    class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('full_text') }}</textarea>
                <x-input-error :messages="$errors->get('full_text')" class="mt-2" />

                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="block">
                    <option value="">--- Select Category ---</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

                <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
