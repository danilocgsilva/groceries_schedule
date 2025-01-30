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
                        @include('layouts.link_header', [
                          "link_title" => "Got to schedule",
                          "route_alias" => "schedule"
                        ])
                        @include('layouts.link_header', [
                          "link_title" => "Create a grocery item",
                          "route_alias" => "grocery_items.create"
                        ])
                        @include('layouts.link_header', [
                          "link_title" => "Check Groceries",
                          "route_alias" => "grocery_items.index"
                        ])
                        @include('layouts.link_header', [
                          "link_title" => "Register a purchase",
                          "route_alias" => "purchase.create"
                        ])
                        @include('layouts.link_header', [
                          "link_title" => "List purchases",
                          "route_alias" => "purchase.index"
                        ])
                        @include('layouts.link_header', [
                          "link_title" => "Place list",
                          "route_alias" => "place.index"
                        ])
                        @include('layouts.link_header', [
                          "link_title" => "Create a place",
                          "route_alias" => "place.create"
                        ])
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