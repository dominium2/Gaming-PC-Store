<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $product->name }}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" value="{{ $product->price }}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="cpu" :value="__('CPU')" />
                        <x-text-input id="cpu" name="cpu" type="text" class="mt-1 block w-full" value="{{ $product->cpu }}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="gpu" :value="__('GPU')" />
                        <x-text-input id="gpu" name="gpu" type="text" class="mt-1 block w-full" value="{{ $product->gpu }}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ram" :value="__('RAM')" />
                        <x-text-input id="ram" name="ram" type="text" class="mt-1 block w-full" value="{{ $product->ram }}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="storage" :value="__('Storage')" />
                        <x-text-input id="storage" name="storage" type="text" class="mt-1 block w-full" value="{{ $product->storage }}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="picture" :value="__('Picture (Optional)')" />
                        <x-text-input id="picture" name="picture" type="file" class="mt-1 block w-full" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ $product->description }}</textarea>
                    </div>

                    <x-primary-button class="mt-4">{{ __('Update Product') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
