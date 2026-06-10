<x-tenant.layout :title="__('Blog')">
    <div class="space-y-2">
        <h1 class="text-3xl font-bold tracking-tight">Latest posts</h1>
        <p class="text-zinc-500 dark:text-zinc-400">News and updates from {{ tenant('id') }}.</p>
    </div>

    <div class="mt-10 space-y-10">
        @forelse ($posts as $post)
            <article>
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('tenant.blog.show', $post) }}" class="hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="mt-1 text-sm text-zinc-400">{{ $post->published_at->format('M j, Y') }}</p>

                @if ($post->excerpt)
                    <p class="mt-3 text-zinc-600 dark:text-zinc-300">{{ $post->excerpt }}</p>
                @endif

                <a href="{{ route('tenant.blog.show', $post) }}" class="mt-3 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                    Read more &rarr;
                </a>
            </article>
        @empty
            <p class="text-zinc-500 dark:text-zinc-400">No posts published yet.</p>
        @endforelse
    </div>

    @if ($posts->hasPages())
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    @endif
</x-tenant.layout>
