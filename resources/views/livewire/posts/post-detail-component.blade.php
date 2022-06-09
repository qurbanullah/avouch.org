<x-slot name="header">
    <div class="max-w-screen-2xl mx-auto w-full px-4">
        <h3 class="text-base font-semibold">Post detail</h3>
        {{-- @livewire('left-side-nevigation') --}}
    </div>
</x-slot>
<div class="dark:bg-gray-900">
    <div class="max-w-screen-2xl mx-auto w-full px-4 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
        <div class="sm:flex flex-nowrap sm:gape-2 shadow-xl sm:rounded-lg">
            <div class="hidden sm:w-1/5 sm:inline bg-gray-300 dark:bg-gray-800">
                <div class="p-2">
                    <h3 class="p-2 text-base font-semibold">You might be looking for</h3>
                    {{-- @if (!empty($relatedProfessionals))
                        @foreach ($relatedProfessionals as $relatedProfessional)
                        <div class="pb-2 pt-2 border-b hover:bg-gray-500">
                            <a class="" href="{{ route('users.professional', $relatedProfessional->user->id) }}">
                                <div class="text-center">
                                    <img class="object-contain h-32 w-full" src="{{ $relatedProfessional->user->profile_photo_url }}">
                                    <p class="font-semibold">{{ $relatedProfessional->user->name }}</p>
                                    <p class="">{{ $relatedProfessional->subCategory->sub_category }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @endif --}}
                </div>
            </div>
            <div class="w-full sm:w-3/5 max-w-3xl mx-auto p-2 sm:px-10">
                <div>
                    @if($post)
                        {{-- page title --}}
                        @section('title', config('app.name') . ' Magazine - ' . $post->title)
                        <div class="mt-2">
                            <div id="title" class="p-4 text-3xl">
                                <h1>
                                    {{ $post->title }}
                                </h1>
                            </div>
                            {{-- @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->isAdmin()))
                                <x-jet-button class="dark:bg-blue-700 text-white dark:text-yellow-400" style="float: right"><a href="{{ url('post/edit/'.$post->slug) }}">Edit Post</a></x-jet-button>
                            @endif --}}

                            <div id="author" class="pl-4">
                                <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="#">{{ $post->author->name }}</a></p>
                            </div>
                            <div id="post_banner_photo">
                                @if (!empty($post->post_banner_image))
                                    <img class="p-4 object-cover object-center h-96 w-full" src="{{ env('APP_URL') . '/posts-images/' . $post->post_banner_image }}" alt="Banner Photo">
                                @endif
                            </div>

                            <div id="content" class="post-contents">
                                <div class="p-4 text-base border-b border-gray-300">
                                    {!! $post->content !!}
                                </div>
                                <div class="p-4">
                                    <h2 class="dark:text-green-200 text-xl">Post comments</h2>
                                </div>
                                <div class="pl-4 pr-4">
                                    @if($post->comments)
                                        @foreach($post->comments as $comment)
                                            <div class="panel-body">
                                                <div class="list-group border dark:border-indigo-400 border-indigo-200">
                                                    <div class="p-2 bg-indigo-200 dark:bg-indigo-400">
                                                        <div class="inline">
                                                            {{ $comment->author->name}} commented on
                                                        </div>
                                                        <div class="inline">
                                                            {{ $comment->created_at->format('M d,Y \a\t h:i a') }}
                                                        </div>
                                                    </div>
                                                    <div class="p-2 list-group-item">
                                                        {!! $comment->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div id="do_comments" class="p-4 list-group-item">
                                        <p>Be the first to comment.</p>
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    @if(Auth::guest())
                                        <div class="p-4">
                                            <p><a href="{{ route('login') }}" class="text-gray-800 dark:text-yellow-500 underline">Login</a> to comment</p>
                                        </div>
                                    @else
                                        <div id="comments" class="pl-4">
                                            <div class="mt-4">
                                                <x-jet-label for="content" value="{{ __('Leave a comment') }}" class="text-lg dark:text-green-200" />
                                                <div class="rounded-md shadow-sm">
                                                    <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                                                        <div class="body-content" wire:ignore>
                                                            <trix-editor
                                                                name="commentContent"
                                                                class="trix-content trix-past"
                                                                x-ref="trix"
                                                                wire:model.debounce.800ms="commentContent"
                                                                wire:key="trix-content-unique-key"
                                                                trix-attachment-add="$event.attachment"
                                                                style="height: 100px !important; max-height: 100px !important;"
                                                            ></trix-editor>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('content') <span class="error text-red-500">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="pt-8">
                                                <div class="inline">
                                                    <x-jet-button class="dark:bg-green-500 dark:text-white" wire:click="store" wire:loading.attr="disabled">
                                                        {{ __('Post') }}
                                                    </x-jet-danger-button>
                                                </div>
                                                <div class="ml-12 inline text-green-500">
                                                    @if (session()->has('message'))
                                                        {{ session('message') }}
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        404 error
                    @endif
                </div>
            </div>
            <div class="w-1/5 hidden lg:inline bg-gray-300 dark:bg-gray-800">
                <div class="p-2">
                    <h3 class="p-2 text-base font-semibold">You might be interested in </h3>
                    {{-- @if (!empty($relatedProfessions))
                        @foreach ($relatedProfessions as $relatedProfession)
                        <div class="p-2">
                            <a class="text-blue-400 dark:text-blue-200 hover:text-yellow-500 dark:hover:text-yellow-300" href="{{ route('posts.post-show', $relatedProfession->slug) }}">
                                {{ $relatedProfession->sub_category }}
                            </a>
                        </div>
                        @endforeach
                    @endif --}}
                </div>

            </div>
        </div>
    </div>
</div>
