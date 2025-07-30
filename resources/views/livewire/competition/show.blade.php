<div class="relative">
    <section class="flex py-64 justify-center items-center  relative after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 after:bg-gradient-to-t after:from-brand-sky-level-900 after:via-brand-sky-level-900/90 after:to-transparent after:z-10" style="background: url('/storage/{{ $competition->cover_image }}'); background-size: cover; background-position: center;">
        <div class="text-center text-white max-w-6xl z-20">
            <h3 class="text-lg tracking-wide mb-4">{{ \Carbon\Carbon::make($competition->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::make($competition->end_date)->format('M d, Y') }}</h3>
            <h1 class="font-bold uppercase text-6xl leading-tight tracking-[5px]">{{ $competition->name }}</h1>
        </div>
    </section>
    <section class="container mx-auto mt-20 flex gap-10">
        <div class="w-2/3 prose prose-lg prose-invert">
            {!! $competition->description !!}
        </div>
        <div class="w-1/3 sticky top-0">
            <div class="bg-brand-sky-level-800 p-6 shadow-lg text-white">
                <h2 class="text-3xl font-bold mb-10 uppercase tracking-wider">Competition Details</h2>
                <div class="flex">
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-clock-05', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">Start Date</span>
                        </p>
                        <p class="text-lg">{{ \Carbon\Carbon::make($competition->start_date)->format('M d, Y') }}</p>
                    </div>
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-clock-04', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">End Date</span>
                        </p>
                        <p class="text-lg">{{ \Carbon\Carbon::make($competition->end_date)->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="flex mt-10">
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-money-03', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">Prize</span>
                        </p>
                        <p class="text-lg">{{ $competition->prize }} OMR</p>
                    </div>
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-champion', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">winners</span>
                        </p>
                        <p class="text-lg">{{ $competition->number_of_winners }} Winner</p>
                    </div>
                </div>
                <div class="flex mt-10">
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-game', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">Game</span>
                        </p>
                        <p class="text-lg">{{ $competition->game->name }}</p>
                    </div>
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-user-star-02', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">Players</span>
                        </p>
                        <p class="text-lg">{{ $competition->number_of_players }} Player | {{ $competition->number_of_players - $competition->participants()->count() }} slot remaining</p>
                    </div>
                </div>
                <div class="flex mt-10">
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-type-cursor', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">Type</span>
                        </p>
                        <p class="text-lg">{{ $competition->type == \App\Enums\CompetitionType::Knockout ? 'Knockout' : 'League' }}</p>
                    </div>
                    <div class="flex-1 justify-center items-center">
                        <p class="text-lg font-semibold flex items-center mb-3">
                            @svg('hugeicons-location-01', 'text-brand-sky-level-500 inline-block mr-2')
                            <span class="uppercase">Location</span>
                        </p>
                        <p class="text-lg">{{ $competition->location }}</p>
                    </div>
                </div>
                <div class="justify-center items-center mt-8 grid grid-cols-1 lg:grid-cols-2 gap-3 text-center rtl:space-x-reverse" bis_skin_checked="1">
                    <a href="/gamer/register" class="px-8 py-3 transition-all ease-in-out  bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 lg:text-lg border-2 border-white/10 shadow-inner font-bold hover:-translate-y-1">
                        Join Now
                    </a>
                    <a href="{{ route('competitions.bracket', ['competition' => $competition]) }}" class="px-8 py-3 lg:text-lg transition ease-in-out bg-white/20 border border-white font-bold hover:bg-white hover:text-gray-900">
                        Brackets
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
