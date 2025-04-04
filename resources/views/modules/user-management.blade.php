<x-app-layout>
<x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('Gestión de Usuarios') }}
            </h2>

            <a href="{{ route('register') }}" 
            class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-700 transition duration-300">
                {{ __('+ Nuevo Usuario') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">

                <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 mt-4">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Rol</th>
            <th class="py-2 px-4 border-b">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="text-center">
                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                <td class="py-2 px-4 border-b flex justify-center space-x-2">
                    <!-- Botón Editar -->
                    <a href="{{ route('users.edit', $user) }}" 
                       class="p-2 bg-black text-white rounded hover:bg-gray-700 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                        </svg>
                    </a>
                    
                    <!-- Botón Eliminar -->
                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="p-2 bg-black text-white rounded hover:bg-gray-700 transition duration-300"
                                onclick="return confirm('¿Estás seguro de eliminar a {{ $user->name }}?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

                    @if($users->isEmpty())
                        <p class="mt-4 text-red-500">No hay usuarios registrados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>