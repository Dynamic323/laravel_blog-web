<h1>
    Welcome admin
</h1>
<center>
    <form action="/adimn/post" method="POST">
        @csrf
            <input type="text" name="title" placeholder="title">
            <br>
            @error('title')
            <span class="text-red-600 font-bold"> {{ $message }} </span>
        @enderror

            <input type="text" name="content" placeholder="content">
            @error('content')
            <span class="text-red-600 font-bold"> {{ $message }} </span>
        @enderror
            <button>Submit</button>
        </form>
</center>
