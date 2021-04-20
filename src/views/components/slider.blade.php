{{--
-- This template is based on Keen Slider
--
-- The root options are mobile first.
--
-- API: https://keen-slider.io/api/
--}}

@props([
    'slides' => 1, // Number of slides per view
    'loop' => 'true',
    'controls' => 'true', // Control slider with mouse or touch gestures
    'resetSlide' => 'false', // Reset to initial when the breakpoint changes
    'rtl' => 'false', // Set the direction in which the slides are positioned to right-to-left
    'vertical' => 'false', // Set the slider direction to vertical
    'spacing' => '0', // Spacing between slides in pixel
    'autoplay' => 'true',
    'interval' => '2000',
    'dots' => 'false',
    'nav' => 'true',

    'slidesSm'  => null,
    'slidesMd'  => null,
    'slidesLg'  => null,
    'slidesXl'  => null,
    'slidesXxl' => null,
])

@php
    $widths = [
        'sm' => 576,
        'md' => 768,
        'lg' => 992,
        'xl' => 1200,
        'xxl' => 1400,
    ];

    $breakpoints = [];

    $map = static function($col, $option, $value) use ($widths, &$breakpoints) {
        if (!isset($value)) {
            return;
        }

        $key = $widths[$col];
        $breakpoints[$key][$option] = $value;
    };

    $map('sm', 'slidesPerView', $slidesSm ?? null);
    $map('md', 'slidesPerView', $slidesMd ?? null);
    $map('lg', 'slidesPerView', $slidesLg ?? null);
    $map('xl', 'slidesPerView', $slidesXl ?? null);
    $map('xxl', 'slidesPerView', $slidesXxl ?? null);

    $data = collect($breakpoints)->map(fn($v, $k) => ["(min-width: {$k}px)" => $v])->collapse()->all();
    $breakpointsJson = json_encode($data, JSON_FORCE_OBJECT|JSON_THROW_ON_ERROR);
@endphp

<div x-data="{
        slider: null,
        player: null,
        autoplay: {{ $autoplay }},
        interval: {{ $interval }},
        pause() { clearInterval(this.player) },
        play() {
            if (this.autoplay) {
                this.pause()
                this.player = setInterval(() => this.slider.next(), this.interval)
            }
        }
     }"
     x-init="
        slider = new KeenSlider($el, {
            slidesPerView: {{ $slides }},
            loop: {{ $loop }},
            spacing: {{ $spacing }},
            vertical: {{ $vertical }},
            breakpoints: {{ $breakpointsJson }},

            dragStart: () => {
                pause()
            },
            dragEnd: () => {
                play()
            },
        })
        play()
     "
     x-on:mouseover="pause()"
     x-on:mouseout="play()"
        {{ $attributes->class('keen-slider row flex-nowrap overflow-hidden') }}
>
    {{ $slot }}
</div>
