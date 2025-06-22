<div class="bg-slate-200">
    <!-- Hero -->

    <div class="bg-slate-200">
        <div class="max-w-5xl mx-auto px-4 xl:px-0 pt-24 lg:pt-32 pb-10">
            <h1 class="font-semibold text-slate-800 text-5xl md:text-6xl" style="line-height: 90px;">
                {{ $post->title }}
            </h1>
        </div>
    </div>
    <!-- End Hero -->


    <div class="max-w-5xl mx-auto">
        <div style="background: url('/storage/{{ $post->image }}'); background-size: cover;" class="w-full h-[500px] rounded-xl"></div>
        <h1 class="text-2xl mt-6">{{ $post->name }}</h1>
        <div class="flex gap-4 mt-4">
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-brand-sky">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                <div>{{ \Carbon\Carbon::make($post->created_at)->format('Y-m-d') }}</div>
            </div>

        </div>
        <p class="mt-3 text-gray-500 dark:text-slate-500">
            {!! $post->content !!}
        </p>



    </div>
</div>
