<div>
    <div class="pt-56 text-center">
        <h1 class="text-6xl uppercase text-white font-bold">{{ $club->name }}</h1>
    </div>
    <section class="container mx-auto max-w-7xl prose prose-lg prose-invert mt-20">
        <div class="flex gap-10 justify-start items-start">
            <div class="w-2/3">
                {!! $club->description !!}


                <div class="mt-6">
                    <h3>{{ __('general.members') }}</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-3">
                        @foreach($club->members as $member)
                            <div class="flex items-center flex-col">
                                <div class="size-24 rounded-full shadow-md " style="background: url('{{ $member->gamer->picture ? '/storage/' .  $member->gamer->picture : asset('images/unset.jpg') }}'); background-position: center center; background-size: cover;"></div>
                                <h1 class="text-lg mt-2">{{ $member->gamer->name }}</h1>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-brand-sky-level-800 w-1/3 flex-col py-5 px-5 flex border border-brand-sky-level-600 ">
                <div class="size-28 rounded-full shadow-md " style="background: url('/storage/{{ $club->logo }}'); background-position: center center; background-size: cover;"></div>
                <div class="text-lg font-bold mt-6 space-y-5">
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-brand-sky-level-400" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5.8 11.3L2 22l10.7-3.79M4 3h.01M22 8h.01M15 2h.01M22 20h.01M22 2l-2.24.75a2.9 2.9 0 0 0-1.96 3.12v0c.1.86-.57 1.63-1.45 1.63h-.38c-.86 0-1.6.6-1.76 1.44L14 10m8 3l-.82-.33c-.86-.34-1.82.2-1.98 1.11v0c-.11.7-.72 1.22-1.43 1.22H17M11 2l.33.82c.34.86-.2 1.82-1.11 1.98v0C9.52 4.9 9 5.52 9 6.23V7"/><path d="M11 13c1.93 1.93 2.83 4.17 2 5c-.83.83-3.07-.07-5-2c-1.93-1.93-2.83-4.17-2-5c.83-.83 3.07.07 5 2Z"/></g></svg>
                        <span class="font-normal">{{ $club->founded_year }}</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-brand-sky-level-400" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><rect width="18.5" height="17" x="2.682" y="3.5" rx="4"></rect><path stroke-linecap="round" stroke-linejoin="round" d="m2.729 7.59l7.205 4.13a3.956 3.956 0 0 0 3.975 0l7.225-4.13"></path></g></svg>
                        <span class="font-normal">{{ $club->email }}</span>
                    </div>

                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-brand-sky-level-400" viewBox="0 0 1024 1024"><path fill="currentColor" d="M262.2 37c37.4 51.6 82.002 118.197 133.602 199.598c13 22 11 48.4-5.8 79.4c-6.4 13-22.6 42.6-48.4 89.2c28.4 40 71.6 89.2 129.8 147.2s106.602 101.4 145.2 129.8c46.401-27.2 76.201-43.8 89.201-50.399c16.8-9 33-13.6 48.4-13.6c11.6 0 22 2.6 31 7.8c59.4 36.2 126.601 80.8 201.4 133.6c14.2 10.4 22.2 24.601 24.2 42.601c2 18.2-3.599 37.4-16.399 58.2c-6.4 9-16.8 22.2-31 39.8c-14.201 17.4-35.601 39.4-64.002 65.8s-51.6 39.802-69.8 39.802h-2c-136.6-5.4-305-107.801-504.4-307.201c-199.6-199.6-302-367.8-307.2-504.6c0-18 13.2-41.6 39.8-70.8c26.4-29 48.2-50 64.799-63c16.8-12.8 31-23.2 42.6-31c14.2-10.4 30.4-15.4 48.4-15.4c22.2 0 38.8 7.8 50.6 23.2zm-63.998 40.598c-27.2 19.4-52.603 41.198-76.603 64.998c-23.8 24-37.8 41.6-41.6 53.2c5.2 120.2 101 273.2 287.6 459.2c186.6 186 340 282.2 460 288.6c10.4-3.8 27.4-18 51.4-42.6s45.6-50.399 64.8-77.399c3.8-5.2 5.2-9.6 3.8-13.6c-77.4-54.2-142-97.4-193.8-129.801c-5.2 0-11.6 2-19.4 5.8c-11.6 6.4-40.6 22.6-87.2 48.4l-33 19.4l-33-21.4c-42.6-29.6-94.199-75.6-154.999-137.6c-60.6-60.6-105.8-112.4-135.6-155l-23.2-31l19.4-34.799c25.8-46.4 42-75.6 48.4-87.2c3.8-7.8 5.8-14.2 5.8-19.4c-46-73.401-88.599-138-127.398-193.6h-2c-5 0-9.6 1.4-13.4 3.8z"></path></svg>
                        <span class="font-normal">{{ $club->phone }}</span>
                    </div>
                </div>
                <div class="flex space-x-3 mt-6" bis_skin_checked="1">
                    @if($club->twitch)
                        <a href="{{ $club->twitch }}" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 408 432"><path fill="currentColor" d="M296 374h-83l-56 55h-55v-55H0V77L28 3h379v259zm74-130V40H65v269h83v55l56-55h102zM269 114h37v111h-37V114zM167 225V114h37v111h-37z"/></svg>
                        </a>
                    @endif
                    @if($club->youtube)
                            <a href="{{ $club->youtube }}" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M23 9.71a8.5 8.5 0 0 0-.91-4.13a2.92 2.92 0 0 0-1.72-1A78.36 78.36 0 0 0 12 4.27a78.45 78.45 0 0 0-8.34.3a2.87 2.87 0 0 0-1.46.74c-.9.83-1 2.25-1.1 3.45a48.29 48.29 0 0 0 0 6.48a9.55 9.55 0 0 0 .3 2a3.14 3.14 0 0 0 .71 1.36a2.86 2.86 0 0 0 1.49.78a45.18 45.18 0 0 0 6.5.33c3.5.05 6.57 0 10.2-.28a2.88 2.88 0 0 0 1.53-.78a2.49 2.49 0 0 0 .61-1a10.58 10.58 0 0 0 .52-3.4c.04-.56.04-3.94.04-4.54ZM9.74 14.85V8.66l5.92 3.11c-1.66.92-3.85 1.96-5.92 3.08Z"></path></svg>
                            </a>
                    @endif
                    @if($club->instagram)
                            <a href="{{ $club->instagram }}" class="w-10 h-10 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 1536 1536"><path fill="currentColor" d="M1024 768q0-106-75-181t-181-75t-181 75t-75 181t75 181t181 75t181-75t75-181zm138 0q0 164-115 279t-279 115t-279-115t-115-279t115-279t279-115t279 115t115 279zm108-410q0 38-27 65t-65 27t-65-27t-27-65t27-65t65-27t65 27t27 65zM768 138q-7 0-76.5-.5t-105.5 0t-96.5 3t-103 10T315 169q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103t-3 96.5t0 105.5t.5 76.5t-.5 76.5t0 105.5t3 96.5t10 103T169 1221q20 50 58 88t88 58q29 11 71.5 18.5t103 10t96.5 3t105.5 0t76.5-.5t76.5.5t105.5 0t96.5-3t103-10t71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103t3-96.5t0-105.5t-.5-76.5t.5-76.5t0-105.5t-3-96.5t-10-103T1367 315q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10t-96.5-3t-105.5 0t-76.5.5zm768 630q0 229-5 317q-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124T5 1085q-5-88-5-317t5-317q10-208 124-322T451 5q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"></path></svg>
                            </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
