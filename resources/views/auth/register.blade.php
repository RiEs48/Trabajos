<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email/Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
            <!-- Rol -->
        <div class="mt-4">
           <x-input-label for="rol" :value="__('Que Tipo de cuenta quieres Crear en la Plataforma')" />
           <select name="rol" id="rol"
           class="block font-bold text-sm text-gray-700 uppercase mb-2 w-full">
           <option value="">--Selecciona el Rol--</option>
           <option value="1">Desarrollador - Obtener Empleo</option>
           <option value="2">Reclutador - Publicar Empleos</option>


           </select>
            
        </div>
        

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password/Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir Password/Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex justify-between my-5">
            <x-link
            :href="route('login')"
            >

               Iniciar Sesion
            </x-link>
            <x-link 
            :href="route('password.request')"
            >
               Olvidaste tu Contraseña
            </x-link>   

     
        </div>
        <x-primary-button class="w-full bg-lime-500 justify-center">
            {{ __('Crear Cuenta') }}
        </x-primary-button>
    </form>
</x-guest-layout>
