<article @php(post_class())>
  <header>
    <h1 class="entry-title">
      {!! $title !!}
    </h1>

    <figure class="post-thumbnail">
      <?php
      // Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
      the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
      ?>
      <?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
        <figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
      <?php endif; ?>
    </figure><!-- .post-thumbnail -->

    @include('partials/entry-meta')
  </header>

  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php(comments_template())
</article>
