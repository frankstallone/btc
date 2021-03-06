<article @php(post_class())>
        <header>
            <h1 class="entry-title mb-0 md:-mx-32">
                {!! $title !!}
            </h1>

            <figure class="post-thumbnail mt-4 mb-4 sm:-mx-12 md:mb-8 md:-mx-32">
                {{-- Lazy-loading attributes should be skipped for thumbnails since they are immediately
                in the viewport. --}}
                <?php the_post_thumbnail('post-thumbnail', ['loading' => false]); ?>
                <?php if (wp_get_attachment_caption(get_post_thumbnail_id())): ?>
                <figcaption class="wp-caption-text mx-4 md:mx-0 sr-only"><?php echo
                    wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?></figcaption>
                <?php endif; ?>
            </figure><!-- .post-thumbnail -->

            @include('partials/card-meta')
        </header>

        <div class="entry-content">
            @php(the_content())
            </div>

            <footer>
                {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
            </footer>
        </article>
