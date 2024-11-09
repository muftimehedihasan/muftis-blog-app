

        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit Category: {{ $category->name }}
        </h2>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Create a New Category Form --}}
                    <form class="space-y-6" method="post" action="{{ route('admin.categories.update', $category) }}">
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input class="mt-1 block w-full" id="name" name="name" type="text"
                                :value="old('name', $category->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <button>Edit</button>

                        @csrf
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>

