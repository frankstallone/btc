<?php $clock = get_svg('svg.clock', 'fill-current w-4 inline'); ?>
<?php $pen = get_svg('svg.pen-fancy', 'fill-current ml-4 h-4 w-4 inline'); ?>
<div class="flex flex-nowrap justify-end items-center text-emeraldCity-300 text-sm space-x-2">
    <?php echo $clock; ?>
    <time class="updated italic" datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date() }}
    </time>

    <p
        class="byline author vcard h-auto flex flex-nowrap flex-row items-center my-0 text-emeraldCity-300 italic text-sm space-x-2">
        <?php echo $pen; ?>
        <span>
            <span>{{ __('By', 'sage') }}</span>
            <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author"
                class="fn no-underline text-emeraldCity-300 hover:text-emeraldCity-500 focus:text-emeraldCity-500 capitalize">
                {{ get_the_author() }}
            </a>
        </span>
    </p>
</div>
