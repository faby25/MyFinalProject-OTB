<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-auto h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- UserName -->
            <div>
                <x-form.label for="username" :value="__('User Name')" />
                <x-form.input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            </div>
            <!-- CI -->
            <div class="mt-4">
                <x-form.label for="ci" :value="__('Carnet de Identidad')" />
                <x-form.input id="ci" class="block mt-1 w-full" type="text" name="ci" :value="old('ci')" required autofocus />
            </div>
            <!-- Name -->
            <div class="mt-4">
                <x-form.label for="name" :value="__('Nombre')" />

                <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- lastName Paterno-->
            <div class="mt-4">
                <x-form.label for="lastnameF" :value="__('Apellido Paterno')" />
                <x-form.input id="lastnameF" class="block mt-1 w-full" type="text" name="lastnameF" :value="old('lastnameF')" />
            </div>
            <!-- lastName Materno-->
            <div class="mt-4">
                <x-form.label for="lastnameM" :value="__('Apellido Materno')" />
                <x-form.input id="lastnameM" class="block mt-1 w-full" type="text" name="lastnameM" :value="old('lastnameM')"/>
            </div>
            <!-- Telf -->
            <div class="mt-4">
                <x-form.label for="telf" :value="__('Telefono')" />
                <x-form.input id="telf" class="block mt-1 w-full" type="text" name="telf" :value="old('telf')"/>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-form.label for="email" :value="__('Email')" />
                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.label for="password" :value="__('Contraseña')" />
                <x-form.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form.label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-form.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-form.button class="ml-4">
                    {{ __('Registrar') }}
                </x-form.button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
