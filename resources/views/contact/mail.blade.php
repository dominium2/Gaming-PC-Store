<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Mail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="mt-4 max-h-64 overflow-y-auto border border-gray-300 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($messages as $message)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $message->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $message->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $message->email }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $message->message }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $message->created_at->format('F j, Y, g:i a') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        <form method="POST" action="{{ route('admin.mail.delete', $message->id) }}" class="inline">
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
