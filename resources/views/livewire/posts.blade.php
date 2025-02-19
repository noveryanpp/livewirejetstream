<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Posts') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-1/2">
                    <form class="flex items-center">
                        <div class="relative w-full">
                            <input type="text" id="simple-search" wire:model.live="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search" required="">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 absolute bottom-2.5 left-5"></i>
                        </div>
                    </form>
                </div>
                <div class="w-1/2 flex flex-row space-y-0 items-center justify-end space-x-3 flex-shrink-0">
                    <button wire:click="create()" type="button" id="createPostButton"
                        class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <i class="fa-solid fa-plus w-4 h-4 mr-1"></i>
                        Add product
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="w-4 px-4 py-3">Index</th>
                            <th scope="col" class="px-4 py-3">Title</th>
                            <th scope="col" class="px-4 py-3">Content</th>
                            <th scope="col" class="px-1 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $index }}</td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $post->title }}</th>
                                <td class="px-4 py-3">{{ $post->content }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="{{ $post->title . $post->index . '-button' }}"
                                        data-dropdown-toggle="{{ $post->title . $post->index }}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <i class="fa-solid fa-ellipsis w-3.5 h-3.5"></i>
                                    </button>
                                    <div id="{{ $post->title . $post->index }}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $post->title . $post->index . '-button' }}">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                            </li>
                                            <li>
                                                <a href="#" wire:click="edit({{ $post->id }})"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" wire:click="delete({{ $post->id }})"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 flex justify-end gap-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    @if ($isOpen)
        @include('livewire.create-post')
    @endif
</div>
