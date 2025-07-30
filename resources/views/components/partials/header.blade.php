<header class="container max-w-7xl mx-auto relative" x-data="{menuOpen: false}">
    <div class="flex justify-between items-center absolute w-full top-0 left-0 z-30 bg-black/30 border border-white/30 px-5 mt-6">
        <div class="py-5 lg:py-0">
            <a href="{{ route('home.index') }}" class="text-2xl font-bold text-gray-800 dark:text-white">
                <img src="{{ asset('images/logo-white.png') }}" class="h-12" alt="">
            </a>
        </div>
        <div class="flex items-center">
            <nav class="hidden lg:block">
                <a href="{{ route('home.index') }}"
                   class="inline-block uppercase text-gray-200 hover:text-white py-7 border-b-2 {{ Route::is('home.index') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                    {{ __('general.nav_home') }}
                </a>
                <a href="{{ route('news.index') }}"
                   class="inline-block uppercase text-gray-200 hover:text-white py-7 border-b-2 {{ Route::is('news.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                    {{ __('general.nav_news') }}
                </a>
                <a href="{{ route('competitions.index') }}"
                   class="inline-block uppercase text-gray-200 hover:text-white py-7 border-b-2 {{ Route::is('competitions.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                    {{ __('general.nav_competitions') }}
                </a>
                <a href="{{ route('clubs.index') }}"
                   class="inline-block uppercase text-gray-200 hover:text-white py-7 border-b-2 {{ Route::is('clubs.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                    {{ __('general.nav_clubs') }}
                </a>
                <a href="{{ route('contact.index') }}"
                   class="inline-block uppercase text-gray-200 hover:text-white py-7 border-b-2 {{ Route::is('contact.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                    {{ __('general.nav_contact') }}
                </a>
                @if(session()->get('lang') == 'ar')
                    <a href="{{ route('locale', 'en') }}"
                       class="inline-block uppercase text-gray-200 hover:text-white py-7 px-5 tracking-wider mr-7 rtl:ml-7 rtl:mr-0">EN</a>
                @else
                    <a href="{{ route('locale', 'ar') }}"
                       class="inline-block uppercase text-gray-200 hover:text-white py-7 px-5 tracking-wider mr-7 rtl:ml-7 rtl:mr-0">AR</a>
                @endif
            </nav>
            @auth
                <a href="{{ route('filament.gamer.pages.dashboard') }}" class="hidden lg:block px-6 py-3 bg-gradient-to-t text-white from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner font-bold transition-all hover:-translate-y-1">
                    {{ __('general.dashboard') }}
                </a>
            @endauth
            @guest
                <a id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="hidden lg:flex items-center space-x-2 rtl:space-x-reverse px-6 py-3 bg-gradient-to-t text-white from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner font-bold transition-all hover:-translate-y-1 cursor-pointer">
                    <div class="lg:text-lg">{{ __('general.login_now') }}</div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </a>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-brand-sky-level-800 divide-y divide-red-500 shadow-sm w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('filament.club.auth.login') }}" class="block px-4 py-2 text-brand-sky-level-400 hover:bg-brand-sky-level-700 hover:text-white">{{ __('footer.links.club_login') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('filament.gamer.auth.login') }}" class="block px-4 py-2 text-brand-sky-level-400 hover:bg-brand-sky-level-700 hover:text-white">{{ __('footer.links.gamer_login') }}</a>
                        </li>
                    </ul>
                </div>
            @endguest
            <div class="lg:hidden">
                @if(session()->get('lang') == 'ar')
                    <a href="{{ route('locale', 'en') }}"
                       class="inline-block uppercase text-gray-200 hover:text-white py-5 px-5 tracking-wider mr-1 rtl:ml-1 rtl:mr-0">EN</a>
                @else
                    <a href="{{ route('locale', 'ar') }}"
                       class="inline-block uppercase text-gray-200 hover:text-white py-5 px-5 tracking-wider mr-1 rtl:ml-1 rtl:mr-0">AR</a>
                @endif
            </div>
            <div>
                <button @click="menuOpen = !menuOpen" class="lg:hidden text-gray-200 hover:text-white focus:outline-none   p-2 bg-gradient-to-t text-white from-brand-sky-level-400 to-brand-sky-level-200" id="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
    <div class="lg:hidden flex justify-between items-center z-30 bg-brand-sky-level-900 border border-white/30 px-5 absolute top-32 left-0 w-full" x-show="menuOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4">
        <nav class="lg:hidden flex flex-col w-full pb-5">
            <a href="{{ route('home.index') }}"
               class="inline-block w-full uppercase text-gray-200 hover:text-white py-5 border-b-2 {{ Route::is('home.index') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                {{ __('general.nav_home') }}
            </a>
            <a href="{{ route('news.index') }}"
               class="inline-block uppercase text-gray-200 hover:text-white py-5 border-b-2 {{ Route::is('news.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                {{ __('general.nav_news') }}
            </a>
            <a href="{{ route('competitions.index') }}"
               class="inline-block uppercase text-gray-200 hover:text-white py-5 border-b-2 {{ Route::is('competitions.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                {{ __('general.nav_competitions') }}
            </a>
            <a href="{{ route('clubs.index') }}"
               class="inline-block uppercase text-gray-200 hover:text-white py-5 border-b-2 {{ Route::is('clubs.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                {{ __('general.nav_clubs') }}
            </a>
            <a href="{{ route('contact.index') }}"
               class="inline-block uppercase text-gray-200 hover:text-white py-5 border-b-2 {{ Route::is('contact.*') ? 'border-white' : 'border-transparent' }} px-5 tracking-wider rtl:tracking-normal">
                {{ __('general.nav_contact') }}
            </a>
            <a href="/club/login" class=" text-center px-6 py-3 mt-3 bg-gradient-to-t text-white from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner font-bold transition-all hover:-translate-y-1">
                {{ __('general.login_now') }}
            </a>
        </nav>
    </div>
</header>
