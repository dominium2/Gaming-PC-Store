<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($orders as $order)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900">{{ $order->product->name }}</h3>
                    <p class="text-sm text-gray-500">Price: ${{ $order->product->price }}</p>
                    <p class="text-sm text-gray-500">Quantity: {{ $order->quantity }}</p>
                    <p class="text-sm text-gray-500">Ordered on: {{ $order->created_at->format('F j, Y, g:i a') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
