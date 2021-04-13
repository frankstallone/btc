<article @php(post_class($class='grid-item' ))>
        <header class="overflow-hidden">
            <a href="@permalink">
                @php(the_post_thumbnail('post-thumbnail', ['loading' => false, 'class' => 'my-0 object-cover']))
                    {{-- @if (!has_post_thumbnail())
                        <img src="http://placekitten.com/400/500" alt="" class="my-0 object-cover">
                    @endif --}}
                </a>

                <h2 class="entry-title px-6 mt-6 mb-0">
                    <a href="{{ get_permalink() }}"
                        class="text-emeraldCity-800 hover:text-emeraldCity-900 no-underline hover:underline">
                        {!! $title !!}
                    </a>
                </h2>
                <div class="px-6">
                    @include('partials/card-meta')
                </div>
            </header>

            <div class="entry-summary px-6">
                @php(the_excerpt())
                </div>
            </article>
