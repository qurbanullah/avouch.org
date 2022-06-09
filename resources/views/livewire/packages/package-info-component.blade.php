<x-slot name="header">
    <div class="max-w-screen-2xl mx-auto w-full px-4 bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
        <h1 class="text-base font-semibold">Package Info</h1>
    </div>
</x-slot>
<div class="bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
    <div class="max-w-screen-2xl mx-auto w-full px-4">
        <div class="py-2">
            {{-- The data table --}}
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="align-middle inline-block min-w-full">
                        <div class="overflow-hidden border-b border-solid border-slate-200 border-slate-600 shadow rounded-lg">
                            <table class="min-w-full divide-y divide-slate-400 dark:divide-slate-600 bg-gray-300 dark:bg-gray-700 dark:text-white">
                                <thead>
                                    <tr class="bg-gray-300 dark:bg-gray-700">
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Version</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Distribution</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Maintainer</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Updated On</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-200 dark:bg-gray-800">
                                    @if ($data->count())
                                        @foreach ($data as $item)
                                        <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <a
                                                class="text-blue-700 hover:text-blue-500 dark:text-blue-300 dark:hover:text-blue-400"
                                                    href="{{ route('packages.package-detail-component', Crypt::encrypt($item->id)) }}">
                                                    {{ $item->name . '-' . $item->version . '-' . $item->release . '-' . $item->distribution . '-' . $item->architecture }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->version . "-" . $item->release }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->distribution }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->maintainers }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->date_created }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            @if (!empty($query))
                {{ $searchedData->links() }}
            @endif
            @if (!empty($packagesAlphnumerical))
                {{ $packagesAlphnumerical->links() }}
            @endif
        </div>
    </div>
</div>
