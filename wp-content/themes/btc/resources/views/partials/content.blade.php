<article @php(post_class($class='my-0 rounded-sm shadow-lg bg-white' ))>
        <header>
            @php(the_post_thumbnail('post-thumbnail', ['loading' => false, 'class' => 'my-0']))

                <h2 class="entry-title px-6">
                    <a href="{{ get_permalink() }}" class="no-underline hover:underline">
                        {!! $title !!}
                    </a>
                </h2>
                <div class="px-6">
                    @include('partials/entry-meta')
                </div>
            </header>

            <div class="entry-summary px-6">
                @php(the_excerpt())
                </div>
            </article>
