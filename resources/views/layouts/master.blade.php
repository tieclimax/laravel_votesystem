<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>




    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">



        <!-- Topbar -->
        @include('layouts.header')
        <!-- End of Topbar -->
        <div class="container mt-5">
            <!-- Begin Page Content -->
            @yield('main-content')
            <!-- /.container-fluid -->
        </div>



        <!-- End of Main Content -->
        {{-- @include('layouts.footer') --}}

</body>

</html>
