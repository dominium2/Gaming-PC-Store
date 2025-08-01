<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Add Product Form -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Add Product</h3>
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="mt-4">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="cpu" :value="__('CPU')" />
                        <x-text-input id="cpu" name="cpu" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="gpu" :value="__('GPU')" />
                        <x-text-input id="gpu" name="gpu" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ram" :value="__('RAM')" />
                        <x-text-input id="ram" name="ram" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="storage" :value="__('Storage')" />
                        <x-text-input id="storage" name="storage" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="picture" :value="__('Picture')" />
                        <x-text-input id="picture" name="picture" type="file" class="mt-1 block w-full" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                    </div>

                    <x-primary-button class="mt-4">{{ __('Add Product') }}</x-primary-button>
                </form>
            </div>

            <!-- Existing Products -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Existing Products</h3>
                <div class="mt-4 max-h-64 overflow-y-auto border border-gray-300 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $product->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">${{ $product->price }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        <a href="{{ route('products.edit', $product->id) }}" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Edit') }}
                                        </a>
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="inline">
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
