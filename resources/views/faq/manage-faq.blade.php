<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Add FAQ</h3>
                <form method="POST" action="{{ route('faq.store') }}" class="mt-4">
                    @csrf
                    <div>
                        <x-input-label for="category" :value="__('Category')" />
                        <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="question" :value="__('Question')" />
                        <x-text-input id="question" name="question" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="answer" :value="__('Answer')" />
                        <textarea id="answer" name="answer" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                    </div>
                    <x-primary-button class="mt-4">{{ __('Add FAQ') }}</x-primary-button>
                </form>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Existing FAQs</h3>
                <div class="mt-4 max-h-64 overflow-y-auto border border-gray-300 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Question</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Answer</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $faq->category }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $faq->question }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $faq->answer }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        <form method="POST" action="{{ route('faq.destroy', $faq->id) }}" class="inline">
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
