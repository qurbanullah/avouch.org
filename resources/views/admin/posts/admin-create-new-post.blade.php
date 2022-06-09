<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            {{-- <h1 class="text-base font-semibold">Dashboard</h1> --}}
            {{-- @livewire('left-side-nevigation') --}}
        </div>
    </x-slot>
    <div class="flex overflow-y-hidden bg-gray-50 dark:bg-gray-800" x-data="setup()"
        x-init="$refs.loading.classList.add('hidden')">
        <!-- Loading screen -->
        {{-- to be implemented --}}

        <!-- Sidebar backdrop -->
        <div x-show.in.out.opacity="isSidebarOpen"
            class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        </div>

        <!-- Sidebar -->
        <div>
            @livewire('admin.admin-left-navigation-bar-component')
        </div>
        <!-- Main Content -->
        <div class="flex flex-col flex-1 h-full overflow-hidden">
            <div class="md:hidden items-center space-x-3 p-2">
                <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none ring-1 focus:ring">
                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-300"
                        :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg"
                        width="1.5em" height="1.5em" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            @livewire('admin.posts.admin-create-new-post-component')
        </div>

        <!-- Setting panel button -->
        {{-- to be implemented --}}
        <!-- Settings panel -->
        {{-- to be implemented --}}

    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/script.js"></script> --}}
    <script>
        const setup = () => {
            return {
                loading: true,
                isSidebarOpen: false,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                isSearchBoxOpen: false,
            }
        }
    </script>
</x-app-layout>
