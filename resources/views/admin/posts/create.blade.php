
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Write a New Post
    </h2>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                {{-- Write a New Post Form --}}
                <form class="space-y-6" method="post" action="{{ route('admin.posts.store') }}" novalidate>
                    {{-- Title --}}
                    {{-- <div>
                        <x-input-label for="title" value="Title" />
                        <x-text-input class="block w-full mt-1" id="title" name="title" type="text"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div> --}}

                    {{-- Body --}}
                    <div>
                        <input for="body" value="Body" />
                        <textarea
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                            id="body" name="body" rows="4" placeholder="Write your thoughts here..." required autocomplete="body">{{ old('body') }}</textarea>


                        <input class="mt-2" :messages="$errors->get('body')" />
                    </div>

                    {{-- Category --}}
                    <div>
                        <input for="categories" value="Category" />

                        <select
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                            id="categories" name="category_id" required>
                            <option selected>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input class="mt-2" :messages="$errors->get('category_id')" />
                    </div>

                    <button>Create</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
