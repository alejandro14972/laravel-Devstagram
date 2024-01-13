<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}"> {{-- pasar multiples valores --}}
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->imagen }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links('pagination::simple-tailwind') }} {{-- paginación de la página. mirar archivo tailwind.config.js --}}
        </div>
    @else
        <p>no hay</p>
    @endif
</div>
