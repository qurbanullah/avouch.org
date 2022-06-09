{{-- <x-slot name="header">
    <h1 class="font-semibold text-2xl bg-white dark:bg-gray-900 text-gray-800 dark:text-white leading-tight">
        {{ __('Latest Posts') }}
    </h1>
</x-slot> --}}
<div class="relative rounded-md bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
    @section('title', 'Avouch Magazine - Latest blogs, posts and release information')
    <div class="max-w-screen-2xl mx-auto w-full px-4">
        <div class="flex justify-end pt-4 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 ">
            @livewire('posts.post-search-component')
        </div>
        <div class="bg-gray-200 dark:bg-gray-800 overflow-hidden shadow-xl">
            @if (!$data->count())
                There is no post till now. Login and write a new post now!
            @else
                <div class="px-4 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 divide-y divide-slate-400 dark:divide-slate-600">
                    @foreach ($data as $item)
                        <div class="pb-2">
                            <div class="pt-4">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 text-2xl">
                                    <div class="sm:h-64">
                                        @if (!empty($item->post_banner_image))
                                            <a target="_blank" href="{{ route('posts.post-detail-component', $item->slug) }}">
                                                <img class="p-2 sm:p-4 object-cover object-center" src="{{ env('APP_URL') . '/posts-images/' . $item->post_banner_image }}" alt="Banner Photo">
                                            </a>
                                        @else
                                            <a target="_blank" href="{{ route('posts.post-detail-component', $item->slug) }}">
                                                <img class="p-2 sm:p-4 object-cover object-center" src="{{ asset('images/carpanter.jpg') }}" alt="Banner Photo">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="sm:col-span-2">
                                        <div>
                                            <h3 class="p-2 sm:p-4">
                                                <a target="_blank" href="{{ route('posts.post-detail-component', $item->slug) }}" class="text-blue-500 dark:text-yellow-500 hover:text-blue-300 dark:hover:text-yellow-300">{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                        <div class="p-2 sm:p-4 text-base">
                                            <p>{{ $item->introduction }}</p>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="pl-8 pr-8 bg-gray-400 dark:bg-gray-400 text-gray-50 dark:text-gray-50">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
