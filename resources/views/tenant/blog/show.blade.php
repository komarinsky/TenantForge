<x-tenant.layout :title="$post->title">
    <a href="{{ route('tenant.blog.index') }}" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
        &larr; All posts
    </a>

    <article class="mt-6">
        <h1 class="text-3xl font-bold tracking-tight">{{ $post->title }}</h1>
        <p class="mt-2 text-sm text-zinc-400">{{ $post->published_at->format('M j, Y') }}</p>

        <div class="mt-8 space-y-4 leading-relaxed text-zinc-700 dark:text-zinc-300 [&_a]:text-indigo-600 [&_a]:underline [&_blockquote]:border-l-4 [&_blockquote]:border-zinc-300 [&_blockquote]:pl-4 [&_blockquote]:italic [&_h2]:mt-8 [&_h2]:text-2xl [&_h2]:font-semibold [&_h3]:mt-6 [&_h3]:text-xl [&_h3]:font-semibold [&_ol]:list-decimal [&_ol]:pl-6 [&_ul]:list-disc [&_ul]:pl-6">
            {!! $post->body !!}
        </div>
    </article>
</x-tenant.layout>
