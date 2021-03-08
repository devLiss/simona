<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Symona</title>

    </head>
    <body>
        <div class="mx-auto h-screen bg-gray-700">
            <div class="container mx-auto px-5 py-5 bg-gray-500 rounded shadow">
                <div>
                    <h3></h3>
                </div>
                <div>
                    <form>
                        <div>
                            <label>Email</label>
                            <input type="email"/>
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password"/>
                        </div>

                        <div class="bg-red-400">
                            <label for="sbmt">Sign In</label>
                            <input id="sbmt" type="submit" placeholder=""/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
