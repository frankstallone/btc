<article @php(post_class())>
        <header>
            <h1 class="entry-title mb-0 md:-mx-32">
                {!! $title !!}
            </h1>

            <figure class="post-thumbnail mt-4 mb-0 sm:-mx-12 md:-mx-32">
                {{-- Lazy-loading attributes should be skipped for thumbnails since they are immediately
                in the viewport. --}}
                @hasfield('before_photo')
                <div class="cocoen">
                    <img src="@field('before_photo', 'url')" alt="Before photograph" />
                    <img src="@field('after_photo', 'url')" alt="After photograph" />
                </div>
                @endfield
            </figure><!-- .post-thumbnail -->

            @include('partials/entry-meta')
        </header>

        <div class="entry-content">
            @php(the_content())
            </div>

            <footer>
                {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
            </footer>
        </article>
