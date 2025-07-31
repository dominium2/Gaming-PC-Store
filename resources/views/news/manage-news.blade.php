<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage News') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create News Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <textarea id="content" name="content" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="picture" :value="__('Picture')" />
                        <x-text-input id="picture" name="picture" type="file" class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('picture')" />
                    </div>

                    <x-primary-button class="mt-4">{{ __('Create News Post') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="mt-4 max-h-64 overflow-y-auto border border-gray-300 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($news as $post)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $post->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $post->title }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        <!-- Edit Button -->
                                        <a href="{{ route('news.edit', $post->id) }}" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Edit') }}
                                        </a>

                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('news.destroy', $post->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button class="bg-red-600 hover:bg-red-700">
                                                {{ __('Delete') }}
                                            </x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
