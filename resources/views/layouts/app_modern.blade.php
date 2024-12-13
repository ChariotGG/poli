<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('components.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
        @include('components.header')
            <!--  Header End -->
            <div class="container-fluid">
                @if (session()->has('pesan'))
                    <div class="alert alert-info" role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif
                @include('flash::message')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/modern/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/modern/src/assets/js/sidebarmenu.js"></script>
    <script src="/modern/src/assets/js/app.min.js"></script>
    <script src="/modern/src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script>

        $(document).ready(function() {

            $('#collapsePasien').on('show.bs.collapse', function() {
                $('#chevron-icon-pasien').removeClass('ti-chevron-down').addClass('ti-chevron-up');
            });
            $('#collapsePasien').on('hide.bs.collapse', function() {
                $('#chevron-icon-pasien').removeClass('ti-chevron-up').addClass('ti-chevron-down');
            });

            $('#collapsePoliklinik').on('show.bs.collapse', function() {
                $('#chevron-icon-poliklinik').removeClass('ti-chevron-down').addClass('ti-chevron-up');
            });
            $('#collapsePoliklinik').on('hide.bs.collapse', function() {
                $('#chevron-icon-poliklinik').removeClass('ti-chevron-up').addClass('ti-chevron-down');
            });

            $('#collapsePendaftaran').on('show.bs.collapse', function() {
                $('#chevron-icon-pendaftaran').removeClass('ti-chevron-down').addClass('ti-chevron-up');
            });
            $('#collapsePendaftaran').on('hide.bs.collapse', function() {
                $('#chevron-icon-pendaftaran').removeClass('ti-chevron-up').addClass('ti-chevron-down');
            });

            $('#collapseLaporan').on('show.bs.collapse', function() {
                $('#chevron-icon-laporan').removeClass('ti-chevron-down').addClass('ti-chevron-up');
            });
            $('#collapseLaporan').on('hide.bs.collapse', function() {
                $('#chevron-icon-laporan').removeClass('ti-chevron-up').addClass('ti-chevron-down');
            });

            $('.js-example-basic-single').select2();
        });

    </script>

<script>
    $(document).ready(function() {
    $('#pasien-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url: '/laporan/pasien',
            data: formData,
            success: function(data) {
                $('#table-container').html(data.html);
            }
        });
        return false;
    });
});
</script>

</body>

</html>
