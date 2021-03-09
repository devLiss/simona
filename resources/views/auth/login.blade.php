<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Symona</title>

    </head>
    <body>
        <div class="mx-auto h-screen bg-gray-800 text-white">
            <div class="absolute mx-auto my-auto px-20 py-15 rounded shadow font-mono bg-gray-600 ">
                <div class="py-7">
                    <h3 class="">Sign In</h3>
                </div>
                <div>
                    <form>
                        <div>
                            <label class="">Email</label></br>
                            <input class="rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="email"/>
                        </div>
                        <div>
                            <label class="">Password</label></br>
                            <input class="rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="password"/>
                        </div>
                        <button class="bg-blue-600 rouded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">
                                Sign up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
