<nav class="flex flex-col w-full justify-center items-center gap-9  lg:py-14  ">
    <a href="/"> <img
            src="https://websitedemos.net/wanderlust-travel-diary-04/wp-content/uploads/sites/154/2018/01/logo-white-free-img-1-160x84.png"
            alt="WANDERLUST"></a>
    <ul class="flex font-mono  text-slate-200 px-12 text-xl cursor-pointer w-1/2 justify-around items-center font-thin ">
        <li>African</li>
        <li>Asia</li>
        <li class="">Americans</li>
        <li>About us</li>
        <li>Contact</li>
        <li>se</li>

        @guest
            <a href="/login"
                class="{{ request()->is('/login') ? 'hidden' : 'visible' }} bg-slate-400 border p-2 rounded text-black border-slate-400">
                Login</a>


            <a href="/register"
                class=" {{ request()->is('/register') ? 'hidden' : 'visible' }} bg-slate-400 border p-2 rounded text-black border-slate-400">
                Register</a>
        @endguest

        @auth
            <form action="logout" method="POST">
                @csrf
                @method('DELETE')
                <button class="  bg-slate-400 border p-2 rounded text-black border-slate-400">

                    Logout
                </button>
            </form>
        @endauth

    </ul>
    @session('success')
        <span class=" text-green-500 font-bold text-3xl font-mono">{{ session('success') }}</span>
    @endsession
</nav>
