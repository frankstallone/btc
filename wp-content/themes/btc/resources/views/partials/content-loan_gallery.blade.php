<article @php(post_class($class='grid-item' ))>
        <header>
            <a href="@permalink" class="block aspect-w-3 aspect-h-1 md:aspect-h-2">
                @php(the_post_thumbnail('post-thumbnail', ['loading' => false, 'class' => 'my-0 object-cover']))
                </a>

                <h2 class="entry-title px-6 mt-6">
                    <a href="{{ get_permalink() }}" class="no-underline hover:underline">
                        {!! $title !!}
                    </a>
                </h2>
                {{-- <div class="px-6">
                    @include('partials/entry-meta')
                </div> --}}
            </header>

            <div class="entry-summary px-6">
                @php(the_excerpt())
                </div>
            </article>
