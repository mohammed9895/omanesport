<section class="flex mt-64 py-64 justify-center items-center  relative after:content[''] after:w-full after:h-1/2 after:absolute after:bottom-0 after:left-0 after:bg-gradient-to-t after:from-brand-sky-level-900 after:via-brand-sky-level-900/90 after:to-transparent after:z-10 after:content[''] before:w-full before:h-1/2 before:absolute before:top-0 before:left-0 before:bg-gradient-to-b before:from-brand-sky-level-900 before:via-brand-sky-level-900/90 before:to-transparent before:z-10" style="background: url('{{ asset('images/hero2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="text-center text-white max-w-6xl z-20">
        <h1 class="font-bold uppercase text-6xl leading-tight tracking-[5px] rtl:tracking-normal">
            {{ __('general.join_heading') }}
        </h1>
        <p class="mt-4 text-lg max-w-2xl mx-auto text-gray-300">
            {{ __('general.join_description') }}
        </p>
        <div class="flex justify-center items-center mt-8 space-x-5 rtl:space-x-reverse">
            <a href="{{ route('filament.gamer.auth.register') }}" class="px-12 py-5 bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner font-bold transition-all hover:-translate-y-1">
                {{ __('general.register_now') }}
            </a>
            <a href="{{ route('filament.gamer.auth.login') }}" class="px-12 py-5 text-lg transition ease-in-out bg-white/20 border border-white font-bold hover:bg-white hover:text-gray-900">
                {{ __('general.or_login') }}
            </a>
        </div>
    </div>
</section>

<footer class="mt-20">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row lg:justify-start gap-14">
            <div class="w-full lg:w-1/3">
                <a href="/">
                    <img src="{{ asset('images/logo-white.png') }}" width="200" alt="">
                </a>
                <p class="text-lg text-gray-200 mt-6">
                    {{--                        A committee was announced by the Ministry of Culture, Sports and Youth on May 17, 2021, by a ministerial decision from His Highness Sayyid Theyazin bin Haitham. ,It includes people with knowledge and experience in managing and organizing games and e-sports. ,It is concerned with activating various electronic sports and spreading them in society.--}}
                </p>
                <div class="flex space-x-3 mt-6 rtl:space-x-reverse">
                    <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 224 488"><path fill="currentColor" d="M51 91v63H4v78h47v230h95V232h65q6-37 8-78h-72v-53q0-6 6.5-12.5T168 82h52V2h-71q-28 0-48.5 8.5T71 29.5T57 55t-5.5 21.5T51 91z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584l-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M23 9.71a8.5 8.5 0 0 0-.91-4.13a2.92 2.92 0 0 0-1.72-1A78.36 78.36 0 0 0 12 4.27a78.45 78.45 0 0 0-8.34.3a2.87 2.87 0 0 0-1.46.74c-.9.83-1 2.25-1.1 3.45a48.29 48.29 0 0 0 0 6.48a9.55 9.55 0 0 0 .3 2a3.14 3.14 0 0 0 .71 1.36a2.86 2.86 0 0 0 1.49.78a45.18 45.18 0 0 0 6.5.33c3.5.05 6.57 0 10.2-.28a2.88 2.88 0 0 0 1.53-.78a2.49 2.49 0 0 0 .61-1a10.58 10.58 0 0 0 .52-3.4c.04-.56.04-3.94.04-4.54ZM9.74 14.85V8.66l5.92 3.11c-1.66.92-3.85 1.96-5.92 3.08Z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 1536 1536"><path fill="currentColor" d="M1024 768q0-106-75-181t-181-75t-181 75t-75 181t75 181t181 75t181-75t75-181zm138 0q0 164-115 279t-279 115t-279-115t-115-279t115-279t279-115t279 115t115 279zm108-410q0 38-27 65t-65 27t-65-27t-27-65t27-65t65-27t65 27t27 65zM768 138q-7 0-76.5-.5t-105.5 0t-96.5 3t-103 10T315 169q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103t-3 96.5t0 105.5t.5 76.5t-.5 76.5t0 105.5t3 96.5t10 103T169 1221q20 50 58 88t88 58q29 11 71.5 18.5t103 10t96.5 3t105.5 0t76.5-.5t76.5.5t105.5 0t96.5-3t103-10t71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103t3-96.5t0-105.5t-.5-76.5t.5-76.5t0-105.5t-3-96.5t-10-103T1367 315q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10t-96.5-3t-105.5 0t-76.5.5zm768 630q0 229-5 317q-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124T5 1085q-5-88-5-317t5-317q10-208 124-322T451 5q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418Z"/></svg>
                    </a>
                </div>
            </div>
            <div class="w-1/2 lg:w-1/3">
                <h1 class="text-xl uppercase tracking-wider rtl:tracking-normal font-semibold text-white mb-5">{{ __('footer.pages') }}</h1>
                <div class="flex  gap-14">
                    <ul class="space-y-4">
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.home') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.about') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.competitions') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.clubs') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.contact') }}</a></li>
                    </ul>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.terms') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.privacy') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.support') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.faq') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-1/2 lg:w-1/3">
                <h1 class="text-xl uppercase tracking-wider rtl:tracking-normal font-semibold text-white mb-5"> {{ __('footer.utility_pages') }}</h1>
                <div class="flex justify-between gap-4">
                    <ul class="space-y-4">
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.gamer_login') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.club_login') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.gamer_register') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.club_register') }}</a></li>
                        <li><a href="#" class="text-md text-white tracking-wider rtl:tracking-normal">{{ __('footer.links.invitations') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="text-lg text-white text-center py-10 mt-10 border-t border-white/10">
            {{ __('footer.copyright', ['year' => date('Y')]) }}
        </p>
    </div>
</footer>
