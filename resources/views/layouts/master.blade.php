<!DOCTYPE html>
<html lang="en">

<!-- Head -->
@include('inc.head')
<!--
  HOW TO USE:
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">

        <!-- Sidebar -->
        @include('inc.sidebar')

        <div class="main">
            <!-- Header -->
            @include('inc.header')

            <main class="content">
                <!-- Content -->
                @yield('content')
            </main>

            <!-- Footer -->
            @include('inc.footer')
        </div>
        
    </div>

    <!-- Scripts -->
    @include('inc.scripts')
</body>

</html>
