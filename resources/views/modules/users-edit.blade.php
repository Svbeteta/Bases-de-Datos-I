<!-- resources/views/modules/users-edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Nombre') }}
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                   required autofocus>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Email') }}
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                   required>
                        </div>

                        <!-- Rol -->
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Rol') }}
                            </label>
                            <select id="role" name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="Administrador" {{ $user->role == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="Contable" {{ $user->role == 'Contable' ? 'selected' : '' }}>Contable</option>
                                <option value="Técnico" {{ $user->role == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                            </select>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Nueva Contraseña (opcional)') }}
                            </label>
                            <input type="password" id="password" name="password"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Confirmar Contraseña') }}
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Botón de envío -->
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                                {{ __('Actualizar Usuario') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>