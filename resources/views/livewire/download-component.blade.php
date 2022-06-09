<div class="content-center">
    {{-- page title --}}
    @section('title', 'Download Avouch Linux and try it')
    <div class="h-auto bg-gray-200 text-gray-800 dark:bg-gray-800 dark:text-gray-100 overflow-hidden shadow-xl">
        <div class="px-4 py-4 flex flex-col items-center content-center justify-items-center">
            <div class="max-w-7xl mx-auto">
                <div class="md:flex">
                    <div class="md:w-1/2 pt-12 pb-12">
                        <div id="download-gnome" class="px-4 border-b border-gray-500">
                            <div class="py-6 flex flex-col items-center content-center justify-items-center">
                                <img src="{{ asset('images/gnome.svg') }}" alt="Gnome">
                                <h3 class="py-4 text-3xl font-semibold">Avouch Live (Gnome)</h3>
                                <p>Avouch provides GNOME straight out of the box – just install or try it live. Avouch 0.2.0 is now available and ships GNOME 40.</p>
                            </div>
                            <div>
                                <div>
                                    <h3 class="py-4 text-2xl font-semibold">Recommended system requirements:</h3>
                                </div>
                                <div>
                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">2 GHz dual core processor or better</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">4 GB system memory</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">25 GB of free hard drive space</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">Either a DVD drive or a USB port for the installer media</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-6">
                                    <p>Guidelines for creating bootable USB can be found at
                                        <a href="">Avouch Magazine / </a>
                                        <a href="">Wiki</a>
                                        for installing / testing Avouch Linux.
                                    </p>
                                </div>
                                <div class="py-16 flex flex-col items-center content-center justify-items-center">
                                    <p class="py-2">
                                        Avouch 0.2.0: x86_64 DVD ISO
                                    </p>
                                    <p>
                                        <a href="{{ env('APP_URL') . '/releases/x86_64/' . 'Avouch-Live-Gnome-0.2.0-x86_64.iso' }}" class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                            Download
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="download-plasma" class="px-4 py-16">
                            <div class="py-6 flex flex-col items-center content-center justify-items-center">
                                <img src="{{ asset('images/kde.svg') }}" alt="Gnome">
                                <h3 class="py-4 text-3xl font-semibold">Avouch Live (Plasma)</h3>
                                Avouch provides KDE Plasam straight out of the box – just install or try it live. Avouch 0.2.0 is now available and ships Plasma 5.21.4.
                            </div>
                            <div>
                                <div>
                                    <h3 class="py-4 text-2xl font-semibold">Recommended system requirements:</h3>
                                </div>
                                <div>
                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">2 GHz dual core processor or better</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">4 GB system memory</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">25 GB of free hard drive space</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">Either a DVD drive or a USB port for the installer media</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-6">
                                    <p>Guidelines for creating bootable USB can be found at
                                        <a href="">Avouch Magazine / </a>
                                        <a href="">Wiki</a>
                                        for installing / testing Avouch Linux.
                                    </p>
                                </div>
                                <div class="py-16 flex flex-col items-center content-center justify-items-center">
                                    <p class="py-2">
                                        Avouch 0.2.0: x86_64 DVD ISO
                                    </p>
                                    <p>
                                        <a href="{{ env('APP_URL') . '/releases/x86_64/' . 'Avouch-Live-Gnome-0.2.0-x86_64.iso' }}" class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                            Download
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-1/2 pt-12 pb-12">
                        <div id="download-xfce4" class="px-4 border-b border-gray-500">
                            <div class="py-6 flex flex-col items-center content-center justify-items-center">
                                <img src="{{ asset('images/xfce.svg') }}" alt="Gnome">
                                <h3 class="py-4 text-3xl font-semibold">Avouch Live (Xfce4)</h3>
                                Avouch provides Xfce4 straight out of the box – just install or try it live. Avouch 0.2.0 is now available and ships Xfce4 4.16.0.
                            </div>
                            <div>
                                <div>
                                    <h3 class="py-4 text-2xl font-semibold">Recommended system requirements:</h3>
                                </div>
                                <div>
                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">2 GHz dual core processor or better</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">4 GB system memory</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">25 GB of free hard drive space</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">Either a DVD drive or a USB port for the installer media</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-6">
                                    <p>Guidelines for creating bootable USB can be found at
                                        <a href="">Avouch Magazine / </a>
                                        <a href="">Wiki</a>
                                        for installing / testing Avouch Linux.
                                    </p>
                                </div>
                                <div class="py-16 flex flex-col items-center content-center justify-items-center">
                                    <p class="py-2">
                                        Avouch 0.2.0: x86_64 DVD ISO
                                    </p>
                                    <p>
                                        <a href="{{ env('APP_URL') . '/releases/x86_64/' . 'Avouch-Live-Xfce-0.2.0-x86_64.iso' }}" class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                            Download
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="download-lxqt" class="px-4 py-16">
                            <div class="py-6 flex flex-col items-center content-center justify-items-center">
                                <img src="{{ asset('images/lxqt.svg') }}" alt="lxqt">
                                <h3 class="py-4 text-3xl font-semibold">Avouch Live (LXQT)</h3>
                                Avouch provides LXQT straight out of the box – just install or try it live. Avouch 0.2.0 is now available and ships LXDT 0.16.0.
                            </div>
                            <div>
                                <div>
                                    <h3 class="py-4 text-2xl font-semibold">Recommended system requirements:</h3>
                                </div>
                                <div>
                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">2 GHz dual core processor or better</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">4 GB system memory</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">25 GB of free hard drive space</h3>
                                        </div>
                                    </div>

                                    <div class="p-1">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ml-2 h-5 w-5 text-green-400"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="pl-4 text-base leading-10">Either a DVD drive or a USB port for the installer media</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-6">
                                    <p>Guidelines for creating bootable USB can be found at
                                        <a href="">Avouch Magazine / </a>
                                        <a href="">Wiki</a>
                                        for installing / testing Avouch Linux.
                                    </p>
                                </div>
                                <div class="py-16 flex flex-col items-center content-center justify-items-center">
                                    <p class="py-2">
                                        Avouch 0.2.0: x86_64 DVD ISO
                                    </p>
                                    <p>
                                        <a href="{{ env('APP_URL') . '/releases/x86_64/' . 'Avouch-Live-Plasma-0.2.0-x86_64.iso' }}" class="py-2 px-8 bg-green-600 hover:bg-green-500 text-white font-bold rounded-full">
                                            Download
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
