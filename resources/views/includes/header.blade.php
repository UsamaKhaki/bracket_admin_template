<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vendor CSS --}}
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    @if(!isset($auth))
        <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    @endif

     {{--Plugin CSS--}}
    @stack('plugin-css')
    {{-- Custom Style File --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body @if(isset($sidebar)) && $sidebar = 'collapse') class="collapsed-menu with-subleft" @endif>
{{-- Custom Page Loader --}}
<div class="page-loader">
    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
@if(!isset($auth))
    @include('includes.sidebar')
    @include('includes.navbar')
{{--    @include('includes.right-sidebar')--}}
@endif

