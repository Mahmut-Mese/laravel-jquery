<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
 
    <head >
        @include('partials.head')
        @yield('head_extra')
    </head>
    <body>

       <header>
        @include('partials.header')
        @yield('header_extra')
        </header>

        @yield('content')

        @include('partials.footer')
        @include('partials.javascripts')
        @yield('javascript_extra')
    </body>
</html>
