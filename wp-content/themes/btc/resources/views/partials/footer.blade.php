<footer class="content-info bg-quicksilver-900 text-quicksilver-50 py-24 px-12">
    <div class="mx-auto grid grid-cols-1 grid-rows-3 gap-2 m-12 md:grid-cols-3 md:grid-rows-1 md:max-w-6xl">
        <div class="text-center sm:text-left">
            <h2 class="text-lg text-quicksilver-200">Navigation</h2>
            <nav class="nav-footer">
                @if (has_nav_menu('footer_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
                @endif
            </nav>
        </div>
        <div class="text-center sm:text-left mt-12 sm:mt-0">
            <h2 class="text-lg text-quicksilver-200">Contact Us</h2>
            <p><strong>Builders Trust Capital</strong> <br />
                121 Johnson Road Suite 1,<br />
                Turnersville, NJ 08012<br />
                856-422-3232</p>
            <p class="space-x-4">
                <a href="https://www.facebook.com/AshmorePartners/"
                    class="text-quicksilver-50 hover:text-goldRush-200 no-underline">
                    <?php
                    $fb = get_svg('svg.facebook-f', 'w-6 h-6 inline');
                    echo $fb;
                    ?>
                </a>
                <a href="https://www.instagram.com/ashmorepartners/"
                    class="text-quicksilver-50 hover:text-goldRush-200 no-underline">
                    <?php
                    $ig = get_svg('svg.instagram', 'w-6 h-6 inline');
                    echo $ig;
                    ?>
                </a>
                <a href="https://www.linkedin.com/company/ashmore-partners/"
                    class="text-quicksilver-50 hover:text-goldRush-200 no-underline">
                    <?php
                    $linkedin = get_svg('svg.linkedin-in', 'w-6 h-6 inline');
                    echo $linkedin;
                    ?>
                </a>
            </p>
        </div>
        <div class="mt-12 sm:mt-0">
            <h2 class="text-lg text-quicksilver-200">All rights reserved Builders Trust Capital 2021.</h2>
            <p><small>*Disclaimer: Builders Trust Capital currently provides funding in these states: Pennsylvania, New
                    Jersey and Delaware. All rates and fees advertised are subject to change and are dependent on a
                    review
                    of a borrower’s financial status and project parameters.</small></p>
        </div>
    </div>
</footer>
