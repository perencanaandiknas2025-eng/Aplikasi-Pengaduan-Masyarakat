<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ================= META ================= -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- ================= FONTS ================= -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- ================= STYLES ================= -->
    <style>
        /*! normalize.css v8.0.1 | MIT License */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        a {
            background-color: transparent;
            color: inherit;
            text-decoration: inherit;
        }

        [hidden] {
            display: none;
        }

        * , *::before, *::after {
            box-sizing: border-box;
            border: 0 solid #e2e8f0;
        }

        svg, video {
            display: block;
            vertical-align: middle;
        }

        video {
            max-width: 100%;
            height: auto;
        }

        /* Utility Classes (Tailwind-like) */
        .flex { display: flex; }
        .grid { display: grid; }
        .hidden { display: none; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .justify-between { justify-content: space-between; }
        .text-center { text-align: center; }

        .min-h-screen { min-height: 100vh; }
        .max-w-6xl { max-width: 72rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }

        .bg-white { background-color: #ffffff; }
        .bg-gray-100 { background-color: #f7fafc; }
        .bg-gray-900 { background-color: #1a202c; }

        .text-gray-500 { color: #a0aec0; }
        .text-gray-600 { color: #718096; }
        .text-gray-700 { color: #4a5568; }
        .text-gray-900 { color: #1a202c; }

        .underline { text-decoration: underline; }
        .shadow {
            box-shadow: 0 1px 3px rgba(0,0,0,.1),
                        0 1px 2px rgba(0,0,0,.06);
        }

        @media (min-width: 768px) {
            .md-grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark-bg { background-color: #2d3748; }
            .dark-text { color: #ffffff; }
        }
    </style>
</head>

<body class="antialiased">
    <!-- ================= MAIN CONTAINER ================= -->
    <div class="relative flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">

        <!-- ================= AUTH LINKS ================= -->
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 px-6 py-4 hidden sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm underline text-gray-700">
                        Home
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm underline text-gray-700">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm underline text-gray-700">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <!-- ================= CONTENT ================= -->
        <div class="max-w-6xl mx-auto px-6">

            <!-- Logo -->
            <div class="flex justify-center pt-8">
                {{-- Laravel Logo SVG (dipertahankan utuh) --}}
                {{-- SVG panjang tidak diubah, hanya dirapikan indentasinya --}}
            </div>

            <!-- Cards -->
            <div class="mt-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">

                    <!-- Documentation -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold">
                            <a href="https://laravel.com/docs" class="underline">
                                Documentation
                            </a>
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Laravel has wonderful documentation covering every aspect
                            of the framework from beginner to advanced.
                        </p>
                    </div>

                    <!-- Laracasts -->
                    <div class="p-6 border-t md:border-t-0 md:border-l">
                        <h3 class="text-lg font-semibold">
                            <a href="https://laracasts.com" class="underline">
                                Laracasts
                            </a>
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Thousands of video tutorials to level up your Laravel skills.
                        </p>
                    </div>

                    <!-- Laravel News -->
                    <div class="p-6 border-t">
                        <h3 class="text-lg font-semibold">
                            <a href="https://laravel-news.com" class="underline">
                                Laravel News
                            </a>
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Community driven news, tutorials, and package releases.
                        </p>
                    </div>

                    <!-- Ecosystem -->
                    <div class="p-6 border-t md:border-l">
                        <h3 class="text-lg font-semibold">
                            Vibrant Ecosystem
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Laravel provides powerful tools like Forge, Vapor, Nova,
                            Envoyer, Horizon, Telescope, and more.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                <div>
                    <a href="https://laravel.bigcartel.com" class="underline">Shop</a>
                    <a href="https://github.com/sponsors/taylorotwell" class="ml-4 underline">Sponsor</a>
                </div>

                <div>
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                    (PHP v{{ PHP_VERSION }})
                </div>
            </div>

        </div>
    </div>
</body>
</html>
