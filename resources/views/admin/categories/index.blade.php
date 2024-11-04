@section('title', 'Browse all categories')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse all categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Create Category Button --}}

                    <div class="mb-4 text-right">
                        <a href="{{ route('admin.categories.create') }}" >

                        <x-primary-button> Create Category </x-primary-button>
                        </a>
                    </div>

                    {{-- Categories Table --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
                <th scope="col" class="px-6 py-3">
                    Posts
                </th>
                <th scope="col" class="px-6 py-3">
                    Created
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
            </tr>
        </thead>
        <tbody>

        @foreach ($categories as $category)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $category->name }}
            </th>
            <td class="px-6 py-4">
                {{ $category->slug }}
            </td>
            <td class="px-6 py-4">
                {{ $category->posts->count() }}
            </td>
            <td class="px-6 py-4">
                {{ $category->created_at->diffForHumans() }}
            </td>
            <td class="px-6 space-x-4 py-4 text-right">
                <a href="{{ route('admin.categories.edit', $category) }}" class="font-medium  text-blue-600 dark:text-blue-500 hover:underline ">Edit</a>
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
            </td>
        </tr>

        {{-- @empty --}}

        @endforeach


        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
