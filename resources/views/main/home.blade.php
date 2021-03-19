<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <div
          x-data="setup()"
          x-init="$refs.loading.classList.add('hidden');"
          @resize.window="watchScreen()"
        >
          <div class="flex h-screen antialiased text-white bg-gray-900">
            <!-- Loading screen -->
            <div
              x-ref="loading"
              class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-gray-900"
            >
              Loading.....
            </div>

            <!-- Sidebar -->
            <!-- Backdrop -->
            <div
                x-show="isSidebarOpen"
                @click="isSidebarOpen = false"
                class="fixed inset-0 z-10 bg-primary-darker lg:hidden"
                style="opacity: 0.5"
                aria-hidden="true"
                ></div>

            <!-- Sidebar content -->
            <aside
                x-show="isSidebarOpen"
                x-transition:enter="transition-all transform duration-300 ease-in-out"
                x-transition:enter-start="-translate-x-full opacity-0"
                x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transition-all transform duration-300 ease-in-out"
                x-transition:leave-start="translate-x-0 opacity-100"
                x-transition:leave-end="-translate-x-full opacity-0"
                x-ref="sidebar"
                @keydown.escape="window.innerWidth <= 1024 ? isSidebarOpen = false : ''"
                tabindex="-1"
              class="fixed inset-y-0 z-10 flex flex-shrink-0 overflow-visible bg-gray-800 shadow-2xl lg:static focus:outline-none"
            >
              <!-- Mini column -->
              <div class="flex flex-col flex-shrink-0 h-full px-2 py-4  dark:border-primary-darker">
                <!-- Brand -->
                <div class="flex-shrink-0 w-full">
                  <a
                    href="#"
                    class="inline-block text-xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
                  >
                  <img src="images/fox-logo-1.png" class="w-10 h-14 mx-auto" alt="Login"/>
                  </a>
                </div>
                <div class="flex flex-col items-center justify-center flex-1 space-y-4">
                  <!-- Notification button -->
                  <!--<button
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                  >
                    <span class="sr-only">Open Notification panel</span>
                    <svg
                      class="w-7 h-7"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                      />
                    </svg>
                  </button> -->

                  <!-- Search button -->
                 <!-- <button
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                  >
                    <span class="sr-only">Open search panel</span>
                    <svg
                      class="w-7 h-7"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </button> -->

                  <!-- Settings button -->
                  <!--<button
                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                  >
                    <span class="sr-only">Open settings panel</span>
                    <svg
                      class="w-7 h-7"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                    </svg>
                  </button>-->
                </div>
                <!-- Mini column footer -->
                <div class="relative flex items-center justify-center flex-shrink-0">
                  <!-- User avatar button -->
                  <div class="relative" x-data="{ open: false }">
                    <button
                      @click="open = !open; $nextTick(() => { $refs.userMenu.focus() })"
                      type="button"
                      aria-haspopup="true"
                      :aria-expanded="open ? 'true' : 'false'"
                      class="block transition-opacity duration-200 rounded-full focus:outline-none focus:ring "
                    >
                      <span class="sr-only">User menu</span>
                      <img class="w-10 h-10 rounded-full" src="images/avatar.png" alt="Avatar" />
                    </button>

                    <!-- User dropdown menu -->
                    <div
                    x-show="open"
                    x-ref="userMenu"
                    x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0"
                    @click.away="open = false"
                    @keydown.escape="open = false"
                    class="absolute w-48 py-1 mb-4 bg-gray-800 text-white rounded-sm shadow-lg min-w-max left-5 bottom-full ring-1 ring-black ring-opacity-5 focus:outline-none"
                    tabindex="-1"
                    role="menu"
                    aria-orientation="vertical"
                    aria-label="User menu"
                    >
                    <!--  <a
                        href="#"
                        role="menuitem"
                        class="block px-4 py-2 text-sm text-white transition-colors hover:bg-gray-700"
                      >
                      <span class="inline-flex justify-center items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                      </span>
                      <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                      </a>
                      <a
                        href="#"
                        role="menuitem"
                        class="block px-4 py-2 text-sm text-white transition-colors hover:bg-gray-700"
                      >
                      <span class="inline-flex justify-center items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                      </span>
                      <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                      </a>-->
                      <a
                        href="{{ route('logout') }}"
                        role="menuitem"
                        class="block px-4 py-2 text-sm text-white transition-colors hover:bg-gray-700 cursor-pointer"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                      >
                      <span class="inline-flex justify-center items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                      </span>
                      <span class="ml-2 text-sm tracking-wide truncate my-auto">Logout</span>
                    </a>
                    <form id="logout-form" method="POST" action="{{route('logout')}}" class="hidden">
                        @csrf
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </aside>
            <!-- Sidebar button -->
        <!--<div class="fixed flex items-center space-x-4 top-5 right-10 lg:hidden">
            <button
              @click="isSidebarOpen = true; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
              class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:ring"
            >
              <span class="sr-only">Toggle main manu</span>
              <span aria-hidden="true">
                <svg
                  x-show="!isSidebarOpen"
                  class="w-8 h-8"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg
                  x-show="isSidebarOpen"
                  class="w-8 h-8"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </span>
            </button>
          </div>-->
            <!-- Main content -->
            <main class="flex-1">
              <div class="flex flex-col items-center justify-center flex-1 h-full min-h-screen p-4 overflow-x-hidden overflow-y-auto">
                <h1 class="mb-4 text-2xl font-semibold text-center md:text-3xl">Main Grid</h1>
              </div>
            </main>
          </div>
        </div>

        <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
        <script>
          const setup = () => {
            const getTheme = () => {
              if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
              }
              return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
              window.localStorage.setItem('dark', value)
            }

            const getColor = () => {
              if (window.localStorage.getItem('color')) {
                return window.localStorage.getItem('color')
              }
              return 'cyan'
            }

            const setColors = (color) => {
              const root = document.documentElement
              root.style.setProperty('--color-primary', `var(--color-${color})`)
              root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
              root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
              root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
              root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
              root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
              root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
              this.selectedColor = color
              window.localStorage.setItem('color', color)
            }

            return {
              loading: true,
              color: getColor(),
              selectedColor: 'cyan',
              watchScreen() {
                if (window.innerWidth <= 1024) {
                this.isSidebarOpen = false
                } else if (window.innerWidth >= 1024) {
                this.isSidebarOpen = true
                }
            },
            isSidebarOpen: window.innerWidth >= 1024 ? true : false,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            }
          }
        </script>
      </body>
</html>
