@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-full bg-white text-zinc-900 antialiased dark:bg-zinc-950 dark:text-zinc-100">
        <header class="border-b border-zinc-200 dark:border-zinc-800">
            <div class="mx-auto flex max-w-3xl items-center justify-between px-6 py-5">
                <a href="{{ route('tenant.blog.index') }}" class="text-lg font-semibold tracking-tight">
                    {{ tenant('id') }}
                </a>
                <nav class="text-sm text-zinc-500 dark:text-zinc-400">
                    <a href="{{ route('tenant.blog.index') }}" class="hover:text-zinc-900 dark:hover:text-white">Blog</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-3xl px-6 py-12">
            {{ $slot }}
        </main>

        <footer class="mt-16 border-t border-zinc-200 py-8 text-center text-sm text-zinc-400 dark:border-zinc-800">
            Powered by {{ config('app.name') }}
        </footer>
    </body>
</html>
