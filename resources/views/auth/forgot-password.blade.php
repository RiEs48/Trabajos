<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Olvidaste tu Password/Contraseña? escribe tu Correo/Email que registraste y enviaremos  un enlace para que puedas crear una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email/Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
            <x-link
            :href="route('login')"
            >

               Iniciar Sesion
            </x-link>
            <x-link 
            :href="route('register')"
            >
               Crear Cuenta
            </x-link>   

     
        </div>
        <x-primary-button class="w-full bg-lime-500 justify-center">
            {{ __('Enviar Instruccione a tu Correo') }}
        </x-primary-button>
    </form>
</x-guest-layout>
