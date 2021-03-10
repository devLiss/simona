<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>

    <body class="m-auto min-h-screen bg-cover bg-logo-background relative">
        <div class=" bg-gray-900 bg-opacity-50 px-5 mx-auto rounded-b-lg rounded-t-lg shadow-md max-w-sm absolute inset-96">
            <div class="header py-4">
                <h3 class="text-center md:text-left text-white text-2xl font-mono">Sign in</h3>
            </div>
            <form>
                <div>
                        <label class="text-white font-mono"> Username</label> </br>
                        <input
                          type="email"
                          class="w-full rounded-full py-1 px-2 text-white shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          placeholder=" "
                        />
                </div>
                <div class="my-3">
                    <label class="text-white font-mono">Password</label></br>
                    <input
                    type="password"
                    class="w-full rounded-full py-1 px-2 text-white shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    placeholder=""
                  />
                </div>
                <div>
                    <input id="check" type="checkbox" class="rounded-md checked:bg-blue-400" checked>
					<label for="check" class="text-white font-mono"> Remember me</label>
                </div>
                <div class="py-5 ">
                  <input class="bg-red-400 text-white border-gray-900 w-full py-1 px-2 cursor-pointer  rounded-full" type="submit" value="Sign In"/>
                </div>
            </form>
        </div>
    </body>
</html>
