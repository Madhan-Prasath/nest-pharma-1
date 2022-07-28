<form wire:submit.prevent="authenticate" class="space-y-8">
    {{-- <img src="{{ URL::to('assets/images/logo/logo.png') }}" alt="Logo"> --}}

    {{ $this->form }}

    <x-filament::button type="submit" form="authenticate" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>



    <x-filament::button class="w-full">
        <a href="{{ url('auth/google') }}" class="w-full">
            <strong><i style="margin-right: 5px;" class="bi bi-google"></i>Google Login</strong>
         </a>
    </x-filament::button>

</form>
