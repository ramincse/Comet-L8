<!DOCTYPE html>
<html lang="en">

<head>
    @include('comet.layouts.head')
</head>

<body>
    <!-- Preloader-->
    <!-- @include('comet.layouts.partials.preloader') -->
    <!-- End Preloader-->


    <!-- Navigation Bar-->
    @include('comet.layouts.header')
    <!-- End Navigation Bar-->

    @include('comet.layouts.page-header')

    @section('main-content')
    @show

    <!-- Footer-->
    @include('comet.layouts.footer')
</body>

</html>