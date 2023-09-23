<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Emo Touch Group">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{!! asset('img/icons/icon-48x48.png') !!}">

    {{-- <link rel="canonical" href="index.htm"> --}}

    <!-- Pour Datatable -->
    <link rel="canonical" href="{!! asset('tables-datatables-buttons.html') !!}">

    <title>Panaco App - Admin</title>

    <link href="{!! asset('css2.css?family=Inter:wght@300;400;600&display=swap') !!}" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="{{ asset('css/light.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/dark.css') }}" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{!! asset('css/light.css') !!}" rel="stylesheet">
    {{-- <script src="{!! asset('js/settings.js') !!}"></script> --}}
    <style>
        body {
            opacity: 100;
        }
    </style>
    <!-- END SETTINGS -->
    <script async="" src="{!! asset('gtag/js.js?id=UA-120946860-10') !!}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-120946860-10', {
            'anonymize_ip': true
        });
    </script>

    <!-- My custum style pour disponibilité des produits -->
    <style>
        .availability-line {
            height: 5px;
        }

        .bg-success {
            background-color: green;
        }

        .bg-secondary {
            background-color: gray;
        }
    </style>
    <!--  -->
</head>
