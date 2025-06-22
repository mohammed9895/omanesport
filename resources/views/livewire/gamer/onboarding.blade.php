<div>
    <div class="container lg:w-1/2 mx-auto my-10">
        <div class="flex flex-col items-center mb-5">
            <a href="/" class="mb-6">
                <img src="{{ asset('images/logo.svg') }}" class="w-40" alt="">
            </a>
            <h1 class="text-3xl font-bold text-slate-800 mb-3">Welcome to Oman eSports Gamer Registration</h1>
            <p class="text-md font-normal text-slate-500">We’re excited to have you on board! Let’s get your gamer profile set up and ready to join the competition.</p>
        </div>
        <form wire:submit="create">
            {{ $this->form }}
        </form>
    </div>

    <x-filament-actions::modals />
</div>
