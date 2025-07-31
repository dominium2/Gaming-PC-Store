<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($news as $post)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-500">{{ $post->post_date->format('F j, Y') }}</p>
                    @if ($post->picture)
                        <div class="flex justify-center">
                            <img src="data:image/jpeg;base64,{{ base64_encode($post->picture) }}" alt="{{ $post->title }}" class="mt-4 w-1/2 h-auto rounded-lg">
                        </div>
                    @endif
                    <p class="mt-4 text-gray-700">{{ $post->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
