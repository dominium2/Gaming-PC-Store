<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($faqs as $category => $items)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">{{ $category }}</h3>
                    <ul class="mt-4 space-y-2">
                        @foreach ($items as $faq)
                            <li>
                                <strong>{{ $faq->question }}</strong>
                                <p class="text-gray-700">{{ $faq->answer }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
