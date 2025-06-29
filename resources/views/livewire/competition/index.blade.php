<div>
    <div class="pt-56 text-center">
        <h1 class="text-6xl uppercase text-white font-bold">{{ __('general.competition_page_heading') }}</h1>
    </div>

    <div class="container mx-auto mt-32 lg:mt-56">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            @foreach($competitions as $competition)
                <a href="{{ route('competitions.show', ['competition' => $competition]) }}" class="bg-brand-sky-level-800 group flex justify-center items-start flex-col border border-brand-sky-level-600 hover:scale-95 transition-all ease-in-out group">
                    <div class="w-full" style="height: 300px; background: url('/storage/{{ $competition->cover_image }}'); background-size: cover; background-position: center center;"></div>
                    <div class="p-5">
                        <h3 class="text-white text-md tracking-wider">{{ \Carbon\Carbon::make($competition->start_date)->format('M d, y') }}</h3>
                        <h2 class="text-2xl tracking-wider uppercase text-white font-semibold mt-1 transition-all group-hover:text-brand-sky-level-500">{{ $competition->name }}</h2>
                        <p class="text-white/50 pb-5">{{ strip_tags(substr($competition->description, 0, 200)) }}...</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="flex justify-center items-center mt-20">
            <a wire:click="loadMore" class="text-white group px-12 py-5 text-lg transition ease-in-out bg-white/20 border border-white font-bold hover:bg-white hover:text-gray-900">
                <span wire:loading.class="hidden">{{ __('general.load_more') }}</span>
                <svg wire:loading xmlns="http://www.w3.org/2000/svg" class="text-white size-8 group-hover:text-gray-900" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5"/><path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z"><animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate"/></path></svg>
            </a>
        </div>
    </div>
</div>
