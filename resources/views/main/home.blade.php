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
        <div class="fixed flex items-center space-x-4 top-5 right-10 lg:hidden">
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
          </div>
            <!-- Main content -->
            <main class="flex-1">
              <div
              x-data="{ isOpen: true }"
              :class="{ 'flex-col': isOpen , 'flex-row': !isOpen}"
              class="flex flex-1 h-full min-h-screen p-4 space-x-4 overflow-x-hidden overflow-y-auto">
                <!--<h1 class="mb-4 text-2xl font-semibold text-center md:text-3xl">Main Grid</h1>-->
                  <div id="diagnostic" class="block w-full min-h-full  bg-gray-800 border border-gray-700 items-center justify-center">
                    <div class="flex flex-column space-x-2 items-center justify-center py-4">
                      <div class="w-56">
                        <div
                                x-data="select({ data: { a1: 'Agent_1', a2: 'Agent_2', a3: 'Agent_3', a4: 'Agent_4' }, emptyOptionsMessage: 'No agents.', name: 'agent', placeholder: 'Select an agent' })"
                                x-init="init()"
                                @click.away="closeListbox()"
                                @keydown.escape="closeListbox()"
                                class="relative"
                        >
                                <span class="inline-block w-full rounded-md shadow-sm">
                                      <button
                                              x-ref="button"
                                              @click="toggleListboxVisibility()"
                                              :aria-expanded="open"
                                              aria-haspopup="listbox"
                                              class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-gray-900 border border-gray-600 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
                                      >
                                            <span
                                                    x-show="! open"
                                                    x-text="value in options ? options[value] : placeholder"
                                                    :class="{ 'text-gray-500': ! (value in options) }"
                                                    class="block truncate"
                                            ></span>

                                            <input
                                                    x-ref="search"
                                                    x-show="open"
                                                    x-model="search"
                                                    @keydown.enter.stop.prevent="selectOption()"
                                                    @keydown.arrow-up.prevent="focusPreviousOption()"
                                                    @keydown.arrow-down.prevent="focusNextOption()"
                                                    type="search"
                                                    class="w-full h-full form-control focus:outline-none bg-gray-900"
                                            />

                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                      </button>
                                </span>

                            <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-1 bg-gray-900 border border-gray-600 rounded-md shadow-lg"
                            >
                                <ul
                                        x-ref="listbox"
                                        @keydown.enter.stop.prevent="selectOption()"
                                        @keydown.arrow-up.prevent="focusPreviousOption()"
                                        @keydown.arrow-down.prevent="focusNextOption()"
                                        role="listbox"
                                        :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5"
                                >
                                    <template x-for="(key, index) in Object.keys(options)" :key="index">
                                        <li
                                                :id="name + 'Option' + focusedOptionIndex"
                                                @click="selectOption()"
                                                @mouseenter="focusedOptionIndex = index"
                                                @mouseleave="focusedOptionIndex = null"
                                                role="option"
                                                :aria-selected="focusedOptionIndex === index"
                                                :class="{ 'text-white bg-indigo-600': index === focusedOptionIndex, 'text-white': index !== focusedOptionIndex }"
                                                class="relative py-2 pl-3 text-white cursor-default select-none pr-9 hover:bg-gray-800"
                                        >
                                                <span x-text="Object.values(options)[index]"
                                                      :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }"
                                                      class="block font-normal truncate"
                                                ></span>

                                            <span
                                                    x-show="key === value"
                                                    :class="{ 'text-white': index === focusedOptionIndex, 'text-indigo-600': index !== focusedOptionIndex }"
                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                            >
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </span>
                                        </li>
                                    </template>

                                    <div
                                            x-show="! Object.keys(options).length"
                                            x-text="emptyOptionsMessage"
                                            class="px-3 py-2 text-white cursor-default select-none"></div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-56">
                      <div
                              x-data="select({ data: { c1: 'ping', c2: 'telnet', c3: 'trace', c4: 'cat' }, emptyOptionsMessage: 'No commands', name: 'commands', placeholder: 'Select a command' })"
                              x-init="init()"
                              @click.away="closeListbox()"
                              @keydown.escape="closeListbox()"
                              class="relative"
                      >
                              <span class="inline-block w-full rounded-md shadow-sm">
                                    <button
                                            x-ref="button"
                                            @click="toggleListboxVisibility()"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-gray-900 border border-gray-600 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
                                    >
                                          <span
                                                  x-show="! open"
                                                  x-text="value in options ? options[value] : placeholder"
                                                  :class="{ 'text-gray-500': ! (value in options) }"
                                                  class="block truncate"
                                          ></span>

                                          <input
                                                  x-ref="search"
                                                  x-show="open"
                                                  x-model="search"
                                                  @keydown.enter.stop.prevent="selectOption()"
                                                  @keydown.arrow-up.prevent="focusPreviousOption()"
                                                  @keydown.arrow-down.prevent="focusNextOption()"
                                                  type="search"
                                                  class="w-full h-full form-control focus:outline-none bg-gray-900"
                                          />

                                          <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                              <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                  <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                              </svg>
                                          </span>
                                    </button>
                              </span>

                          <div
                                  x-show="open"
                                  x-transition:leave="transition ease-in duration-100"
                                  x-transition:leave-start="opacity-100"
                                  x-transition:leave-end="opacity-0"
                                  x-cloak
                                  class="absolute z-10 w-full mt-1 bg-gray-900 rounded-md shadow-lg"
                          >
                              <ul
                                      x-ref="listbox"
                                      @keydown.enter.stop.prevent="selectOption()"
                                      @keydown.arrow-up.prevent="focusPreviousOption()"
                                      @keydown.arrow-down.prevent="focusNextOption()"
                                      role="listbox"
                                      :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null"
                                      tabindex="-1"
                                      class="py-1 overflow-auto text-base leading-6 border border-gray-600 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5"
                              >
                                  <template x-for="(key, index) in Object.keys(options)" :key="index">
                                      <li
                                              :id="name + 'Option' + focusedOptionIndex"
                                              @click="selectOption()"
                                              @mouseenter="focusedOptionIndex = index"
                                              @mouseleave="focusedOptionIndex = null"
                                              role="option"
                                              :aria-selected="focusedOptionIndex === index"
                                              :class="{ 'text-white bg-indigo-600': index === focusedOptionIndex, 'text-white': index !== focusedOptionIndex }"
                                              class="relative py-2 pl-3 text-white cursor-default select-none pr-9 hover:bg-gray-800"
                                      >
                                              <span x-text="Object.values(options)[index]"
                                                    :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }"
                                                    class="block font-normal truncate"
                                              ></span>

                                          <span
                                                  x-show="key === value"
                                                  :class="{ 'text-white': index === focusedOptionIndex, 'text-indigo-600': index !== focusedOptionIndex }"
                                                  class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                          >
                                                  <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"/>
                                                  </svg>
                                              </span>
                                      </li>
                                  </template>

                                  <div
                                          x-show="! Object.keys(options).length"
                                          x-text="emptyOptionsMessage"
                                          class="px-3 py-2 text-white cursor-default select-none"></div>
                              </ul>
                          </div>
                      </div>
                  </div>

                  <input
                    type="text"
                    class="relative z-0 w-90 py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-gray-900 border border-gray-600 rounded-md cursor-auto focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
                    placeholder="Params"
                  />
                        <button class="rounded-md w-20 bg-red-500 hover:bg-opacity-70">
                            Ok
                        </button>

                        <button
                           @click="isOpen=!isOpen"
                            class="rounded-md w-20 bg-red-500 hover:bg-opacity-70">
                            History
                        </button>
                    </div>
                    <div id="output" class="w-9/12 h-4/6 mx-auto bg-gray-900 border border-gray-700 shadow-lg rounded-md space-y-5 items-center">
                      <textarea autofocus class='console-input' placeholder="Type command..."></textarea>
                    </div>
                  </div>
                  <div id="history"
                  :class="{ 'hidden': isOpen}"
                  class="block w-2/5 min-h-full bg-gray-800 border border-gray-700">
                      <section class="shadow">
                        <article class="border-b">
                            <div class="border-l-2 border-transparent">
                                <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                                    <span class="text-grey-darkest font-thin text-xl">
                                        Massa vitae tortor condimentum lacinia quis vel eros donec
                                    </span>
                                    <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center">
                                        <!-- icon by feathericons.com -->
                                        <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                            <polyline points="6 9 12 15 18 9"> </polyline>
                                        </svg>
                                    </div>
                                </header>
                            </div>
                        </article>
                        <article class="border-b">
                            <div class="border-l-2 ">
                                <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                                    <span class="text-indigo font-thin text-xl">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <div class="rounded-full border w-7 h-7 flex items-center justify-center ">
                                        <!-- icon by feathericons.com -->
                                        <svg aria-hidden="true" data-reactid="281" fill="none" height="24" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                            <polyline points="18 15 12 9 6 15">
                                            </polyline>
                                        </svg>
                                    </div>
                                </header>
                                <div>
                                    <div class="pl-8 pr-8 pb-5">
                                        <ul class="pl-4">
                                            <li class="pb-2">
                                                consectetur adipiscing elit
                                            </li>
                                            <li class="pb-2">
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                            </li>
                                            <li class="pb-2">
                                                Viverra orci sagittis eu volutpat odio facilisis mauris
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                  </div>
              </div>
            </main>
          </div>
        </div>
        <script src="js/component.js"></script>
      </body>
</html>
