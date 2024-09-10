<x-layout>
    <div class="p-6 flex justify-center items-center flex-col bg-slate-300">
        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            {{ $post->title }}
        </h5>
        <p class="text-base font-normal text-gray-700 dark:text-gray-400 mb-6">
            {{ Str::limit($post->content, 100, ' ....Read more') }}
        </p>
        <div class="text-sm text-gray-500 dark:text-gray-400 mb-6">
            <span><strong>Created at:</strong> {{ $post->created_at->format('M d, Y') }}</span>
            <br>
            <span><strong>Updated at:</strong> {{ $post->updated_at->format('M d, Y') }}</span>
        </div>
        @session('success')
            <p>post edited successfully {{ session('success') }} </p>
        @endsession
        @if (Auth::user() && Auth::user()->role == 'admin')
            <div class="flex justify-between items-center gap-12">
                <!-- Edit Button -->
                <a href='/post/{{ $post->slug }}/edit'
                    class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200 ease-in-out">
                    Edit
                </a>

                <!-- Delete Form and Button -->
                <form action="/post/{{ $post->slug }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg shadow hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-200 ease-in-out mx-4">
                        Delet
                    </button>
                </form>
            </div>
        @endif

        <center class="py-5 text-3xl">
            see all comment
        </center>

        <section class=" dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                </div>
                <form class="mb-6" action="/comment/post/{{ $post->slug }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{{ $post->id }}}" name="post_id">
                    @error('post_id')
                    <span class="text-red-600 font-bold"> {{ $message }} </span>
                @enderror
                    <div
                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" name="content" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    @error('content')
                    <span class="text-red-600 font-bold"> {{ $message }} </span>
                @enderror
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>
                {{-- {{dd($post->comment)}} --}}
                 @foreach ($comments as $comment)
                 <article class="p-6 text-base bg-white rounded-lg mb-5 dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p
                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">


                                <img class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">{{$comment->user->name}}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $comment->created_at->format('M d, Y') }}</time></p>
                        </div>
                      <!-- Repeatable Button -->
<button class="dropdown-button inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600 "
type="button">
<svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
    <path
        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
</svg>
<span class="sr-only">Comment settings</span>
</button>

<!-- Repeatable Dropdown Menu -->
<div class="dropdown hidden  w-20 md:w-36 bg-white rounded divide-y shadow-lg  dark:bg-gray-700 dark:divide-gray-600 absolute right-[12%]" >
<ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
    <li>
        <a href="#"
            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
    </li>
    <li>

        <a href=""
            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
    </li>
    <li>
        <a href="#"
            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
    </li>
</ul>
</div>

                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">{{$comment['content']}}</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>


                 @endforeach
                 {{ $comments->links() }}
                 <script>
                  // Select all buttons with the class 'dropdown-button'
const dropdownButtons = document.querySelectorAll('.dropdown-button');

// Loop through each button and add event listener
dropdownButtons.forEach((button, index) => {
    button.addEventListener('click', function () {
        // Find the next sibling element, which is the dropdown menu
        const dropdown = button.nextElementSibling;
        dropdown.classList.toggle('hidden');

        // Optional: Close other dropdowns when one is opened
        dropdownButtons.forEach((btn, idx) => {
            if (idx !== index) {
                const otherDropdown = btn.nextElementSibling;
                otherDropdown.classList.add('hidden');
            }
        });
    });
});

// Optional: Close the dropdown if the user clicks outside of it
window.addEventListener('click', function (e) {
    dropdownButtons.forEach(button => {
        const dropdown = button.nextElementSibling;
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
});

                </script>
            </div>
        </section>
    </div>
</x-layout>
