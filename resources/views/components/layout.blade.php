<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>OTB-SUCA</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

</head>

<body style="font-family: Open Sans, sans-serif">
        <nav class="md:flex lg:fixed top-0 md:justify-between md:items-center">
            <a href="/">
                  <x-application-logo class="w-150 h-auto fill-current " id="1"/>
            </a>
            <div class="flex items-center">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-3 px-3 py-4 sm:block ">
                    @auth
                      <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500">Dashboard <i class="nav-link fa fa-home"></i></a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                    @endauth
                </div>
                @endif
            </div>
        </nav>
        <section class="px-4 py-4">

        {{$slot}}
    </section>
</body>
