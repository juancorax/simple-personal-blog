<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $article->full_text }}
                </div>
            </div>

            @if ($article->author->is(auth()->user()))
                <div class="mt-4 flex items-center gap-4">
                    <a href="{{ route('articles.edit', $article) }}">
                        <x-primary-button>{{ __('Edit') }}</x-primary-button>
                    </a>

                    <form method="POST" action="{{ route('articles.destroy', $article) }}">
                        @csrf
                        @method('delete')

                        <x-danger-button
                            onclick="return confirm('Are you sure you want to delete this article?');">{{ __('Delete') }}</x-danger-button>
                    </form>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
