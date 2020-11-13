<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full font-sans antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1280">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>{{ \Laravel\Nova\Nova::name() }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .mce-notification-warning {
            display: none;
        }

        html.nova-dark-theme .text-white,
        html.nova-dark-theme .el-menu-item,
        html.nova-dark-theme .el-menu-item i,
        html.nova-dark-theme .el-submenu__title,
        html.nova-dark-theme .el-submenu__title i {
            color: #000 !important;
        }

        html.nova-dark-theme .btn-primary, html.nova-dark-theme .btn-default, html.nova-dark-theme .el-button {
            color: #000;
            background-color: #00a86b;
        }

        html.nova-dark-theme .btn-primary:not([disabled]):not(.btn-disabled):hover, html.nova-dark-theme .el-button:hover {
            color: #000;
            background-color: #00a86b;
            opacity: .75;
        }

        html.nova-dark-theme .btn-white {
            color: #000;
            background-color: red;
        }

        /*Hide nova resource labels*/
        /*.content div div div h1 {*/
        /*    display: none;*/
        /*}*/

        a, a:active, a:focus, a:hover {
            color: #2068a5;
            outline: 0;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .text-white a {
            color: inherit;
            text-decoration: inherit;
        }
        #custom-style .content {
            max-width: 100%;
        }
        .el-menu {
            width: 219px;
        }
        #custom-style .px-8 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        #custom-style .py-6 {
            padding-top: 1rem;
            padding-bottom: 0;
        }
        #custom-style .py-4 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        #custom-style .py-3 {
            padding-top: 0.4rem;
            padding-bottom: 0.4rem;
        }
        #custom-style .table td {
            padding-left: .45rem;
            padding-right: .45rem;
            height: 2.5rem;
        }
        #custom-style .table td img {
            height: 50px;
            width: inherit;
        }
        #custom-style .mb-3 {
            margin-bottom: .35rem;
        }
        #custom-style .text-2xl {
            font-size: 1.2rem;
        }
        #custom-style .btn-default {
            height: 2.1rem;
            padding-left: 1rem;
            padding-right: 1rem;
            line-height: 2rem;
            font-size: 0.9rem;
        }
        #custom-style .px-view {
            padding: 1rem;
        }

        #custom-style .p-3 {
            padding: .45rem;
            padding-bottom: 0;
        }

        /*multi select component*/
        #custom-style .multiselect__tags span {
            font-size: 16px;
            padding-left: 5px;
            padding-top: 1px;
        }
        #custom-style .table .whitespace-no-wrap {
            white-space: inherit;
        }
    </style>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">

    <!-- Tool Styles -->
    @foreach(\Laravel\Nova\Nova::availableStyles(request()) as $name => $path)
        <link rel="stylesheet" href="/nova-api/styles/{{ $name }}">
    @endforeach

    <!-- Custom Meta Data -->
    @include('nova::partials.meta')

    <!-- Theme Styles -->
    @foreach(Nova::themeStyles() as $publicPath)
        <link rel="stylesheet" href="{{ $publicPath }}">
    @endforeach
</head>
<body id="custom-style" class="min-w-site bg-40 text-black min-h-full">
    <div id="nova">
        <div v-cloak class="flex min-h-screen">
            <!-- Sidebar -->
            <div id="left-sidebar" class="min-h-screen flex-none min-h-screen bg-grad-sidebar" style="overflow: hidden;">
                <sidebar/>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="flex items-center relative shadow h-header bg-white z-20 px-6">
                    @if (count(\Laravel\Nova\Nova::globallySearchableResources(request())) > 0)
                        <global-search></global-search>
                    @endif

                    <div class="relative ml-6">
                        <admin-show-component prefix="header"/>
                    </div>

                    <dropdown class="ml-auto h-9 flex items-center dropdown-right">
                        @include('nova::partials.user')
                    </dropdown>
                </div>

                <div data-testid="content" class="px-view py-view mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>

        <admin-show-component prefix="footer"/>
    </div>

    <script>
        window.config = @json(\Laravel\Nova\Nova::jsonVariables(request()));
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/nova.js') }}"></script>

    <!-- Build Nova Instance -->
    <script>
        window.Nova = new CreateNova(config)
    </script>

    <!-- Tool Scripts -->
    @foreach (\Laravel\Nova\Nova::availableScripts(request()) as $name => $path)
        @if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://']))
            <script src="{!! $path !!}"></script>
        @else
            <script src="/nova-api/scripts/{{ $name }}"></script>
        @endif
    @endforeach

    <!-- Start Nova -->
    <script>
        Nova.liftOff()
    </script>
</body>
</html>
