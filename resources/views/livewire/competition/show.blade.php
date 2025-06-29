<div>
    <section class="flex py-64 justify-center items-center  relative after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 after:bg-gradient-to-t after:from-brand-sky-level-900 after:via-brand-sky-level-900/90 after:to-transparent after:z-10" style="background: url('/storage/{{ $competition->cover_image }}'); background-size: cover; background-position: center;">
        <div class="text-center text-white max-w-6xl z-20">
            <h3 class="text-lg tracking-wide mb-4">{{ \Carbon\Carbon::make($competition->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::make($competition->end_date)->format('M d, Y') }}</h3>
            <h1 class="font-bold uppercase text-6xl leading-tight tracking-[5px]">{{ $competition->name }}</h1>
        </div>
    </section>
    <section class="container mx-auto max-w-7xl prose prose-lg prose-invert mt-20">
        {!! $competition->description !!}
    </section>
</div>
