<x-layout>




    <form method="POST" action="/post/{{ $post->slug }}" class="max-w-sm p-5 bg-slate-300 rounded mx-auto">
        @csrf
        @method('PATCH')

        <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your title</label>
            <input type="text" id="title" name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@flowbite.com" required value='{{ $post->title }}' />
            @error('title')
                <span class="text-red-600 font-bold"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                content</label>
            <input type="text" id="content" name="content"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                h-[40px] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required value='{{ $post->content }} ' />
                <input type="hidden" name="slug" value="{{$post->slug}}">
            {{-- <textarea name="" id="" cols="38%" class="p-5" rows="10" name="content">
                    {{ $post->content }}
                </textarea> --}}
            @error('content')
                <span class="text-red-600 font-bold"> {{ $message }} </span>
            @enderror
        </div>


        @session('error')
            <span class=" text-red-500 font-bold text-xl mb-4 font-mono">{{ session('error') }}</span>
        @endsession
        <div class="mb-5">
            <div class="flex items-center justify-end h-5">


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save
                        changes</button>

            </div>
        </div>
    </form>

</x-layout>
