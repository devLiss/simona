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

    <body >
        <div
        class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-logo-background bg-cover"
      >
        <main>
          <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-gray-900 bg-opacity-50 rounded-md">
            <div class="w-full"><img src="images/fox-logo-1.png" class="w-16 h-24 mx-auto" alt="Login"/></div>
            <h1 class="text-xl font-semibold text-center text-white">Welcome</h1>
            <form action="#" class="space-y-6">
              <input
                class="w-full px-4 py-2 border border-red-900 rounded-md bg-gray-900 bg-opacity-50 focus:outline-none focus:ring focus:ring-red-500"
                type="email"
                name="email"
                placeholder="Email address"
                required
              />
              <input
                class="w-full px-4 py-2 border border-red-900 rounded-md bg-gray-900 bg-opacity-50 focus:outline-none focus:ring focus:ring-red-500"
                type="password"
                name="password"
                placeholder="Password"
                required
              />
              <div class="flex items-center justify-between">
                <!-- Remember me toggle -->
                <!--<label class="flex items-center">
                  <div class="relative inline-flex items-center">
                    <input
                      type="checkbox"
                      name="remembr_me"
                      class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                    />
                    <span
                      class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                    ></span>
                  </div>
                  <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">Remember me</span>
                </label>-->
              </div>
              <div>
                <button
                  type="submit"
                  class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-red-900 hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                >
                  Login
                </button>
              </div>
            </form>
          </div>
        </main>
      </div>
        <!--<div class=" bg-gray-900 bg-opacity-50 px-5 mx-auto rounded-b-lg rounded-t-lg shadow-md max-w-sm absolute inset-96">
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
        </div>-->
    </body>
</html>
