<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>

            @auth
                <a href="{{ route('categories.create') }}">
                    <x-primary-button>{{ __('Create Category') }}</x-primary-button>
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($categories->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        No categories yet :(
                    </div>
                </div>
            @else
                @foreach ($categories as $category)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg {{ $loop->last ? '' : 'mb-4' }}">
                        <div class="flex justify-between items-center">
                            <div class="p-6 text-gray-900">
                                {{ $category->name }}
                            </div>

                            <div class="p-6 flex items-center gap-4">
                                <a href="{{ route('categories.edit', $category) }}">
                                    <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                </a>

                                <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                    @csrf
                                    @method('delete')

                                    <x-danger-button
                                        onclick="return confirm('Are you sure you want to delete this category?');">{{ __('Delete') }}</x-danger-button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
