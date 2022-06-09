<x-slot name="header">
    <div class="container mx-auto">
        <h1 class="text-base font-semibold">Group Detail</h1>
    </div>
</x-slot>
<div class="container mx-auto m-2 dark:bg-gray-900 shadow-xl">
    <div class="w-full mx-auto bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
        <div class="w-full sm:flex flex-nowrap sm:gape-2 shadow-xl sm:rounded-lg">
            <div class="w-full">
                <div class="p-4 border">
                    {{-- Package info --}}
                    <div class="w-full sm:flex">
                        <div class="w-full">
                            <div class="w-full sm:grid sm:grid-cols-3 pb-1 border-b">
                                <div>
                                    {{-- page title --}}
                                        @section('title', config('app.name') . ' Linux group - ' . $group->slug)
                                    <h2 class="text-xl font-semibold">
                                        <a
                                            href="{{ route('packages.packages-groups') }}"
                                            class="hover:underline"
                                        >
                                            groups
                                        </a>
                                        <span>/</span>
                                        {{ $this->groupSlug }}
                                    </h2>
                                </div>
                                <div>
                                    {{-- <div class="">{{ $this->description }}</div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-700 dark:text-white">
                        <thead>
                            <tr class="dark:bg-gray-800">
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Description</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-2 text-sm whitespace-no-wrap">
                                        <a
                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                            href="{{ route('packages.package-info-component', $item->name) }}">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-2 text-sm whitespace-no-wrap">
                                        {{ $item->short_description }}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-2 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
