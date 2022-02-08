<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-auto h-20 fill-current " id="2"/>
            </a>
        </x-slot>
        <h1 class="max-w-xl mx-auto mt-20 text-center text-blue-500 ">INICIAR SESIÓN</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-form.label for="login" :value="__('Nombre de Usuario o E-mail')" />
                <x-form.input id="login" class="block mt-1 w-full" type="login" name="login" :value="old('login')" required autofocus />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-form.label for="password" :value="__('Contraseña')" />
                <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>
            <!-- I forgot my password -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu Contraseña?') }}
                    </a>
                @endif
                <x-form.button class="ml-3">
                    {{ __('Ingresar') }}
                </x-form.button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
