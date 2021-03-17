<?php $btcQuick = get_svg(
'svg.btc-mark-one-path',
'hidden md:block mark absolute text-quicksilver-800 z-0 transform-gpu origin-center
opacity-50 md:h-screen md:-translate-x-1/2',
); ?>
<div
    class="flex quick-contact bg-gradient-to-bl from-quicksilver-800 to-quicksilver-900 py-24 px-4 min-h-80 relative overflow-hidden">
    <?php echo $btcQuick; ?>
    <div class="flex flex-col justify-center max-w-lg md:max-w-prose lg:max-w-7xl mx-auto w-full z-10">
        <div class="mx-auto lg:grid lg:grid-cols-2 lg:grid-rows-2 lg:gap-12">
            <div>
                <h2 class="mt-0 text-3xl text-quicksilver-100">Ready to discuss your funding needs? </h2>
                <div class="lg:p-8 lg:bg-quicksilver-900 lg:bg-opacity-80 rounded-lg">
                    <p class="text-2xl text-quicksilver-200 lg:my-0">Just contact us by phone <a
                            href="tel:+1-856-422-3232">856-422-3232</a>. If you
                        prefer, send us a message and we’ll contact you shortly. Let’s get started working together.
                    </p>
                </div>
            </div>
            <div class="lg:row-span-2">
                <?php gravity_form(1, false, false, false, '', true, 12); ?>
            </div>
        </div>
    </div>
</div>
