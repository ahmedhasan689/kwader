<!doctype html>
<html lang="en">

    <x-head />

<body>

    @guest
        <x-navbar />
    @endguest

    @auth
        <x-auth-nav />
    @endauth

    @yield('content')


    <x-footer-script />

</body>

</html>
