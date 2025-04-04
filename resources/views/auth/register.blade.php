<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-4 relative space-y-1 mb-4">
    <x-input-label for="role" :value="__('Rol del Usuario')" />
    <div x-data="{ open: false, selectedRole: '' }" @click.outside="open = false">
        <!-- Select visible pero con estilos -->
        <select name="role" id="role" x-model="selectedRole" required
            class="appearance-none inline-flex items-center justify-between px-4 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition ease-in-out duration-150 w-full cursor-pointer">
            <option value="" x-show="selectedRole === ''">Seleccionar Rol</option>
            <option value="Administrador">Administrador</option>
            <option value="Contable">Contable</option>
            <option value="Técnico">Técnico</option>
        </select>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-2 w-full rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5"
        >
            <div class="py-1">
                <a href="#" @click.prevent="selectedRole = 'Administrador'; open = false; document.getElementById('role').value = 'Administrador'" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Administrador</a>
                <a href="#" @click.prevent="selectedRole = 'Contable'; open = false; document.getElementById('role').value = 'Contable'" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Contable</a>
                <a href="#" @click.prevent="selectedRole = 'Técnico'; open = false; document.getElementById('role').value = 'Técnico'" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Técnico</a>
            </div>
        </div>
    </div>
    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div>


        
        <!-- Nombre -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botones de acción -->
        <a href="{{ route('user-management') }}" 
       class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ __('Regresar') }}
    </a>

            <x-primary-button class="ms-4">
                {{ __('Crear Usuario') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>