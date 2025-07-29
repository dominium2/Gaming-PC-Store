@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-white mb-4">Welcome to the Gaming PC Store</h1>
        <p class="text-lg text-gray-300">Your one-stop shop for high-performance gaming PCs and accessories.</p>

        <!-- Example Div 1 -->
        <div class="mt-8">
            @if ($image1)
                <img src="data:image/jpeg;base64,{{ base64_encode($image1->image_data) }}" alt="Gaming PC 1" class="w-full h-auto rounded-lg shadow">
            @else
                <p class="text-gray-300">Image with ID 1 not found.</p>
            @endif
        </div>

        <!-- Example Div 2 -->
        <div class="mt-8">
            @if ($image2)
                <img src="data:image/jpeg;base64,{{ base64_encode($image2->image_data) }}" alt="Gaming PC 2" class="w-full h-auto rounded-lg shadow">
            @else
                <p class="text-gray-300">Image with ID 2 not found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
