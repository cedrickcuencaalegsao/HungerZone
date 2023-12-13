<!DOCTYPE html>
<html lang="en">

<head>
    @include('AdminPage.adminincludes.adminheader')
</head>
@include('AdminPage.css.admindesign')

<body>
    <div class="navigation-bar">
        @include('AdminPage.adminincludes.adminnav')
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
