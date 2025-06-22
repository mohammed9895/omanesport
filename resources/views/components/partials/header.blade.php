<!-- ========== HEADER ========== -->
<header class="absolute top-4 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full before:absolute before:inset-0 before:max-w-5xl before:mx-2 lg:before:mx-auto before:rounded-[26px] before:bg-slate-400/20 before:backdrop-blur-md">
    <nav class="relative max-w-5xl w-full flex flex-wrap md:flex-nowrap basis-full items-center justify-between py-2 ps-5 pe-2 md:py-0 mx-2 lg:mx-auto">
        <div class="flex items-center">
            <!-- Logo -->
            <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80" href="/" aria-label="Preline">
               <img src="{{ asset('images/logo.svg') }}" class="w-16">
            </a>
            <!-- End Logo -->
        </div>

        <!-- Button Group -->
        <div class="md:order-3 flex items-center gap-x-3">
            <div class="md:ps-3">
               @guest
                    <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-brand-pink font-medium text-sm text-nowrap text-white rounded-full focus:outline-hidden" href="{{ route('filament.gamer.auth.login') }}">
                        Login Now
                    </a>
                @endguest
                @auth
                    <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-brand-pink font-medium text-sm text-nowrap text-white rounded-full focus:outline-hidden" href="{{ route('filament.gamer.auth.login') }}">
                        Dashboard
                    </a>
                   @endauth
            </div>

            <div class="md:hidden">
                <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-full bg-slate-800 text-white disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-floating-dark-collapse" aria-expanded="false" aria-controls="hs-navbar-floating-dark" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-floating-dark">
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- End Button Group -->

        <!-- Collapse -->
        <div id="hs-navbar-floating-dark" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-navbar-floating-dark-collapse">
            <div class="flex flex-col md:flex-row md:items-center md:justify-end gap-y-3 py-2 md:py-0 md:ps-7">
                <a class="pe-3 ps-px sm:px-3 md:py-4 text-sm text-slate-600 hover:text-800 focus:outline-hidden focus:text-slate-300" href="/" aria-current="page">Home</a>
                <a class="pe-3 ps-px sm:px-3 md:py-4 text-sm text-slate-600 hover:text-slate-800 focus:outline-hidden focus:text-slate-300" href="{{ route('competitions.index') }}">Competitions</a>
                <a class="pe-3 ps-px sm:px-3 md:py-4 text-sm text-slate-600 hover:text-slate-800 focus:outline-hidden focus:text-slate-300" href="{{ route('news.index') }}">News</a>
                <a class="pe-3 ps-px sm:px-3 md:py-4 text-sm text-slate-600 hover:text-slate-800 focus:outline-hidden focus:text-slate-300" href="#contact">Contact us</a>
            </div>
        </div>
        <!-- End Collapse -->
    </nav>
</header>
<!-- ========== END HEADER ========== -->
