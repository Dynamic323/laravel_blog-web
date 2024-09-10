<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<style>
    body {
        background: linear-gradient(109.6deg, rgb(36, 45, 57) 11.2%, rgb(16, 37, 60) 51.2%, rgb(0, 0, 0) 98.6%);
        display: flex;
        justify-content: center;
        height: 90vh;
        align-items: center;
        font-family: sans-serif
    }

    .cont {
        border: 1px solid #b7bdc8;
        height: 80%;
        width: 30%;
        box-shadow: 12px 12px 12px #b7bdc841, -12px -12px 12px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        color: #b7bdc8
    }

    form {
        display: flex;
        flex-direction: column;
        width: 90%
        ;height: 70%
    }

    input {
        height: 20%;

        background-color: transparent;
        border: 2px solid #b7bdc8;
        padding: 5px;
        color: #b7bdc8;
        width: 90%;

    }

    ::placeholder {
        font-size: 22px;
    }

    textarea {
        background-color: transparent;
        font-size: 22px;
        color: #b7bdc8;
        border: 2px solid #b7bdc8;
        padding: 5px;
        width: 90%
    }

    button {
        height: 15%;
        padding: 10px;
        margin-top: 12px;
        background-color: #b7bdc8;
        border: 1px solid black;
    }

    span {
        color: red;
        width: 90%;
        height: 20%;
        padding-top: 12px
    }

    @media (max-width:1100px) {
        .cont {
            width: 80%;
        }
    }
</style>

<body>

    <div class="cont">
        <h1> Welcome Admin!</h1>
        <form action="/adimn/post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="title">
            <span class="text-red-600 font-bold">
                @error('title')
                    {{ $message }}
                @enderror
            </span>

            <textarea name="content" id="" cols="30" rows="10">

                </textarea>
            <span class="text-red-600 font-bold">
                @error('content')
                    {{ $message }}
                @enderror
            </span>
            <button>Submit</button>
        </form>
    </div>

</body>

</html>x
