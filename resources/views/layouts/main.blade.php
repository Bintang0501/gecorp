<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.css.style_css')
</head>

<body>
    <!-- Left Panel -->
    @include('layouts.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    @include('layouts.right_panel')
    <!-- /#right-panel -->

    @include('layouts.js.style_js')

    {{-- @include('components.animasi') --}}
    <!--Local Stuff-->
</body>
</html>
