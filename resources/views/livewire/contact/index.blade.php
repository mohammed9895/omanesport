<div>
    <div class="pt-56 text-center">
        <h1 class="text-6xl uppercase text-white font-bold tracking-wider rtl:tracking-normal"> {{ __('contact.heading') }}</h1>
    </div>

    <div class="container mx-auto mt-32 lg:mt-56 max-w-6xl">
        <div class="flex justify-between items-center flex-col lg:flex-row gap-10">
            <div class="w-full lg:w-1/3">
                <h1 class="text-3xl uppercase text-white font-bold tracking-wider rtl:tracking-normal"> {{ __('contact.subheading') }}</h1>
                <p class="text-gray-400 text-lg mt-2">{{ __('contact.description') }}</p>
                <a href="mailto:" class="flex justify-start items-center space-x-3 rtl:space-x-reverse mt-10 group">
                    <div class="w-12 h-12 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-8" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><rect width="18.5" height="17" x="2.682" y="3.5" rx="4"/><path stroke-linecap="round" stroke-linejoin="round" d="m2.729 7.59l7.205 4.13a3.956 3.956 0 0 0 3.975 0l7.225-4.13"/></g></svg>
                    </div>
                    <div class="text-xl text-white group-hover:text-sky-400 transition-all">info@omanesport.om</div>
                </a>

                <a href="mailto:" class="flex justify-start items-center space-x-3  rtl:space-x-reverse mt-5 group">
                    <div class="w-12 h-12 flex justify-center items-center text-white bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-8" viewBox="0 0 1024 1024"><path fill="currentColor" d="M262.2 37c37.4 51.6 82.002 118.197 133.602 199.598c13 22 11 48.4-5.8 79.4c-6.4 13-22.6 42.6-48.4 89.2c28.4 40 71.6 89.2 129.8 147.2s106.602 101.4 145.2 129.8c46.401-27.2 76.201-43.8 89.201-50.399c16.8-9 33-13.6 48.4-13.6c11.6 0 22 2.6 31 7.8c59.4 36.2 126.601 80.8 201.4 133.6c14.2 10.4 22.2 24.601 24.2 42.601c2 18.2-3.599 37.4-16.399 58.2c-6.4 9-16.8 22.2-31 39.8c-14.201 17.4-35.601 39.4-64.002 65.8s-51.6 39.802-69.8 39.802h-2c-136.6-5.4-305-107.801-504.4-307.201c-199.6-199.6-302-367.8-307.2-504.6c0-18 13.2-41.6 39.8-70.8c26.4-29 48.2-50 64.799-63c16.8-12.8 31-23.2 42.6-31c14.2-10.4 30.4-15.4 48.4-15.4c22.2 0 38.8 7.8 50.6 23.2zm-63.998 40.598c-27.2 19.4-52.603 41.198-76.603 64.998c-23.8 24-37.8 41.6-41.6 53.2c5.2 120.2 101 273.2 287.6 459.2c186.6 186 340 282.2 460 288.6c10.4-3.8 27.4-18 51.4-42.6s45.6-50.399 64.8-77.399c3.8-5.2 5.2-9.6 3.8-13.6c-77.4-54.2-142-97.4-193.8-129.801c-5.2 0-11.6 2-19.4 5.8c-11.6 6.4-40.6 22.6-87.2 48.4l-33 19.4l-33-21.4c-42.6-29.6-94.199-75.6-154.999-137.6c-60.6-60.6-105.8-112.4-135.6-155l-23.2-31l19.4-34.799c25.8-46.4 42-75.6 48.4-87.2c3.8-7.8 5.8-14.2 5.8-19.4c-46-73.401-88.599-138-127.398-193.6h-2c-5 0-9.6 1.4-13.4 3.8z"/></svg>
                    </div>
                    <div class="text-xl text-white group-hover:text-sky-400 transition-all tracking-wider">+968 94449151</div>
                </a>
            </div>

            <div class="bg-brand-sky-level-800 w-full lg:w-2/3 py-10 px-10 flex border border-brand-sky-level-600 ">
                <form action="#" class="w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                        <div class="flex flex-col space-y-2">
                            <label for="fullname" class="text-xl text-white tracking-wide uppercase font-semibold">{{ __('contact.form.name') }}</label>
                            <input id="fullname" type="text" class="p-5 w-full bg-transparent border-2 border-white/30 outline-0 focus:outline-0 ring-0 focus:ring-0 focus:border-white placeholder-white text-white" placeholder="{{ __('contact.form.name_placeholder') }}" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="email" class="text-xl text-white tracking-wide uppercase font-semibold">{{ __('contact.form.email') }}</label>
                            <input id="email" type="email" class="p-5 w-full bg-transparent border-2 border-white/30 outline-0 focus:outline-0 ring-0 focus:ring-0 focus:border-white placeholder-white text-white" placeholder="{{ __('contact.form.email_placeholder') }}" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="phone" class="text-xl text-white tracking-wide uppercase font-semibold">{{ __('contact.form.phone') }}</label>
                            <input id="phone" type="email" class="p-5 w-full bg-transparent border-2 border-white/30 outline-0 focus:outline-0 ring-0 focus:ring-0 focus:border-white placeholder-white text-white" placeholder="{{ __('contact.form.phone_placeholder') }}" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="subject" class="text-xl text-white tracking-wide uppercase font-semibold"> {{ __('contact.form.subject') }}</label>
                            <input id="subject" type="email" class="p-5 w-full bg-transparent border-2 border-white/30 outline-0 focus:outline-0 ring-0 focus:ring-0 focus:border-white placeholder-white text-white" placeholder="{{ __('contact.form.subject_placeholder') }}" />
                        </div>
                        <div class="flex flex-col space-y-2 col-span-2">
                            <label for="message" class="text-xl text-white tracking-wide uppercase font-semibold">{{ __('contact.form.message') }}</label>
                            <textarea id="message" type="message" class="p-5 w-full bg-transparent border-2 border-white/30 outline-0 focus:outline-0 ring-0 focus:ring-0 focus:border-white placeholder-white text-white" placeholder="{{ __('contact.form.message_placeholder') }}" ></textarea>
                        </div>
                        <div class="flex justify-between items-center space-y-2 col-span-2">
                            <button href="" class="px-12 text-white transition-all ease-in-out py-5 bg-gradient-to-t from-brand-sky-level-400 to-brand-sky-level-200 text-lg border-2 border-white/10 shadow-inner font-bold hover:-translate-y-1">{{ __('contact.form.send_button') }}</button>
                            <div class="flex space-x-3 mt-6 rtl:space-x-reverse" bis_skin_checked="1">
                                <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-brand-sky-level-700 text-lg  hover:scale-95 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 224 488"><path fill="currentColor" d="M51 91v63H4v78h47v230h95V232h65q6-37 8-78h-72v-53q0-6 6.5-12.5T168 82h52V2h-71q-28 0-48.5 8.5T71 29.5T57 55t-5.5 21.5T51 91z"></path></svg>
                                </a>
                                <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-brand-sky-level-700 text-lg  hover:scale-95 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584l-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"></path></svg>
                                </a>
                                <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-brand-sky-level-700 text-lg  hover:scale-95 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M23 9.71a8.5 8.5 0 0 0-.91-4.13a2.92 2.92 0 0 0-1.72-1A78.36 78.36 0 0 0 12 4.27a78.45 78.45 0 0 0-8.34.3a2.87 2.87 0 0 0-1.46.74c-.9.83-1 2.25-1.1 3.45a48.29 48.29 0 0 0 0 6.48a9.55 9.55 0 0 0 .3 2a3.14 3.14 0 0 0 .71 1.36a2.86 2.86 0 0 0 1.49.78a45.18 45.18 0 0 0 6.5.33c3.5.05 6.57 0 10.2-.28a2.88 2.88 0 0 0 1.53-.78a2.49 2.49 0 0 0 .61-1a10.58 10.58 0 0 0 .52-3.4c.04-.56.04-3.94.04-4.54ZM9.74 14.85V8.66l5.92 3.11c-1.66.92-3.85 1.96-5.92 3.08Z"></path></svg>
                                </a>
                                <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-brand-sky-level-700 text-lg  hover:scale-95 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 1536 1536"><path fill="currentColor" d="M1024 768q0-106-75-181t-181-75t-181 75t-75 181t75 181t181 75t181-75t75-181zm138 0q0 164-115 279t-279 115t-279-115t-115-279t115-279t279-115t279 115t115 279zm108-410q0 38-27 65t-65 27t-65-27t-27-65t27-65t65-27t65 27t27 65zM768 138q-7 0-76.5-.5t-105.5 0t-96.5 3t-103 10T315 169q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103t-3 96.5t0 105.5t.5 76.5t-.5 76.5t0 105.5t3 96.5t10 103T169 1221q20 50 58 88t88 58q29 11 71.5 18.5t103 10t96.5 3t105.5 0t76.5-.5t76.5.5t105.5 0t96.5-3t103-10t71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103t3-96.5t0-105.5t-.5-76.5t.5-76.5t0-105.5t-3-96.5t-10-103T1367 315q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10t-96.5-3t-105.5 0t-76.5.5zm768 630q0 229-5 317q-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124T5 1085q-5-88-5-317t5-317q10-208 124-322T451 5q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"></path></svg>
                                </a>
                                <a href="#" class="w-10 h-10 flex justify-center items-center text-white bg-brand-sky-level-700 text-lg  hover:scale-95 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"><path fill="currentColor" d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418Z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
