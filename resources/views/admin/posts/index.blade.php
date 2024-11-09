
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Browse All Posts
        </h2>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4 text-right">
                        <a href="{{ route('admin.posts.create') }}">
                            <button class="bg-emerald-500 dark:bg-emerald-500">Write a New
                                Post</button>
                        </a>
                    </div>

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Success</span>
                            <div>
                                <span class="font-medium">Success!</span> {{ session('success') }}
                            </div>
                        </div>
                    @endif


                    {{-- Posts Table --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3" scope="col">
                                        Title
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Category
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Author
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Views
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Created
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        <span class="sr-only">View</span>
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr
                                        class="bg-white border-b hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                            scope="row">
                                            {{ $post->title }}
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $post->category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $post->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ number_format($post->views) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $post->created_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 space-x-4 text-right">
                                            <a class="font-medium text-teal-600 hover:underline dark:text-teal-500"
                                                href="{{ route('blog.show', $post) }}" target="_blank">View</a>

                                            <a class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                                href="{{ route('admin.posts.edit', $post) }}">Edit</a>

                                            <form class="inline-flex" action="{{ route('admin.posts.destroy', $post) }}"
                                                method="POST" onclick="return confirm('Are you sure, bro?')">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="font-medium text-red-600 hover:underline dark:text-red-500"
                                                    type="submit">Delete</button>
                                            </form>

                                        </td>
                                    </tr>

                                @empty
                                    <tr
                                        class="bg-white border-b hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                            scope="row">
                                            No posts available yet.
                                        </th>
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4">
                                        </td>
                                        <td class="px-6 py-4 space-x-4 text-right">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">{{ $posts->links() }}</div>

                </div>
            </div>
        </div>
    </div>
