<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex items-center justify-between">
                    @if ($product->picture)
                        <img src="data:image/jpeg;base64,{{ base64_encode($product->picture) }}" alt="{{ $product->name }}" class="w-1/3 h-auto rounded-lg">
                    @endif
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500">Price: ${{ $product->price }}</p>
                        <p class="text-sm text-gray-500">CPU: {{ $product->cpu }}</p>
                        <p class="text-sm text-gray-500">GPU: {{ $product->gpu }}</p>
                        <p class="text-sm text-gray-500">RAM: {{ $product->ram }}</p>
                        <p class="text-sm text-gray-500">Storage: {{ $product->storage }}</p>
                        <p class="mt-4 text-gray-700">{{ $product->description }}</p>
                    </div>
                    <div class="ml-4 text-right">
                        <button class="mt-4 inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Order Now') }}
                        </button>
                        <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
