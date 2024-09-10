<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="overflow-x-hidden">
    <section class="section bg-fixed bg-[url(../../public/home-banner-free-img.jpg)] ">
        <div class="overlay pb-12">
            <x-navbar />
            {{ $slot }}
        </div>
    </section>
    <x-footer />
</body>

</html>
