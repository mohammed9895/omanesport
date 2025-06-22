<div class="bg-slate-200">
    <!-- Hero -->
    <div class="bg-slate-200">
        <div class="max-w-5xl mx-auto px-4 xl:px-0 pt-24 lg:pt-32 ">
            <h1 class="font-semibold text-slate-800 text-5xl md:text-6xl" style="line-height: 90px;">
                News
            </h1>
            <div class="mt-5 max-w-4xl">
                <p class="text-slate-600 text-lg">
                    Stay informed with the latest updates from Oman’s gaming and esports world — including tournament highlights, player stories, new partnerships, and community announcements.
                </p>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <div class="bg-slate-200 container mx-auto mt-24">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($news as $post)
                <!-- Card -->
                <div class="group flex flex-col h-full bg-slate-300 border border-gray-200 shadow-2xs rounded-xl dark:bg-slate-900 dark:border-slate-700 dark:shadow-slate-700/70">
                    <div class="flex flex-col justify-center items-center bg-blue-600 rounded-t-xl w-full" style='height:300px;background: url("/storage/{{ $post->image }}"); background-size: cover; background-position: center;'>
                    </div>
                    <div class="p-4 md:p-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-slate-300 dark:hover:text-white">
                            {{ $post->title }}
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-slate-500">
                            {{ strip_tags(substr($post->content, 0, 200)) }}...
                        </p>
                    </div>
                    <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-slate-700 dark:divide-slate-700">
                        <a href="{{ route('news.show', ['news' => $post]) }}" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-bl-xl bg-slate-300 text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-white dark:hover:bg-slate-800 dark:focus:bg-slate-800" >
                            Read More
                        </a>
                    </div>
                </div>
                <!-- End Card -->
            @endforeach
        </div>
        <!-- End Grid -->
    </div>
</div>
