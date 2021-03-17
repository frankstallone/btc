<?php $btcMark = get_svg(
'svg.btc-pattern-3',
'hidden lg:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 lg:h-screen lg:top-10 lg:-translate-x-1/2',
); ?>
@extends('layouts.app')

@section('content')
    <div
        class="flex bg-gradient-to-br from-bigWaves-700 to-bigWaves-900 min-h-screen py-24 px-4 relevant overflow-hidden text-quicksilver-25">
        <?php echo $btcMark; ?>
        <div class="flex flex-col justify-center max-w-7xl mx-auto w-full relative z-10">
            <div>
                <h1 class="text-5xl leading-tight sm:leading-snug sm:text-7xl font-extrabold text-goldRush-50">
                    Get capital funding, scale your real estate investment faster
                </h1>
            </div>
            <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12">
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-8">
                        <h2
                            class="text-3xl leading-snug sm:leading-tight sm:text-4xl font-extrabold text-bigWaves-50 mt-0 mb-8">
                            Do more deals
                        </h2>
                        <p class="text-xl sm:text-2xl my-0">As a real estate investor, access to reliable funding quickly
                            ensures you
                            won’t
                            miss out on an
                            opportunity. When you work with the pros at direct Builders Trust Capital, your real estate
                            investing can grow into a scalable profitable business. You have the leverage to reach your
                            business
                            dreams on your timetable.</p>
                    </div>
                </div>
                <div class="quick-contact mx-12">
                    <?php gravity_form(1, false, false, false, '', true, 12); ?>
                </div>
            </div>
        </div>
    </div>
@endsection
