<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name='description' content='A secure, reliable and user friendly open source operating system'>
        <meta name="keywords" content="operating system, OS, open source, avouch, secure OS, reliable OS, replacement for Windows and macOS, Linux based distribution">
        <meta name="author" content="Avouch">
        <meta name="theme-color" content="#3689e6">
        <meta property="og:title" content="A secure, reliable and user friendly open source operating system">
        <meta property="og:description" content="A secure, reliable and user friendly open source operating system">
        <meta property="og:image" content="/assets/images/preview.png">
        <meta itemscope itemprop="name" content="A secure, reliable and user friendly open source operating system">
        <meta itemscope itemprop="description" content="A secure, reliable and user friendly open source operating system">
        <meta itemscope itemprop="image" content="/assets/images/preview.png">
        <meta name="apple-mobile-web-app-title" content="avouch">

        {{-- <title>{{ config('app.name', 'A secure, reliable and user friendly open source operating system') }}</title> --}}
        <title>@yield('title', config('app.name') . ' Linux - ' . 'A secure, reliable and user friendly operating system')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- only load trixassest for those route which requred these assets --}}
        @if (Route::current()->getName() == 'admin.posts.admin-create-new-post'
            OR Route::current()->getName() == 'posts.post-detail-component'
        )
            @trixassets
        @endif

        @livewireStyles

        <!-- Scripts -->
        <script>
            // // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            // if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            //     document.querySelector('html').classList.add('dark')
            // } else {
            //     document.querySelector('html').classList.remove('dark')
            // }
            // // Whenever the user explicitly chooses light mode
            // localStorage.theme = 'light'

            // // Whenever the user explicitly chooses dark mode
            // localStorage.theme = 'dark'

            // // Whenever the user explicitly chooses to respect the OS preference
            // localStorage.removeItem('theme')

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (localStorage.theme === 'system') {
                    if (e.matches) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });

            function updateTheme() {
                if (!('theme' in localStorage)) {
                    localStorage.theme = 'system';
                }

                switch (localStorage.theme) {
                    case 'system':
                        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                        document.documentElement.setAttribute('color-theme', 'system');
                        break;

                    case 'dark':
                        document.documentElement.classList.add('dark');
                        document.documentElement.setAttribute('color-theme', 'dark');
                        break;

                    case 'light':
                        document.documentElement.classList.remove('dark');
                        document.documentElement.setAttribute('color-theme', 'light');
                        break;
                }
            }

            updateTheme();

            window.toDarkMode=function(){
                localStorage.theme="dark",
                window.updateTheme()
            },
            window.toLightMode=function(){
                localStorage.theme="light",
                window.updateTheme()
            },
            window.toSystemMode=function(){
                localStorage.theme="system",
                window.updateTheme()
            }

        </script>
        {{-- end of activate the dark theme on system default settings --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="">
                    <div class="max-w-7xl mx-auto">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Start of Page Footer -->
            <footer class="footer-1 py-8 sm:py-8 bg-gray-100 dark:bg-gray-600 dark:text-gray-50">
                <div class="container mx-auto px-8">
                    <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
                        <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6">
                            <h5 class="text-xl font-bold mb-6">Features</h5>
                            <ul class="list-none footer-links">
                                <li class="mb-2">
                                    <a href="{{ route('packages.package-home') }}" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Built from scratch</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('open-source') }}" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Open Source</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Work fast</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('downloads.download-releases') }}" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Live CD/USB</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 sm:mt-0">
                            <h5 class="text-xl font-bold mb-6">Resources</h5>
                            <ul class="list-none footer-links">
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Resource</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Resource name</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Another resource</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Final resource</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                            <h5 class="text-xl font-bold mb-6">About</h5>
                            <ul class="list-none footer-links">
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Team</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Locations</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Privacy</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Terms</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                            <h5 class="text-xl font-bold mb-6">Help</h5>
                            <ul class="list-none footer-links">
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Support</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Help Center</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-400">Contact Us</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- <div class="px-4 mt-4 sm:w-1/3 xl:w-1/6 sm:mx-auto xl:mt-0 xl:ml-auto">
                            <h5 class="text-xl font-bold mb-6 sm:text-center xl:text-left">Stay connected</h5>
                            <div class="flex sm:justify-center xl:justify-start gap-4">
                                <a href="" class="w-8 h-8 rounded-full text-center text-gray-600 hover:text-white">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true"
                                        focusable="false"
                                        width="2em"
                                        height="2em"
                                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                        preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 32 32">
                                        <path
                                            d="M32 16c0-8.839-7.167-16-16-16C7.161 0 0 7.161 0 16c0 7.984 5.849 14.604 13.5 15.803V20.626H9.437v-4.625H13.5v-3.527c0-4.009 2.385-6.223 6.041-6.223c1.751 0 3.584.312 3.584.312V10.5h-2.021c-1.984 0-2.604 1.235-2.604 2.5v3h4.437l-.713 4.625H18.5v11.177C26.145 30.603 32 23.983 32 15.999z"
                                            fill="#626262"/>
                                    </svg>
                                </a>
                                <a href="" class="w-8 h-8 rounded-full text-center text-gray-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true"
                                        focusable="false"
                                        width="2.2em"
                                        height="2.2em"
                                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                        preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 1024 1024">
                                        <path
                                            d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z"
                                            fill="#626262"/>
                                    </svg>
                                </a>
                                <a href="" class="w-8 h-8 rounded-full text-center text-gray-600 hover:text-white">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true"
                                        focusable="false"
                                        width="2em"
                                        height="2em"
                                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                        preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 32 32">
                                        <path
                                            d="M32 16c0-8.839-7.167-16-16-16C7.161 0 0 7.161 0 16c0 7.984 5.849 14.604 13.5 15.803V20.626H9.437v-4.625H13.5v-3.527c0-4.009 2.385-6.223 6.041-6.223c1.751 0 3.584.312 3.584.312V10.5h-2.021c-1.984 0-2.604 1.235-2.604 2.5v3h4.437l-.713 4.625H18.5v11.177C26.145 30.603 32 23.983 32 15.999z"
                                            fill="#626262"/>
                                    </svg>
                                </a>
                            </div>
                        </div> -->
                    </div>

                    <div class="sm:flex sm:flex-wrap sm:-mx-4 mt-6 pt-6 sm:mt-12 sm:pt-12 border-t">
                        <div class="sm:w-full px-4 md:w-1/6">
                            <strong>2021</strong>
                        </div>
                        <div class="px-4 sm:w-1/2 md:w-1/4 mt-4 md:mt-0">
                            {{-- <h6 class="font-bold mb-2">Address</h6>
                            <address class="not-italic mb-4 text-sm">
                                123 6th St.<br>
                                Melbourne, FL 32904
                            </address> --}}
                            Privacy Policy | Terms & Conditions
                        </div>
                        <div class="px-4 sm:w-1/2 md:w-1/4 mt-4 md:mt-0">
                            <h6 class="font-bold mb-2">Avouch</h6>
                        </div>
                        <!-- <div class="px-4 md:w-1/4 md:ml-auto mt-6 sm:mt-4 md:mt-0">
                            <button class="px-4 py-2 bg-purple-800 hover:bg-purple-900 rounded text-white">Get Started</button>
                        </div> -->
                    </div>
                </div>
            </footer>
            <!-- End of Page Footer -->
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
