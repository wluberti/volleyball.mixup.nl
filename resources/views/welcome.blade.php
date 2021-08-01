<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body class="font-sans">
        <div id="app">
            <div class="container mx-auto">
                <header class="py-6 mb-8">
                    <h1>Volleyball mixup</h1>
                </header>

                <main class="flex">
                    <aside class="w-1/5">
                        <section class="mb-8">
                            <h5 class="uppercase font-bold mb-3 text-base">Games</h5>
                            <ul>
                                <li class="text-sm"><router-link class="text-black" to="/" exact>Dashboard</router-link></li>
                                <li class="text-sm"><router-link class="text-black" to="/about">About</router-link></li>
                            </ul>
                        </section>
                        <section>
                            <h5 class="uppercase font-bold mb-3 text-base">My Settings</h5>
                            <ul>
                                <li class="text-sm"><router-link class="text-black" to="/notifications">Notifications</router-link></li>
                                <li class="text-sm"><router-link class="text-black" to="/profile">Profile</router-link></li>
                            </ul>
                        </section>
                    </aside>
                    <div class="primary flex-1">
                        <router-view></router-view>
                    </div>
                </main>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
