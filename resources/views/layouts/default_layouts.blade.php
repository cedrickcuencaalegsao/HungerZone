<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.header')
    @include('css.Platform-css')
</head>

<body>
    <div class="navigation-bar">
        @include('includes.navbar')
        <div class="side-bar">
            @include('includes.sidebarprofile')
            @yield('sidebar')
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>
