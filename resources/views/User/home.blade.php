<x-layout>
    <x-views.Components.hero />

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts as $post)
              <a href="/post/{{$post->slug}}">
                <div
                class="bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                {{-- Uncomment and customize the image source if you have images --}}
                {{--
                <img class="object-cover rounded-t-lg h-48 w-full"
                    src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="{{ $post->title }}">
                --}}

                <div class="p-6 overflow-auto">
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

                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <div class="flex justify-between items-center">
                            <!-- Edit Button -->
                            <a href="/post/{{$post->slug}}"
                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200 ease-in-out">
                                Edit
                            </a>

                            <!-- Delete Form and Button -->
                            <form action="#" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg shadow hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-200 ease-in-out">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                            <span>
                    Total comment  =  <b>{{$post->comments->count() }}  </b></span>
                </div>
            </div>
              </a>
            @endforeach
        </div>
    </div>
</x-layout>
