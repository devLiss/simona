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

    <body class="mx-auto bg-gray-900 min-h-screen">
        <div>
            <div id="sidemenu" class="bg-gray-800 shadow-lg text-white relative flex flex-col w-14 h-screen">
                <div class="block pt-1.5 pr-3.5 pb-1.5 pl-2.5 h-12 relative align-middle">
                    <img src="/image/fox-logo.png"/>
                </div>
                <div class="group sidemenu_item relative border-l-4 border-gray-800 hover:border-red-900">
                    <a class="sidemenu_link py-2 block relative text-center">
                        <span class="inline-block">
                            <div class="inline-block">
                                <object class="align-middle ">
                                    <img class="fill-current" width=60
                                        src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAACFlBMVEUAAABJSUlMUVdLUFpVVVVMU1pMUVlMUVhMUVlMUVlLUVhMUVlKUVlEVVVNUVlNUVhRUV5NUltMUVlMUVlKT1hLS1pMUVlLUVlNUFdLU1pLUVpMUllMUVlMUVlOU1lMUVpMUVlNU1lNTVlNTU1MUVpLUFpMUVlMUlhMUVlPT1hMT1lLUVpLUVdNUFdGRl1NUldMUVhMUVlMUVlMUVlMUVlOUVlHUlxNUVlMUVlLUVlAYGBNUVlMUllOTlkzZmZMUVlMUlhMUVlMUVlMUllMUVlVVVVNUVlJUltMUVlNUlhNUVlLT1hLUFlNVVVNTV1QUFhMUVlNUVlMUllNUVlMUFlLUllMUVlNUllNUFpLUVhMUVlMUlpMUVlMUVlLUVlJUFdNUlhLUVlNUllMUVpMUVlJSVtVVVVNUVtMUVlLUlhNUVlLUVpMUVlVVVVNUVlMUVlLUlpMUVoAAABKUlpMUVlMUFpMUVpNUllMUFhNUVlMUlhLUFlNUVhMUVlMUlhNUVlMUFpLUVlMUVlQUGBHVVVMUVhMUVlMUVlOU1hNUVlMUVpNUFlRUV1NUVhNUVpMUVlLUVpMUVlOTlhMUllMUVlMUFhMUVhLT1hMUVlMUVlMUVlMUllOTlxLUVlOTlxMUFlMUVlKUVdLUVlNUVhMUVlNUViAgIBOTmJMUVlMUVlMUVpLUlpMUFpMUVpMUVlMUVlNUFpMUVmKIDmUAAAAsXRSTlMABy8zBkqQx/n3xIpID6OtEzjj5DcR4qlJR4uJw/gu9cwoFArNZqRRmh1NUilGCzWz7PvGh0UZoP2mCNzFFwW/3puesusM+hzWmXs9XB4hIOjmr6p2cPJkYLCrgP7g3yNdmMiX8w4JTJ2ft1VyA0LRerkBH+qoW2p/PFfLcfzbwaKEYRASa8+9MbSUUBZuT++OjRqs2kPKOu3pdfQn1STO3SZfiMKFAg3Z9pFBbLbusWPSly6/AAAIcElEQVR42u3d93tTVRzA4QtRERduxQFpm7QVxYGCiIqKq2W0ooILF+6tuEddqLhw4N57z/sfOitPbgNJw8313Jz38yNJ23PO932AJjdJkkiSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmS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"/>
                                </div>
                                </object>
                            </div>
                        </span>
                    </a>
                    <!--<ul class="absolute top-full left-0 float-left text-left list-none ml-2 opacity-0 group-hover:opacity-100">
                        <li>Li-1</li>
                        <li>Li-2</li>
                        <li>Li-3</li>
                    </ul>-->
                </div>


                </div>
                <div class="p-4 sidebar_bottom">Avatar</div>
            </div>
            <!--<div class=" absolute w-full h-screen overflow-auto flex flex-col">
                ghjklgjhl
            </div> -->
        </div>

    </body>
</html>
