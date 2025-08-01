<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Welcome to the Gaming PC Store</h1>
            <p class="text-lg text-gray-300">Your one-stop shop for high-performance gaming PCs.</p>
        </div>
    </div>
    <div class="w-full h-auto py-12"
        @if ($image2)
            style="background-image: url('data:image/jpeg;base64,{{ base64_encode($image2->image_data) }}'); background-size: cover; background-position: center;"
        @endif
    >
        <div class="container mx-auto px-4 flex justify-center items-center">
            @if ($image1)
                <img src="data:image/jpeg;base64,{{ base64_encode($image1->image_data) }}" alt="Gaming PC 1" class="w-400 h-auto rounded-lg shadow">
            @else
                <p class="text-gray-300">Image with ID 1 not found.</p>
            @endif
        </div>
        <div class="container mx-auto px-4 flex justify-center items-center mt-8">
            <button class="mt-8 px-4 py-2 bg-white text-black rounded hover:bg-gray-300">
                <a href="{{ route('products.index') }}">View Products</a>
            </button>
        </div>
    </div>
</x-app-layout>
