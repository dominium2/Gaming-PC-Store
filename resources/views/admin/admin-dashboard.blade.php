<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Manage Users -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Manage Users</h3>
                <div class="mt-4 max-h-64 overflow-y-auto border border-gray-300 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Is Admin</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->email }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        @if ($user->is_admin)
                                            <form method="POST" action="{{ route('admin.demote') }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <x-primary-button class="bg-yellow-600 hover:bg-yellow-700">{{ __('Demote') }}</x-primary-button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.promote') }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <x-primary-button class="bg-green-600 hover:bg-green-700">{{ __('Promote') }}</x-primary-button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Create User</h3>
                <form method="POST" action="{{ route('admin.create') }}" class="mt-4">
                    @csrf

                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                    </div>

                    <div>
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div>
                        <x-input-label for="is_admin" :value="__('Is Admin')" />
                        <div class="flex items-center mt-1">
                            <!-- Hidden input to send false when checkbox is unchecked -->
                            <input type="hidden" name="is_admin" value="0">
                            <input id="is_admin" name="is_admin" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="is_admin" class="ml-2 text-sm text-gray-600">{{ __('Check if the user is an admin') }}</label>
                        </div>
                    </div>

                    <x-primary-button class="mt-4">{{ __('Create User') }}</x-primary-button>
                </form>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Delete User</h3>
                <div class="mt-4 max-h-64 overflow-y-auto border border-gray-300 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $user->email }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        <form method="POST" action="{{ route('admin.delete') }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <x-primary-button class="bg-red-600 hover:bg-red-700">{{ __('Delete') }}</x-primary-button>
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
