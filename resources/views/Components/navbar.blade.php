
<nav class="border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <img src="https://websitedemos.net/wanderlust-travel-diary-04/wp-content/uploads/sites/154/2018/01/logo-white-free-img-1-160x84.png" class="h-8" alt="Logo" />
            <span class="text-2xl font-semibold text-white ml-3">Wanderlust</span>
        </a>
        <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 text-gray-500 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:flex md:w-auto " id="navbar">
            <ul class="flex md:justify-center md:items-center flex-col md:flex-row md:space-x-8 mt-4 md:mt-0 rounded-lg">
                <li>
                    <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Services</a>
                </li>
                <li>
                    @guest
                        <a href="/login" class="bg-slate-400 border p-2 rounded text-black mr-2">Login</a>
                        <a href="/register" class="bg-slate-400 border p-2 rounded text-black">Register</a>
                    @endguest
                    @auth
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-slate-400 border p-2 rounded text-black">Logout</button>
                        </form>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const navbar = document.getElementById('navbar');

            menuToggle.addEventListener('click', function () {
                navbar.classList.toggle('hidden');
            });
        });
    </script>
</nav>

@session('success')
    <span class="text-green-500 font-bold text-3xl font-mono">{{ session('success') }}</span>
@endsession

