<footer class="content-info bg-quicksilver-50 py-4">
    <div class="sm:w-full sm:max-w-6xl sm:mx-auto px-4 flex justify-between items-center">
        <nav class="nav-footer">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            @endif
        </nav>
        <p><small>All rights reserved Builders Trust Capital 2021.</small></p>
    </div>
</footer>
