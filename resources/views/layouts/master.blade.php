<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Groceries Schedule')</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div id="container">

        <div id="frame">

            <header>
                <h1 class="text-3xl font-bold">
                    @yield('my_h1', 'Groceries Schedule')
                </h1>

                <nav>
                    <ul class="flex p-4">
                        <li class="px-3">
                            <a href="{{ route('schedule') }}">
                                Got to schedule
                            </a>
                        </li>
                        <li class="px-3">
                            <a href="{{ route('grocery_items.create') }}">
                                Create a grocery item
                            </a>
                        </li>
                        <li class="px-3">
                            <a href="{{ route('grocery_items.index') }}">
                                Check Groceries
                            </a>
                        </li>
                        <li class="px-3">
                            <a href="{{ route('purchase.create') }}">
                                Register a purchase
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>

            <main>
                @yield('content')
            </main>

            <footer>

            </footer>

        </div>

    </div>

</body>

</html>