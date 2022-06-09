<!-- Main content -->
<main class="flex-1 max-h-full sm:px-6 lg:px-8 py-2 overflow-hidden overflow-y-scroll">
    <!-- Main content header -->
    <div
        class="
            flex flex-col
            items-start
            justify-between
            space-y-2
            lg:items-center lg:space-y-0 lg:flex-row
        ">
        <h1 class="text-xl font-semibold whitespace-nowrap">Dashboard</h1>
    </div>

    <!-- Start Content -->

    <!-- Chart cards (Four columns grid) -->
    <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2 lg:grid-cols-4">
        <!-- Users chart card -->
        <a href="#"
            class="p-4 transition-shadow border border-slate-300 hover:border-slate-400 dark:border-slate-600 dark:hover:border-slate-400 rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                    <span class="text-gray-400">Total Users</span>
                    <span class="text-lg font-semibold">{{ $users->count() }}</span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
            <div>
                <span class="inline-block px-2 text-sm text-white bg-green-600 dark:bg-green-600 rounded">14%</span>
                <span>from 2020</span>
            </div>
        </a>

        <!-- Sessions chart card -->
        <a href="#"
        class="p-4 transition-shadow border border-slate-300 hover:border-slate-400 dark:border-slate-600 dark:hover:border-slate-400 rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                    <span class="text-gray-400">Packages</span>
                    <span class="text-lg font-semibold">{{ $totalPackages }}</span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                    <canvas id="sessionsChart"></canvas>
                </div>
            </div>
            <div>
                <span class="inline-block px-2 text-sm text-white bg-green-600 dark:bg-green-600 rounded">1.2%</span>
                <span>from 2020</span>
            </div>
        </a>

        <!-- Vists chart card -->
        <a href="#"
        class="p-4 transition-shadow border border-slate-300 hover:border-slate-400 dark:border-slate-600 dark:hover:border-slate-400 rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                    <span class="text-gray-400">Built Packages</span>
                    <span class="text-lg font-semibold">{{ $totalBuiltPackages }}</span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                    <canvas id="vistsChart"></canvas>
                </div>
            </div>
            <div>
                <span class="inline-block px-2 text-sm text-white bg-green-600 dark:bg-green-600 rounded">10%</span>
                <span>from 2020</span>
            </div>
        </a>

        <!-- Articles chart card -->
        <a href="#"
        class="p-4 transition-shadow border border-slate-300 hover:border-slate-400 dark:border-slate-600 dark:hover:border-slate-400 rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start">
                <div class="flex flex-col flex-shrink-0 space-y-2">
                    <span class="text-gray-400">Posts</span>
                    <span class="text-lg font-semibold">{{ $totalPosts }}</span>
                </div>
                <div class="relative min-w-0 ml-auto h-14">
                    <canvas id="articlesChart"></canvas>
                </div>
            </div>
            <div>
                <span class="inline-block px-2 text-sm text-white bg-green-600 dark:bg-green-600 rounded">30%</span>
                <span>from 2020</span>
            </div>
        </a>
    </div>

    <!-- Two columns grid -->
    <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-2 xl:grid-cols-4">
        <!-- Import data card -->
        <div class="border border-slate-300 dark:border-slate-600 rounded-lg shadow-sm">
            <!-- Card header -->
            <div class="flex items-center justify-between px-4 py-2 border-b border-slate-300 dark:border-slate-600">
                <h5 class="font-semibold">Import Data</h5>
                <!-- Dots button -->
                <button class="p-2 rounded-full">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
            <p class="px-4 py-6 text-gray-600">See and talk to your users and import them into your
                platform.</p>
            <ul class="px-4 pb-4 space-y-4 divide-y divide-slate-300 dark:divide-slate-600">
                <h5 class="font-semibold">Import Users from:</h5>
                <li class="flex items-start justify-between pt-4">
                    <div class="flex items-start space-x-3">
                        <!-- Twitter icon -->
                        <span class="flex items-center pt-1">
                            <svg fill="currentColor" class="w-5 h-5 text-blue-500">
                                <path
                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </span>
                        <div>
                            <h5 class="font-semibold">Twitter</h5>
                            <span class="text-sm font-medium text-gray-400">Users</span>
                        </div>
                    </div>
                    <a href="#"
                        class="flex items-center px-2 py-1 space-x-2 text-sm text-white bg-blue-600 rounded-md">
                        <span>Launch</span>
                        <span class="">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="flex items-start justify-between pt-4">
                    <div class="flex items-start space-x-3">
                        <!-- Github icon -->
                        <span class="flex items-center pt-1">
                            <svg width="24" height="24" fill="currentColor" class="text-black">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.606 9.606 0 0112 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48C19.137 20.107 22 16.373 22 11.969 22 6.463 17.522 2 12 2z">
                                </path>
                            </svg>
                        </span>
                        <div>
                            <h5 class="font-semibold">Github</h5>
                            <span class="text-sm font-medium text-gray-400">Users</span>
                        </div>
                    </div>
                    <a href="#"
                        class="flex items-center px-2 py-1 space-x-2 text-sm text-white bg-blue-600 rounded-md">
                        <span>Launch</span>
                        <span class="">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="pt-4 text-sm font-medium text-gray-400">
                    <p>
                        Or you can
                        <a href="#"
                            class="font-normal text-blue-500 hover:underline whitespace-nowrap">sync data
                            to your dashboard</a>
                        to ensure data is always up to date.
                    </p>
                </li>
            </ul>
        </div>

        <!-- Monthly chart card -->
        <div class="border border-slate-300 dark:border-slate-600 rounded-lg shadow-sm xl:col-span-3">
            <!-- Card header -->
            <div class="flex items-center justify-between px-4 py-2 border border border-slate-300 dark:border-slate-600">
                <h5 class="font-semibold">Monthly Expenses</h5>
                <!-- Dots button -->
                <button class="p-2 rounded-full">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
            <!-- Card content -->
            <div class="flex items-center p-4 space-x-4">
                <span class="text-3xl font-medium">45%</span>
                <span class="flex items-center px-2 space-x-2 text-sm text-green-800 bg-green-100 rounded">
                    <span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span>39.2%</span>
                </span>
            </div>
            <!-- Chart -->
            <div class="relative min-w-0 p-4 h-80">
                <canvas id="updatingMonthlyChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
    <h3 class="mt-6 text-xl">Users</h3>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="min-w-full divide-y divide-slate-300 dark:divide-slate-600 dark:bg-gray-800 dark:text-white">
                        <thead>
                            <tr class="dark:bg-gray-700 ">
                                <th scope="col" class="px-6 py-3 text-left text-xs leading-4 font-bold uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs leading-4 font-bold uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs leading-4 font-bold uppercase tracking-wider">Role</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs leading-4 font-bold uppercase tracking-wider">Is Active</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs leading-4 font-bold uppercase tracking-wider">Online</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs leading-4 font-bold uppercase tracking-wider">Last seen</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs leading-4 font-bold uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-300 dark:divide-slate-600">
                            @if ($users->count())
                                @foreach ($users as $item)
                                    <tr class="transition-all hover:bg-gray-200 dark:hover:bg-gray-700 hover:shadow-lg">
                                        <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                            <a
                                                class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                target="_blank"
                                                href="#">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                            {{ $item->email }}
                                        </td>
                                        <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                            {{ ucfirst(optional($item->roles)->role) }}
                                        </td>
                                        <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                            @if($item->is_active == 1)
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                            @else
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-700 bg-yellow-100 rounded-full">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                            @if(Cache::has('user-is-online-' . $item->id))
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Online</span>
                                            @else
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-700 bg-yellow-100 rounded-full">Offline</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                            {{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}
                                        </td>

                                        <td class="px-6 py-2 text-right text-xs">
                                            <button>
                                                <button wire:click="updateShowModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    width="1.5em"
                                                    height="1.5em"
                                                    style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                    preserveAspectRatio="xMidYMid meet"
                                                    viewBox="0 0 576 512">
                                                    <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9z" fill="#2ecc71 "/>
                                                </svg>
                                            </button>
                                            <button class="px-2" wire:click="deleteShowModal({{ $item->id }})">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true"
                                                    role="img"
                                                    width="1.2em"
                                                    height="1.2em"
                                                    preserveAspectRatio="xMidYMid meet"
                                                    viewBox="0 0 64 64">
                                                    <path fill="#ec1c24" d="M50.592 2.291L32 20.884C25.803 14.689 19.604 8.488 13.406 2.291c-7.17-7.17-18.284 3.948-11.12 11.12c6.199 6.193 12.4 12.395 18.592 18.592A32589.37 32589.37 0 0 1 2.286 50.595c-7.164 7.168 3.951 18.283 11.12 11.12c6.197-6.199 12.396-12.399 18.593-18.594l18.592 18.594c7.17 7.168 18.287-3.951 11.12-11.12c-6.199-6.199-12.396-12.396-18.597-18.594c6.2-6.199 12.397-12.398 18.597-18.596c7.168-7.166-3.949-18.284-11.12-11.11"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-2 text-sm whitespace-no-wrap" colspan="4">No User exists</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

