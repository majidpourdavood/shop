<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('site.layout.head')
<script src=" {{ asset('js/sweetalert.min.js') }}"></script>

<body>

@include('site.layout.header')
@include('sweet::alert')



<section class="section_content">
    @yield('content')
</section>

@include('site.layout.footer')
@include('site.layout.script')
@yield('script')

</body>

</html>


