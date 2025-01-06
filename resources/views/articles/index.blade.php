<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>

            @auth
                <a href="{{ route('articles.create') }}">
                    <x-primary-button>{{ __('Create Article') }}</x-primary-button>
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($articles->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        No articles yet :(
                    </div>
                </div>
            @else
                @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article) }}">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg {{ $loop->last ? '' : 'mb-4' }}">
                            <div class="p-6 text-gray-900">
                                {{ $article->title }}
                            </div>
                        </div>
                    </a>
                @endforeach

                {{ $articles->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
