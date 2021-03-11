<div class="flex flex-nowrap border border-quicksilver-50 rounded rounded-full justify-end">
    <time class="updated italic text-quicksilver-400 px-4 py-2 border-r border-quicksilver-50 text-sm"
        datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date() }}
    </time>

    <p class="byline author vcard my-0 px-4 py-2 text-quicksilver-400 italic text-sm">
        <span>{{ __('By', 'sage') }}</span>
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author"
            class="fn no-underline text-quicksilver-400 hover:text-quicksilver-500 focus:text-quicksilver-500 capitalize">
            {{ get_the_author() }}
        </a>
    </p>
</div>
