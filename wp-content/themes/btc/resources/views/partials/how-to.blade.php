<?php $circle1 = get_svg('svg.circle-1', 'w-8 fill-current text-goldRush-100'); ?>
<?php $circle2 = get_svg('svg.circle-2', 'w-8 fill-current text-goldRush-100'); ?>
<?php $circle3 = get_svg('svg.circle-3', 'w-8 fill-current text-goldRush-100'); ?>
<?php $circle4 = get_svg('svg.circle-4', 'w-8 fill-current text-goldRush-100'); ?>
<?php $circle5 = get_svg('svg.circle-5', 'w-8 fill-current text-goldRush-100'); ?>
<?php $btcMark = get_svg(
'svg.btc-mark-one-path',
'hidden md:block mark absolute text-quicksilver-600 z-0 transform-gpu origin-center
opacity-30 md:h-screen md:-translate-x-1/2',
); ?>
<div
    class="bg-gradient-to-bl from-quicksilver-600 to-quicksilver-700 text-quicksilver-100 py-24 px-4 min-h-80 flex flex-col justify-center relative overflow-hidden">
    <?php echo $btcMark; ?>
    <div class="flex flex-col justify-center lg:max-w-7xl mx-auto w-full z-10">
        <div>
            <h2 class="mt-0 text-3xl text-goldRush-50">How to Finance Your Real Estate Investment</h2>
            <p class="text-2xl md:max-w-2xl">
                Our process is simple! We handle the entire process of the loan. Loans are granted in <em>as little as
                    21
                    days</em>.
            </p>
        </div>
        <div class="mx-auto mt-6 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
            <div
                class="bg-alpenglow-900 bg-opacity-20 p-8 mt-8 rounded-lg xl:p-0 xl:bg-none xl:bg-opacity-0 xl:mt-6 relative">
                <div
                    class="text-bigWaves-50 rounded-xl px-3 py-3 bg-alpenglow-900 bg-opacity-40 inline-block absolute -top-7 transform-gpu translate-x-1/2 right-1/2 shadow-xl xl:static xl:translate-x-0 xl:shadow-none">
                    <?php echo $circle1; ?>
                </div>
                <h3 class="text-2xl text-goldRush-50 my-2">Get Started</h3>
                <p class="text-lg">
                    <a href="/application" class="text-quicksilver-100 hover:text-quicksilver-50">Fill in the form</a>
                    or
                    call us at
                    856-422-3232 so we can
                    contact you and begin working on your loan. We're local and happy to meet with
                    you to learn your funding needs.
                </p>
            </div>

            <div
                class="bg-alpenglow-900 bg-opacity-20 p-8 mt-8 rounded-lg xl:p-0 xl:bg-none xl:bg-opacity-0 xl:mt-6 relative">
                <div
                    class="text-bigWaves-50 rounded-xl px-3 py-3 bg-alpenglow-900 bg-opacity-40 inline-block absolute -top-7 transform-gpu translate-x-1/2 right-1/2 shadow-xl xl:static xl:translate-x-0 xl:shadow-none">
                    <?php echo $circle2; ?>
                </div>
                <h3 class="text-2xl text-goldRush-50 my-2">Pre-qualify</h3>
                <p class="text-lg">Complete your application and provide supporting documentation.</p>
            </div>

            <div
                class="bg-alpenglow-900 bg-opacity-20 p-8 mt-8 rounded-lg xl:p-0 xl:bg-none xl:bg-opacity-0 xl:mt-6 relative">
                <div
                    class="text-bigWaves-50 rounded-xl px-3 py-3 bg-alpenglow-900 bg-opacity-40 inline-block absolute -top-7 transform-gpu translate-x-1/2 right-1/2 shadow-xl xl:static xl:translate-x-0 xl:shadow-none">
                    <?php echo $circle3; ?>
                </div>
                <h3 class="text-2xl text-goldRush-50 my-2">Proof of Funds</h3>
                <p class="text-lg">Increase your buying power with a proof of funds (PDF) letter.</p>
            </div>
            <div
                class="bg-alpenglow-900 bg-opacity-20 p-8 mt-8 rounded-lg xl:p-0 xl:bg-none xl:bg-opacity-0 xl:mt-6 relative">
                <div
                    class="text-bigWaves-50 rounded-xl px-3 py-3 bg-alpenglow-900 bg-opacity-40 inline-block absolute -top-7 transform-gpu translate-x-1/2 right-1/2 shadow-xl xl:static xl:translate-x-0 xl:shadow-none">
                    <?php echo $circle4; ?>
                </div>
                <h3 class="text-2xl text-goldRush-50 my-2">Loan Processing</h3>
                <p class="text-lg">
                    Your appraisal and title work are ordered. Your application documents are
                    reviewed.
                </p>
            </div>
            <div
                class="bg-alpenglow-900 bg-opacity-20 p-8 mt-8 rounded-lg xl:p-0 xl:bg-none xl:bg-opacity-0 xl:mt-6 relative">
                <div
                    class="text-bigWaves-50 rounded-xl px-3 py-3 bg-alpenglow-900 bg-opacity-40 inline-block absolute -top-7 transform-gpu translate-x-1/2 right-1/2 shadow-xl xl:static xl:translate-x-0 xl:shadow-none">
                    <?php echo $circle5; ?>
                </div>
                <h3 class="text-2xl text-goldRush-50 my-2">Get Funded Now</h3>
                <p class="text-lg">Submit project information for quick, in-house review.</p>
            </div>
        </div>
    </div>
</div>
