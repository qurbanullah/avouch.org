<div class="mx-auto py-4 sm:px-4 lg:px-4rounded-md">
    <div class="container mx-auto px-4 sm:px-4">
        <div class="py-2 ">
            <div>
                <h1 class="text-2xl font-semibold leading-tight">Package Groups</h1>
            </div>
            {{-- The data table --}}
            <div class="flex flex-col my-4 bg-gray-100 dark:bg-gray-800 dark:text-white">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border border-solid border-slate-300 dark:border-slate-600 shadow rounded-lg">

                            <table class="min-w-full divide-y divide-slate-300 dark:divide-slate-600 dark:bg-gray-800 dark:text-white">
                                <thead>
                                    <tr class="dark:bg-gray-700">
                                        <th class="px-6 py-2 text-left text-xs leading-4 font-medium uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-2 text-left text-xs leading-4 font-medium uppercase tracking-wider">Description</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-300 dark:divide-slate-600">
                                    @if ($data->count())
                                        @foreach ($data as $item)
                                        @section('title', config('app.name') . ' Linux group - ' . $item->slug)
                                        <tr>
                                            <td class="px-6 py-2 text-sm whitespace-no-wrap">
                                                <a
                                                class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                    href="{{ route('packages.packages-group-detail-component', $item->slug) }}">
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
            <br/>
            @if (!empty($data))
                {{ $data->links() }}
            @endif
        </div>
    </div>
</div>
