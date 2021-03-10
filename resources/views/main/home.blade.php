<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Symona</title>

    </head>
    <body class="h-screen bg-gray-200">

        <div class="wrapper ">
            <!--<nav class="font-mono  text-white bg-primary">
                <ul class="navbar py-2">
                    <li class="inline px-7">
                        <a href=# class="inline-block transform hover:scale-110 motion-reduce:transform-none">НСИ</a>
                    </li>
                    <li class="inline px-7 "><a href="#" class="inline-block transform hover:scale-110 motion-reduce:transform-none">Диагностика</a></li>
                </ul>
            </nav>-->
            <aside class="text-white bg-primary shadow-2xl w-1/6 h-screen ">
                <div>Logo</div>
                <div>
                    <nav class="px-6 py-4">
                        <ul>
                            <li class="py-2"><a href="#1">Link_1</a></li>
                            <li class="py-2"><a href="#2">Link_2</a></li>
                            <li class="py-2"><a href="#3">Link_3</a></li>
                            <li class="py-2"><a href="#4">Link_4</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="main-wrapper flex w-5/6">
            </div>
        </div>
    </body>
</html>
