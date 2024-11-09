@extends('layouts.blog')

@section('title', $post->title)

@section('main_content')
    <!-- Main Content -->
    <main class="mx-auto w-full max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <a class="mb-6 inline-flex items-center justify-center gap-2 rounded-full px-3 py-1 text-lg font-medium text-zinc-400 ring-1 ring-inset ring-white/10 transition hover:bg-white/5 hover:text-white"
           href="{{ route('blog.index') }}">
            <!-- SVG for Back Button -->
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M7.793 2.232a.75.75 0 0 1-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 0 1 0 10.75H10.75a.75.75 0 0 1 0-1.5h2.875a3.875 3.875 0 0 0 0-7.75H3.622l4.146 3.957a.75.75 0 0 1-1.036 1.085l-5.5-5.25a.75.75 0 0 1 0-1.085l5.5-5.25a.75.75 0 0 1 1.06.025Z"
                      clip-rule="evenodd"/>
            </svg>
            Back
        </a>

        <article class="ring-white/15 w-full space-y-6 rounded-xl bg-zinc-900/20 p-6 text-white shadow-lg ring-1 backdrop-blur-[2px] md:p-10">
            <h3 class="mb-4 text-center text-xl font-bold !leading-tight sm:text-4xl lg:text-6xl">
                {{ $post->title }}
            </h3>

            <!-- Meta Info -->
            <div class="my-6 flex flex-row flex-wrap items-center justify-center gap-4 divide-x divide-zinc-700 text-center">
                <!-- Author, Date, Category, Views -->
                <div class="flex items-center gap-2">
                    <img class="h-8 w-8 rounded-full p-0.5 ring-1 ring-emerald-500"
                         src="https://avatars.githubusercontent.com/u/61485238?v=4" alt="{{ $post->user->name }}"/>
                    <h4>{{ $post->user->name }}</h4>
                </div>
                <p class="pl-4 text-lg font-semibold text-zinc-400 sm:text-base">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <div class="pl-4">
                    <a class="inline-flex justify-center gap-0.5 overflow-hidden rounded-full bg-emerald-400/10 px-3 py-1 text-sm font-medium text-emerald-400 ring-1 ring-inset ring-emerald-400/20 transition hover:bg-emerald-400/10 hover:text-emerald-300 hover:ring-emerald-300 sm:text-base"
                       href="{{ route('blog.index', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                </div>
                <div class="px-4">
                    <div class="inline-flex items-center justify-center gap-1 overflow-hidden rounded-full bg-orange-400/10 px-3 py-1 text-sm font-medium text-orange-400 ring-1 ring-inset ring-orange-400/20 transition sm:text-base">
                        <span>
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                <path fill-rule="evenodd"
                                      d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span> {{ number_format($post->views) }} Views
                    </div>
                </div>
            </div>

            <hr class="my-8 h-px border-0 bg-zinc-700">

            <!-- Post Body -->
            <p class="text-base font-normal text-zinc-400 md:text-xl">
                {{ $post->body }}
            </p>


 <!-- Show Comments -->
 <p class="text-base font-normal text-zinc-400 md:text-xl">
    {{ $post->comments()->count() }} comments
</p>

        </article>
    </main>



                {{-- <!-- Comments Section -->
                <section class="comments mt-8">
                    <form>
                    <div id="comment-section" class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <!-- Login message for non-logged-in users -->
                        <div id="login-message" class="hidden px-4 py-2 text-sm text-gray-900 bg-red-100 border border-red-300 rounded-lg dark:bg-red-700 dark:border-red-600 dark:text-white">
                            Please login to post a comment.
                        </div>

                        <!-- Comment form (hidden by default for non-logged-in users) -->
                        <div id="comment-form" class="hidden px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required ></textarea>
                        </div>

                        <!-- Comment actions (post button, hidden by default for non-logged-in users) -->
                        <div id="comment-actions" class="hidden flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                            <button type="submit" id="post-comment" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Post comment
                            </button>
                        </div>
                    </div>

                    <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">Remember, contributions to this topic should follow our <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Community Guidelines</a>.</p>
                    </form>

                    <script>
                        // Example JavaScript to control the login status
                        var isLoggedIn = false; // Replace this with your actual login check logic

                        if (isLoggedIn) {
                            // If logged in, show only the comment form and hide login message
                            document.getElementById('comment-form').classList.remove('hidden');
                            document.getElementById('comment-actions').classList.remove('hidden');
                            document.getElementById('login-message').classList.add('hidden');
                        } else {
                            // If not logged in, show both the login message and the comment form
                            document.getElementById('login-message').classList.remove('hidden');
                            document.getElementById('comment-form').classList.remove('hidden');
                            document.getElementById('comment-actions').classList.remove('hidden');
                        }
                    </script>


                </section> --}}




                {{-- comments-section.blade.php --}}
<div class="max-w-4xl mx-auto mt-8">
    <div class="bg-white rounded-lg shadow-sm">
        @guest
            <div class="p-4 bg-blue-50 rounded-t-lg border-b border-blue-100">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-blue-800">Please login or sign up to post a comment</p>
                    <div class="space-x-2">
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Sign up
                        </a>
                    </div>
                </div>
            </div>
        @endguest

        <form action="{{ route('comments.store') }}" method="POST" class="p-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="mb-4">
                <label for="content" class="sr-only">Your comment</label>
                <textarea
                    id="content"
                    name="content"
                    rows="4"
                    class="block w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror"
                    placeholder="{{ Auth::check() ? 'Write a comment...' : 'Please login to comment' }}"
                    {{ !Auth::check() ? 'disabled' : '' }}
                    required
                >{{ old('content') }}</textarea>

                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    @guest disabled @endguest
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 {{ !Auth::check() ? 'opacity-50 cursor-not-allowed' : '' }}"
                >
                    Post comment
                </button>

                <p class="text-xs text-gray-500">
                    Remember, contributions to this topic should follow our
                    <a href="#" class="text-blue-600 hover:underline">Community Guidelines</a>.
                </p>
            </div>
        </form>

        @if(session('success'))
            <div class="p-4 bg-green-50 border-t border-green-100">
                <p class="text-sm text-green-800">{{ session('success') }}</p>
            </div>
        @endif
    </div>
</div>




        {{-- Show only approved comments for the post --}}
        @foreach($post->comments->where('is_approved', true) as $comment)
        <p class="text-base font-normal text-zinc-400 md:text-xl">
            {{ $comment->content }}
        </p>
        @endforeach



            </article>
        </div>
    </main>
@endsection
