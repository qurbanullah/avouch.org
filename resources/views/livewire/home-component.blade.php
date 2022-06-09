{{-- <x-slot name="header">
    <div class="flex">
        <div class="inline flex-1">
            <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </div>
</x-slot> --}}
<div class="content-center">
    <div class="bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
        <div class="">
            <div class="h-auto bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200 overflow-hidden shadow-xl">
                <div class="flex justify-center content-center items-center">
                    <div class="max-w-screen-2xl mx-auto w-full px-8">
                        <div class="py-4 md:flex gap-6 items-top content-center justify-center">

                            <div class="py-2 flex flex-col justify-center content-center items-center">
                                <h2 class="py-4 text-3xl font-semibold">Built from scratch</h2>
                                <p class="py-4">Avouch Linux has completely built from scratch. It has its own package manager, installer, much more and the evolution continues. Click below to explore the packages for daily routines.</p>
                                <a class="py-4" href="{{ route('packages.package-home') }}">
                                    <button class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                        Learn more
                                    </button>
                                </a>
                            </div>

                            <div class="py-2 flex flex-col justify-center content-center items-center">
                                <h2 class="py-4 text-3xl font-semibold">Open Source</h2>
                                <p class="py-4">We build on open source Our code is available for review, scrutiny, modification, and redistribution by anyone. We encourged for contribution to explore the new possibilities.</p>
                                <a class="py-4"  href="{{ route('open-source') }}">
                                    <button class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                        Learn more
                                    </button>
                                </a>
                            </div>

                            <div class="py-2 flex flex-col justify-center content-center items-center">
                                <h2 class="py-4 text-3xl font-semibold">Work fast</h2>
                                <p class="py-4">Stop waiting around for your computer to load. Avouch Linux runs fast and stays fast, applications are quick to open and doesn’t slow down with updates.</p>
                                <a class="py-4"  href="{{ route('home') }}">
                                    <button class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                        Learn more
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- livewire thumbnail slider componenet --}}
            {{-- <div class="">
                <div class="p-4 bg-gray-300 text-gray-800 dark:text-white">
                    @livewire('thumbnail-slider')
                </div>
            </div> --}}

            <div class="h-auto bg-gray-200 text-gray-800 overflow-hidden shadow-xl">
                <div class="py-4 flex flex-col items-center content-center justify-items-center">
                    <h2 class="py-4 text-4xl font-semibold">Suported Desktop Environments</h2>
                    <div class="max-w-screen-2xl mx-auto w-full px-8">
                        <div class="md:flex gap-6">

                            <div class="md:w-1/2 pt-12 pb-12">

                                <div class="px-6 py-6 flex flex-col  items-center content-center justify-items-center">
                                    <img src="{{ asset('img/gnome.svg') }}" alt="Gnome">
                                    <h3 class="py-4 text-3xl font-semibold">Gnome</h3>
                                    <p>Gnome provide an easy and elegant way to use your computer, GNOME 3 is designed to put you in control and get things done. The latest release (Gnome 40) available at the time is integrated into this ISO.</p>
                                </div>

                                <div class="px-6 py-6 flex flex-col  items-center content-center justify-items-center">
                                    <img src="{{ asset('img/kde.svg') }}" alt="KDE Plasma">
                                    <h3 class="py-4 text-3xl font-semibold">KDE Plasma</h3>
                                    <p>Plasma is Simple by default, powerful when needed. Plasma is built in widgets, allowing you to move, mix, add, and remove just about everything to perfect your personal workflow. The latest release (Plasma 5.21.2) available at the time is integrated into this ISO.</p>
                                </div>

                            </div>

                            <div class="md:w-1/2 pt-12 pb-12">

                                <div class="px-6 py-6 flex flex-col  items-center content-center justify-items-center">
                                    <img src="{{ asset('img/xfce.svg') }}" alt="Xfce4">
                                    <h3 class="py-4 text-3xl font-semibold">Xfce4</h3>
                                    <p>Xfce is a lightweight desktop environment for UNIX-like operating systems. It aims to be fast and low on system resources, while still being visually appealing and user friendly. The release 4.16 is integrated.</p>
                                </div>

                                <div class="px-6 py-6 flex flex-col  items-center content-center justify-items-center">
                                    <img src="{{ asset('img/lxqt.svg') }}" alt="Lxqt">
                                    <h3 class="py-4 text-3xl font-semibold">LXQT</h3>
                                    <p>LXQt is a lightweight Qt desktop environment. It will not get in your way. It will not hang or slow down your system. It is focused on being a classic desktop with a modern look and feel. The latest release (LXQt 0.16.0) available at the time is integrated into this ISO.</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="h-auto bg-gray-900 text-gray-100 overflow-hidden shadow-xl">
                <div class="py-4">
                    <div class="max-w-screen-2xl mx-auto w-full px-8">
                        <div class="md:flex gap-6 items-top content-center justify-center">
                            <div class="w-full pt-12 pb-12">
                                <div class="flex items-center content-center justify-items-center">
                                    <h2 class="px-6 text-4xl leading-10 font-semibold">Key features</h2>
                                </div>
                                <div class="">
                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">Open Source</h3>
                                        </div>
                                        <div class="px-11 text-base">Source code is freely available and it is community based development project.</div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">Multi-User</h3>
                                        </div>
                                        <div class="px-11 text-base">Multiuser system means multiple users can access system resources like memory/ ram/ application programs at same time.</div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">Multiprogramming</h3>
                                        </div>
                                        <div class="px-11 text-base">Multiprogramming system means multiple applications can run at same time</div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">Portability</h3>
                                        </div>
                                        <div class="px-11 text-base">Provides user security using authentication features like password protection/ controlled access to specific files/ encryption of data</div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">Security</h3>
                                        </div>
                                        <div class="px-11 text-base">Support different types of hardware. With SE-Linux have more control over who can access the system.</div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">Live CD/USB</h3>
                                        </div>
                                        <div class="px-11 text-base">User can run/try the OS even without installing it on the system.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="h-auto bg-green-100 text-gray-800 overflow-hidden shadow-xl">
                <div class="py-4">
                    <div class="max-w-screen-2xl mx-auto w-full px-8">
                        <div class="md:flex gap-6 items-top content-center justify-center">
                            <div class="w-full pt-12 pb-12">
                                <div class="sm:flex">

                                    <div class="p-4 flex-1">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-800 text-2xl leading-10 font-semibold">Desktops </h3>
                                        </div>
                                        <div class="px-11 text-base">Avouch comes with everything you need to run your organisation, school, home or enterprise. All the essential applications, like an office suite, browsers, email and media apps come pre-installed and thousands more games and applications are available.</div>
                                    </div>

                                    <div class="p-4 flex-1">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-800 text-2xl leading-10 font-semibold">Open source security </h3>
                                        </div>
                                        <div class="px-11 text-base">More than Linux. Security and compliance for the full stack. Secure your open source apps. Patch the full stack, from kernel to library and applications. All applications are hardend for latest security vulnerabilities</div>
                                    </div>

                                    <div class="p-4 flex-1">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-800 text-2xl leading-10 font-semibold">Hardware support</h3>
                                        </div>
                                        <div class="px-11 text-base">Avouch works on a wide range of laptops, computers and workstations. It means that user can experience an easy and cool feelings out of the box with more hardware choice than ever.</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-auto bg-purple-900 text-gray-100 overflow-hidden shadow-xl">
                <div class="py-4">
                    <div class="max-w-screen-2xl mx-auto w-full px-8">
                        <div class="md:flex gap-6 items-top content-center justify-center">
                            <div class="md:w-1/2 pt-12 pb-12">
                                <div class="flex items-center content-center justify-items-center">
                                    <h2 class="px-6 text-4xl leading-10 font-semibold">Popular Downloads</h2>
                                </div>
                                <div class="">

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">
                                                <a href="https://avouch.org/packages/package-info/vlc" class="text-green-300 hover:text-green-500">VLC 3.0.16</a>
                                            </h3>
                                        </div>
                                        <div class="px-11 text-base">
                                            <p>
                                                A multi-platform MPEG, VCD/DVD, and DivX player.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="pl-4 text-gray-100 text-2xl leading-10 font-semibold">
                                                <a href="https://avouch.org/packages/package-info/krita" class="text-green-300 hover:text-green-500">Krita 5.0.0</a>
                                            </h3>
                                        </div>
                                        <div class="px-11 text-base">
                                            <p>
                                                Professional vector graphics editor.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="md:w-1/2 pt-12 pb-12">
                                @livewire('news.latest-news-component')
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
