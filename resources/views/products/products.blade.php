<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="p-4 bg-white shadow sm:rounded-lg">
                        <div class="flex flex-col items-center">
                            @if ($product->picture)
                                <img src="data:image/jpeg;base64,{{ base64_encode($product->picture) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
                            @endif
                            <div class="mt-4 text-center">
                                <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">Price: ${{ $product->price }}</p>
                                <p class="text-sm text-gray-500">CPU: {{ $product->cpu }}</p>
                                <p class="text-sm text-gray-500">GPU: {{ $product->gpu }}</p>
                                <p class="text-sm text-gray-500">RAM: {{ $product->ram }}</p>
                                <p class="text-sm text-gray-500">Storage: {{ $product->storage }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
