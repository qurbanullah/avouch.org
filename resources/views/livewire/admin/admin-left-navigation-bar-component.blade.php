<aside x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-30  ease-in"
    x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100 ease-out"
    x-transition:leave-end="-translate-x-full opacity-0 ease-in"
    class="
        fixed
        z-10
        flex flex-col flex-shrink-0
        w-64
        max-h-screen
        overflow-hidden
        transition-all
        transform
        bg-gray-50 dark:bg-gray-800
        border-r
        shadow-lg
        lg:z-auto lg:static lg:shadow-none
    "
    :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
    <!-- Toggle sidebar button -->
    <div class="flex items-center space-x-3 p-2" :class="{'justify-center': !isSidebarOpen}">

        <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none ring-1 focus:ring">
            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300"
                :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg"
                width="1.5em" height="1.5em" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
            </svg>
        </button>
        <!-- Toggle dark theme button -->
        <div class="flex-1 flex items-center justify-end" :class="{'hidden': !isSidebarOpen}">
            <button id="header__sun" onclick="toSystemMode()" title="Switch to system theme" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                </svg>
            </button>
            <button id="header__moon" onclick="toLightMode()" title="Switch to light mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                </svg>
            </button>
            <button id="header__indeterminate" onclick="toDarkMode()" title="Switch to dark mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12A10 10 0 0 0 12 22A10 10 0 0 0 22 12A10 10 0 0 0 12 2M12 4A8 8 0 0 1 20 12A8 8 0 0 1 12 20V4Z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Sidebar links -->
    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden">
            <li class="mt-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 space-x-2 rounded-md text-sm hover:bg-blue-100 dark:hover:bg-blue-600"
                    :class="{'justify-center': !isSidebarOpen}" role="button" aria-haspopup="true">
                    <span>
                        <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                            width="1.5em" height="1.5em" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
                </a>
            </li>
            <li class="mt-4">
                <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open; isSidebarOpen = true"
                        class="flex items-center p-2 space-x-2 text-sm text-gray-800 dark:text-gray-100 transition-colors rounded-md hover:bg-blue-100 dark:hover:bg-blue-600"
                        :class="{'justify-center': !isSidebarOpen}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span>
                            <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2a5 5 0 1 0 5 5a5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3a3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z" />
                            </svg>
                        </span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }">User</span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }" class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2" aria-label="User"
                        :class="{'hidden': !isSidebarOpen}">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{ route('admin.users.all-users') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Users
                        </a>
                        <a href="{{ route('admin.users.online-users') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            Online Users
                        </a>
                    </div>
                </div>
            </li>
            <li class="mt-4">
                <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open; isSidebarOpen = true"
                        class="flex items-center p-2 space-x-2 text-sm text-gray-800 dark:text-gray-100 transition-colors rounded-md hover:bg-blue-100 dark:hover:bg-blue-600"
                        :class="{'justify-center': !isSidebarOpen}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span>
                            <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M304 136H128v152h80v88h176V224h-80ZM160 256v-88h112v88H160Zm192 0v88H240v-56h64v-32Z" />
                                <path fill="currentColor"
                                    d="M400 48H112V16H16v96h32v288H16v96h96v-32h288v32h96v-96h-32V112h32V16h-96ZM48 48h32v32H48Zm32 416H48v-32h32Zm384 0h-32v-32h32ZM432 48h32v32h-32Zm0 352h-32v32H112v-32H80V112h32V80h288v32h32Z" />
                            </svg>
                        </span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }">Groups</span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }" class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2" aria-label="Groups"
                        :class="{'hidden': !isSidebarOpen}">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{ route('admin.packages.admin-all-groups') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Groups
                        </a>
                    </div>
                </div>
            </li>
            <li class="mt-4">
                <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open; isSidebarOpen = true"
                        class="flex items-center p-2 space-x-2 text-sm text-gray-800 dark:text-gray-100 transition-colors rounded-md hover:bg-blue-100 dark:hover:bg-blue-600"
                        :class="{'justify-center': !isSidebarOpen}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span>
                            <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <path
                                        d="m16.5 9.4l-9-5.19M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                    <path d="M3.27 6.96L12 12.01l8.73-5.05M12 22.08V12" />
                                </g>
                            </svg>
                        </span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }">Packages</span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }" class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2" aria-label="Packages"
                        :class="{'hidden': !isSidebarOpen}">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{ route('admin.packages.all-packages') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Packages
                        </a>
                        <a href="{{ route('admin.packages.all-built-packages') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Built Packages
                        </a>
                    </div>
                </div>
            </li>
            <li class="mt-4">
                <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open; isSidebarOpen = true"
                        class="flex items-center p-2 space-x-2 text-sm text-gray-800 dark:text-gray-100 transition-colors rounded-md hover:bg-blue-100 dark:hover:bg-blue-600"
                        :class="{'justify-center': !isSidebarOpen}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span>
                            <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 15 15">
                                <path fill="currentColor"
                                    d="M14 6.5V12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6.5a.5.5 0 0 1 .5-.5a.49.49 0 0 1 .21 0l5.79 4l5.8-4a.488.488 0 0 1 .2 0a.5.5 0 0 1 .5.5zM1.25 3.92l.08.08L7.5 8l6.19-4h.06a.49.49 0 0 0 .25-.5a.5.5 0 0 0-.5-.5h-12a.5.5 0 0 0-.5.5a.49.49 0 0 0 .25.42z" />
                            </svg>
                        </span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }">Posts</span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }" class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2" aria-label="Posts"
                        :class="{'hidden': !isSidebarOpen}">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{ route('admin.posts.admin-all-posts') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Posts
                        </a>
                        <a href="{{ route('admin.posts.admin-create-new-post') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            Create Post
                        </a>
                    </div>
                </div>
            </li>
            <li class="mt-4">
                <div x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open; isSidebarOpen = true"
                        class="flex items-center p-2 space-x-2 text-sm text-gray-800 dark:text-gray-100 transition-colors rounded-md hover:bg-blue-100 dark:hover:bg-blue-600"
                        :class="{'justify-center': !isSidebarOpen}" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <span>
                            <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }">Settings</span>
                        <span :class="{ 'lg:hidden': !isSidebarOpen }" class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2" aria-label="Settings"
                        :class="{'hidden': !isSidebarOpen}">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{ route('admin.packages.all-packages') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Packages
                        </a>
                        <a href="{{ route('admin.packages.all-built-packages') }}" role="menuitem"
                            class="block pl-10 pt-1 pb-1 transition-colors duration-200 rounded-md text-xs text-gray-800 dark:text-gray-200 dark:hover:text-light hover:text-gray-600 dark:hover:text-gray-400">
                            All Built Packages
                        </a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Links... -->
        </ul>
    </nav>
    <!-- Sidebar footer -->
    <div class="flex-shrink-0 p-2 border-t max-h-14">
        <button
            class="
            flex
            items-center
            justify-center
            w-full
            px-4
            py-2
            space-x-1
            font-medium
            tracking-wider
            uppercase
            bg-gray-50 dark:bg-gray-800
            border
            rounded-md
            focus:outline-none focus:ring
        ">
            <span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
        </button>
    </div>
</aside>
