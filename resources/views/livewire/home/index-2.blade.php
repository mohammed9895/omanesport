<div>
    <section class="flex justify-center items-center h-[1000px] relative after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 after:bg-gradient-to-t after:from-brand-sky-level-900 after:via-brand-sky-level-900/90 after:to-transparent after:z-10" style="background: url('{{ asset('images/hero2.jpg') }}'); background-size: cover; background-position: center;">
        <div class="text-center text-white container z-20">
            <h1 class="font-bold uppercase text-5xl lg:text-6xl leading-tight lg:tracking-[5px] rtl:tracking-normal">
                {{ __('general.hero_heading') }}
            </h1>
            <p class="mt-4 text-lg max-w-4xl mx-auto text-gray-300">
                {{ __('general.hero_description') }}
            </p>
            <div class="flex justify-center items-center mt-8 space-x-5 rtl:space-x-reverse">
                <a href="/gamer/register" class="px-12 transition-all ease-in-out py-5 bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 lg:text-lg border-2 border-white/10 shadow-inner font-bold hover:-translate-y-1">
                    {{ __('general.register_now') }}
                </a>
                <a href="#about" class="px-12 py-5 lg:text-lg transition ease-in-out bg-white/20 border border-white font-bold hover:bg-white hover:text-gray-900">
                    {{ __('general.more_information') }}
                </a>
            </div>
        </div>
    </section>
    <section class="container mx-auto py-16">
        <div class="flex justify-center items-center space-x-16 rtl:space-x-reverse">
            <a href="#" class="inline-block">
                <img src="{{ asset('images/youth-min.png') }}" class="h-16" alt="">
            </a>
            <a href="#" class="inline-block">
                <img src="{{ asset('images/yc-logo-colored.svg') }}" class="h-14" alt="">
            </a>
            <a href="#" class="inline-block">
                <img src="{{ asset('images/pdo.svg') }}" class="h-14" alt="">
            </a>
        </div>
    </section>

    <section class="py-52">
        <div class="container mx-auto lg:max-w-7xl">
            <div class="text-white text-center max-w-4xl mx-auto space-y-4">
                <h1 class="text-4xl uppercase font-bold tracking-wider rtl:tracking-normal">
                    {{ __('general.section_esports_heading') }}
                </h1>
                <p class="text-lg text-brand-sky-level-600">
                    {{ __('general.section_esports_description') }}
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-16">
                <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 ">
                    <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-14" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2"><path d="M36 15a5 5 0 1 0 0-10a5 5 0 0 0 0 10Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m12 16.77l8.003-2.772L31 19.247l-10.997 8.197L31 34.684l-6.992 9.314M35.32 21.643l2.682 1.459L44 17.466M16.849 31.545l-2.97 3.912l-9.875 5.54"/></g></svg>
                    </div>
                    <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6">
                        {{ __('general.personality_youthful') }}
                    </h2>
                    <p class="text-center mt-3 text-white text-lg">
                        {{ __('general.personality_youthful_desc') }}
                    </p>
                </div>
                <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 ">
                    <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-14" viewBox="0 0 20 20"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M13.09 14.024a4.611 4.611 0 0 0-2.377-4.279a.6.6 0 0 0-.809.201l-.964 1.543l-.802-.97a.5.5 0 0 0-.734-.039a4.59 4.59 0 0 0-1.395 3.544a3.54 3.54 0 0 0 7.08 0Zm-5.353-2.42a3.537 3.537 0 0 0-.062.082a3.599 3.599 0 0 0-.669 2.26a.612.612 0 0 1 .003.059a2.54 2.54 0 0 0 5.08 0l.003-.058c.007-.065.163-1.853-1.473-3.069a4.857 4.857 0 0 0-.081-.059l-1.044 1.67a.6.6 0 0 1-.971.064l-.786-.95Z"/><path d="M8.974 2.09a.599.599 0 0 1 1.017-.304c.194.198.567.59.946 1.042c.372.443.778.976 1.012 1.451c.228.464.47 1.064.661 1.565l.889-1.48a.6.6 0 0 1 .98-.07c1.263 1.56 1.892 3.231 2.205 4.507c.157.639.236 1.182.276 1.568a8.29 8.29 0 0 1 .04.58V11c0 3.897-3.091 7.07-7.002 7.07C6.088 18.07 3 14.898 3 11c0-1.073.507-3.6 2.007-5.672a.599.599 0 0 1 .998.043L7.02 7.06c.308-.482.72-1.159 1.033-1.784c.45-.9.807-2.597.921-3.185Zm.823.95c-.181.8-.48 1.942-.85 2.684c-.492.983-1.201 2.063-1.445 2.426a.599.599 0 0 1-1.01-.026l-1.02-1.697C4.376 8.2 4 10.193 4 11c0 3.358 2.654 6.068 5.998 6.068C13.343 17.068 16 14.358 16 11v-.028a7.493 7.493 0 0 0-.034-.501a10.583 10.583 0 0 0-.253-1.431a10.66 10.66 0 0 0-1.66-3.655l-1.014 1.688a.601.601 0 0 1-1.081-.108c-.162-.454-.559-1.538-.907-2.244c-.177-.361-.516-.817-.88-1.25a16.705 16.705 0 0 0-.374-.43Z"/></g></svg>
                    </div>

                    <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6">
                        {{ __('general.personality_motivator') }}
                    </h2>
                    <p class="text-center mt-3 text-white text-lg">
                        {{ __('general.personality_motivator_desc') }}
                    </p>
                </div>
                <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 ">
                    <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-14" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.8 3.959c-1.032.665-2.907-.04-3.672 1.077c-.233.34-.118.79.112 1.69l1.99 9.773c.45 1.758.674 2.637 1.373 3.15c.285.21.58.308.897.351M5.8 3.959C7.184 3.066 5.99 2 8 2l2.155 1.693c.859.674 1.288 1.012 1.32 1.488c.032.477-.347.875-1.106 1.67l-.554.58c-.379.397-.569.596-.796.579s-.389-.242-.71-.691zm12.4 0c1.032.665 2.907-.04 3.672 1.077c.233.34.118.79-.112 1.69l-1.99 9.773c-.45 1.758-.674 2.637-1.372 3.15c-.286.21-.582.308-.898.351m.7-16.041C16.816 3.066 18.01 2 16 2l-2.155 1.693c-.859.674-1.288 1.012-1.32 1.488c-.032.477.347.875 1.106 1.67l.554.58c.379.397.569.596.796.579s.389-.242.71-.691zM10.287 7l.87 1.452c.205.34.307.512.338.703c.03.192-.015.386-.104.773L9.55 17.941c-.247 1.386.485 2.06 1.196 2.95c.591.74.887 1.109 1.255 1.109s.664-.37 1.255-1.11c.71-.888 1.443-1.563 1.196-2.949L12.61 9.928c-.089-.387-.133-.581-.103-.773c.03-.191.133-.362.337-.703L13.714 7" color="currentColor"/></svg>
                    </div>
                    <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6">
                        {{ __('general.personality_professional') }}
                    </h2>
                    <p class="text-center mt-3 text-white text-lg">
                        {{ __('general.personality_professional_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section id="about" class="w-full relative mt-20 py-52 after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 rtl:after:right-0 rtl:after:left-auto after:bg-gradient-to-r after:from-brand-sky-level-900 after:via-brand-sky-level-900/95 after:to-transparent after:z-10" style="background: url('{{ asset('images/about-3.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto z-30 relative">
            <div class="max-w-3xl">
                <h1 class="text-4xl uppercase text-white font-bold tracking-wider rtl:tracking-normal leading-relaxed">
                    {{ __('general.committee_title') }}
                </h1>
                <h3 class="text-2xl uppercase text-brand-sky-level-400 font-bold tracking-wider rtl:tracking-normal mt-3">
                    {{ __('general.committee_subtitle') }}
                </h3>
                <p class="text-white mt-6 leading-loose">
                    {{ __('general.committee_paragraph') }}
                </p>
            </div>
        </div>
    </section>


    <section class="w-full relative py-52 after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:right-0 after:bg-gradient-to-l after:from-brand-sky-level-900 after:via-brand-sky-level-900/95 after:to-transparent after:z-10" style="background: url('{{ asset('images/about3.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto z-30 relative flex justify-end">
            <div class="max-w-3xl">
                <h1 class="text-4xl uppercase text-white font-bold tracking-wider rtl:tracking-normal leading-relaxed">
                    {{ __('general.purpose_title') }}
                </h1>
                <h3 class="text-2xl uppercase text-brand-sky-level-400 font-bold tracking-wider rtl:tracking-normal mt-3">
                    {{ __('general.purpose_subtitle') }}
                </h3>
                <p class="text-white mt-6 leading-loose">
                    {{ __('general.purpose_paragraph') }}
                </p>
            </div>
        </div>
    </section>

    <section class="w-full relative py-52 after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 after:bg-gradient-to-r after:from-brand-sky-level-900 after:via-brand-sky-level-900/95 after:to-transparent after:z-10" style="background: url('{{ asset('images/about-4.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container mx-auto z-30 relative">
            <div class="max-w-3xl">
                <h1 class="text-4xl uppercase text-white font-bold tracking-wider rtl:tracking-normal leading-relaxed">
                    {{ __('general.vision_title') }}
                </h1>
                <h3 class="text-2xl uppercase text-brand-sky-level-400 font-bold tracking-wider rtl:tracking-normal mt-3">
                    {{ __('general.vision_subtitle') }}
                </h3>
                <p class="text-white mt-6 leading-loose">
                    {{ __('general.vision_paragraph') }}
                </p>
            </div>
        </div>
    </section>


    <section class="w-full relative py-52 after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:right-0 after:bg-gradient-to-l after:from-brand-sky-level-900 after:via-brand-sky-level-900/95 after:to-transparent after:z-10" style="background: url('{{ asset('images/about3.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto z-30 relative flex justify-end">
            <div class="max-w-3xl">
                <h1 class="text-4xl uppercase text-white font-bold tracking-wider rtl:tracking-normal leading-relaxed">
                    {{ __('general.mission_title') }}
                </h1>
                <h3 class="text-2xl uppercase text-brand-sky-level-400 font-bold tracking-wider rtl:tracking-normal mt-3">
                    {{ __('general.mission_subtitle') }}
                </h3>
                <p class="text-white mt-6 leading-loose">
                    {{ __('general.mission_paragraph') }}
                </p>
            </div>
        </div>
    </section>



    <section class="mt-64">
        <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center gap-14">
            <div class="w-full lg:w-1/2">
                <div class="grid grid-cols-2 gap-5 auto-rows-max">
                    <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 ">
                        <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-14" viewBox="0 0 256 256"><path fill="currentColor" d="M119.76 217.94A8 8 0 0 1 112 224a8.13 8.13 0 0 1-2-.24l-32-8a8 8 0 0 1-2.5-1.11l-24-16a8 8 0 1 1 8.88-13.31l22.84 15.23l30.66 7.67a8 8 0 0 1 5.88 9.7Zm132.69-96.46a15.89 15.89 0 0 1-8 9.25l-23.68 11.84l-55.08 55.09a8 8 0 0 1-7.6 2.1l-64-16a8.06 8.06 0 0 1-2.71-1.25l-55.52-39.64l-24.28-12.14a16 16 0 0 1-7.16-21.46l24.85-49.69a16 16 0 0 1 21.46-7.16l22.06 11l53-15.14a8 8 0 0 1 4.4 0l53 15.14l22.06-11a16 16 0 0 1 21.46 7.16l24.85 49.69a15.9 15.9 0 0 1 .89 12.21Zm-46.18 12.94L179.06 80h-31.82L104 122c12.66 8.09 32.51 10.32 50.32-7.63a8 8 0 0 1 10.68-.61l34.41 27.57Zm-187.54-18l17.69 8.85l24.85-49.69l-17.69-8.85ZM188 152.66l-27.71-22.19c-19.54 16-44.35 18.11-64.91 5a16 16 0 0 1-2.72-24.82a.6.6 0 0 1 .08-.08l44.86-43.51l-9.6-2.74l-50.42 14.41l-27.37 54.73l49.2 35.15l58.14 14.53Zm49.24-36.24l-24.82-49.69l-17.69 8.85l24.85 49.69Z"/></svg>
                        </div>
                        <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6"> {{ __('general.personality_trusted') }}</h2>
                        <p class="text-center mt-3 text-white text-lg">{{ __('general.personality_trusted_desc') }}</p>
                    </div>
                    <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 relative top-10">
                        <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-14 text-white" viewBox="0 0 1024 1024"><path fill="currentColor" d="M508.416 1023.28c-241.248 0-412.369-167.28-412.369-397.777c0-122.368 73.376-254.192 76.496-259.712c6.368-11.343 18.88-17.504 31.936-16.063a32.052 32.052 0 0 1 26.88 23.567c.192.752 19.968 74.752 46.064 115.84c17.536 27.649 35.312 47.185 55.312 60.753c-13.536-58.656-23.904-146.912-7.024-237.472C372.047 63.84 567.695 4.368 576.08 1.968c10.784-3.088 22.225-.32 30.433 7.151c8.192 7.504 11.936 18.752 9.808 29.665c-.32 1.744-32.624 175.776 35.936 324.064c6.223 13.471 14.912 29.12 24.256 44.784c2.656-21.504 6.784-44.368 13.12-66.56c25.152-87.969 90.192-118 92.944-119.217c10.848-4.944 23.504-3.312 32.88 4.032a32.061 32.061 0 0 1 11.68 31.007c-.336 2.16-9.409 62.033 41.536 146.944c46 76.672 59.28 126.368 59.28 221.681c0 230.48-176.432 397.761-419.536 397.761zm-312.721-555.6c-17.568 44.304-35.665 103.246-35.665 157.806c0 193.408 144.192 333.776 348.368 333.776c206 0 355.536-140.368 355.536-333.776c0-83.536-10.32-122.32-50.16-188.752c-26.624-44.368-39.777-84.256-46.065-116c-6.336 10.256-12.223 22.784-16.527 37.872c-19.504 68.193-14.592 147.937-14.527 148.753c.944 14.273-7.744 27.473-21.248 32.257s-28.529.064-36.817-11.663c-2.4-3.408-59.312-83.968-84.4-138.24c-52.096-112.592-51.216-234.336-45.904-304.464c-52.72 30.72-133.664 99.344-159.664 238.912c-25.312 135.808 23.872 271.6 24.4 272.943c4.256 11.088 2 23.664-5.808 32.592c-7.84 8.88-19.904 12.815-31.536 10.03c-3.967-.975-94.032-24.399-152.336-116.286c-10.416-16.464-19.76-36.384-27.647-55.76z"/></svg>
                        </div>
                        <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6">{{ __('general.personality_motivating') }}</h2>
                        <p class="text-center mt-3 text-white text-lg">{{ __('general.personality_motivating_desc') }}</p>
                    </div>
                    <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 ">
                        <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-16" viewBox="0 0 21 21"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M5.5 17.5v-11m0 0c.667-1.333 1.667-2 3-2c2 0 2 2 4 2c1.333 0 2.333-.333 3-1v6c-.667.667-1.667 1-3 1c-2 0-2-2-4-2c-1.333 0-2.333.667-3 2z"/></svg>
                        </div>
                        <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6"> {{ __('general.personality_national') }}</h2>
                        <p class="text-center mt-3 text-white text-lg">{{ __('general.personality_national_desc') }}</p>
                    </div>
                    <div class="bg-brand-sky-level-800 py-16 px-10 flex justify-center items-center flex-col border border-brand-sky-level-600 relative top-10">
                        <div class="size-28 flex justify-center items-center bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white size-14" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="4"><path d="M36 15a5 5 0 1 0 0-10a5 5 0 0 0 0 10Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m12 16.77l8.003-2.772L31 19.247l-10.997 8.197L31 34.684l-6.992 9.314M35.32 21.643l2.682 1.459L44 17.466M16.849 31.545l-2.97 3.912l-9.875 5.54"/></g></svg>
                        </div>
                        <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-6">{{ __('general.personality_young') }}</h2>
                        <p class="text-center mt-3 text-white text-lg"> {{ __('general.personality_young_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <h1 class="text-5xl text-white uppercase font-bold tracking-wider rtl:tracking-normal"> {{ __('general.personality_heading') }}</h1>
                <p class="text-lg text-brand-sky-level-600 mt-5"> {{ __('general.personality_paragraph') }}</p>
                <a href="#" class="px-12 py-5 inline-block bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner font-bold text-white mt-6 transition-all hover:-translate-y-1">{{ __('general.register_now') }}</a>
            </div>
        </div>
    </section>

    <section class="mt-64">
        <div class="container mx-auto">
            <div class="text-white text-center max-w-3xl mx-auto space-y-4">
                <h1 class="text-4xl uppercase font-bold tracking-wider rtl:tracking-normal">
                    {{ __('general.latest_event_title') }}
                </h1>
                <p class="text-lg text-brand-sky-level-600">
                    {{ __('general.latest_event_description') }}
                </p>
            </div>

            <div class="mt-6 relative after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 after:bg-brand-sky-level-900/70  after:z-10">
                <img src="{{ asset('images/video.jpg') }}" class="rounded-lg " alt="">
                <a href="#" class="size-28 rounded-full bg-sky-500 z-30 text-white flex justify-center items-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <section class="mt-64">
        <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center gap-14">
            <div class="w-full lg:w-1/3">
                <h1 class="text-5xl text-white uppercase font-bold tracking-wider rtl:tracking-normal">
                    {{ __('general.latest_news_title') }}
                </h1>
                <p class="text-lg text-brand-sky-level-600 mt-5">
                    {{ __('general.latest_news_description') }}
                </p>
                <a href="#" class="inline-block px-14 py-4 text-lg transition ease-in-out bg-white/40 text-white mt-6 border border-white font-bold hover:bg-white hover:text-gray-900">
                    {{ __('general.all_articles') }}
                </a>
            </div>
            <div class="w-full lg:w-2/3">
                <div class="grid grid-cols-2 gap-5">
                    <a href="#" class="bg-brand-sky-level-800 group flex justify-center  flex-col border border-brand-sky-level-600 hover:scale-95 transition-all ease-in-out group">
                        <div class="w-full" style="height: 300px; background: url('{{ asset('images/about-4.jpg') }}'); background-size: cover; background-position: center center;"></div>
                        <div class="p-5">
                            <h3 class="text-white text-md">January 19, 2022</h3>
                            <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-1 transition-all group-hover:text-brand-sky-level-500">Battleships</h2>
                            <p class="text-white/50 pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit dictum sed in montes, duis vitae. Quis quis sem ac maecenas. Vel at, Lorem ipsum dolor sit amet, consectetur adipiscing elit dictum sed in montes, duis vitae. Quis quis sem ac maecenas. Vel at</p>
                        </div>
                    </a>
                    <a href="#" class="bg-brand-sky-level-800 flex justify-center  flex-col border border-brand-sky-level-600 ">
                        <div class="w-full" style="height: 300px; background: url('{{ asset('images/about-4.jpg') }}'); background-size: cover; background-position: center center;"></div>
                        <div class="p-5">
                            <h3 class="text-white text-md">January 19, 2022</h3>
                            <h2 class="text-2xl tracking-wider rtl:tracking-normal uppercase text-white font-semibold mt-1">Battleships</h2>
                            <p class="text-white/50">Lorem ipsum dolor sit amet, consectetur adipiscing elit dictum sed in montes, duis vitae. Quis quis sem ac maecenas. Vel at, Lorem ipsum dolor sit amet, consectetur adipiscing elit dictum sed in montes, duis vitae. Quis quis sem ac maecenas. Vel at</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
