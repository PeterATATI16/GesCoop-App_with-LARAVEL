<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <style>
            h1{
                margin:4px 4px;
                padding:4px 4px;
                opacity:.8;
                font: size 20px;
                border-bottom: 4px solid black;
            }
        </style>
           <h1>Réinitialisation de mot de passe</h1>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __("Mot de passe oublié ? Aucun problème. Communiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau. ") }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Obtenir le lien de réinitialisation') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
