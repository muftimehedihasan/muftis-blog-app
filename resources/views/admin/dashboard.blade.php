<!-- Dashboard Header -->
<div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Admin Dashboard</h1>
</div>

<!-- Navigation Links -->
<div class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-8 bg-gray-50 dark:bg-gray-900 p-4 rounded-lg shadow-lg">
    <a href="{{ route('admin.categories.index') }}"
       class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-500 hover:text-white dark:hover:bg-indigo-600 transition-colors duration-200
              {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-100 text-indigo-600 font-semibold dark:bg-indigo-700 dark:text-indigo-200' : '' }}">
        Browse Categories
    </a>

    <br> <br>
    <a href="{{ route('admin.posts.index') }}"
       class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-500 hover:text-white dark:hover:bg-indigo-600 transition-colors duration-200
              {{ request()->routeIs('admin.posts.index') ? 'bg-indigo-100 text-indigo-600 font-semibold dark:bg-indigo-700 dark:text-indigo-200' : '' }}">
        Posts
    </a>

    <br> <br>
    <a href="{{ route('admin.comments.index') }}"
    class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-indigo-500 hover:text-white dark:hover:bg-indigo-600 transition-colors duration-200
           {{ request()->routeIs('admin.comments.index') ? 'bg-indigo-100 text-indigo-600 font-semibold dark:bg-indigo-700 dark:text-indigo-200' : '' }}">
        Comments
    </a>


</div>
