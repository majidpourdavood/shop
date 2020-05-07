@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{--{{ config('app.name') }}--}}
            کرکره مارکت – بزرگترین فروشگاه اینترنتی
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <div style="font-family: 'Tahoma'; font-size: 1.2rem;color: #000;">
                &copy; {{ convert(date('Y')) }}  کلیه حقوق  متعلق به کرکره مارکت می‌باشد .
            </div>
        @endcomponent
    @endslot
@endcomponent
