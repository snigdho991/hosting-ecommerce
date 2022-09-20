<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body class="app sidebar-mini rtl">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <main class="app-content" id="app">
        @yield('content')
    </main>    
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    @stack('scripts')
    <script>
        $(document).ready(function(){
            
            $(".account_type").change(function(){
                var selectedValue = $(this).children("option:selected").val();
                if(selectedValue == "Admin"){
                    $("#themeId").hide();
                    $("#phoneId").hide();
                    $("#addressId").hide();
                    $("#stateId").hide();
                    $("#cityId").hide();
                    $("#zipcodeId").hide();
                    $("#countryId").hide();
                    $("#more_infoId").hide();

                } else if(selectedValue == "Super Admin"){
                    $("#themeId").hide();
                    $("#phoneId").hide();
                    $("#addressId").hide();
                    $("#stateId").hide();
                    $("#cityId").hide();
                    $("#zipcodeId").hide();
                    $("#countryId").hide();
                    $("#more_infoId").hide();
                } else if(selectedValue == "Author"){
                    $("#themeId").hide();
                    $("#phoneId").hide();
                    $("#addressId").hide();
                    $("#stateId").hide();
                    $("#cityId").hide();
                    $("#zipcodeId").hide();
                    $("#countryId").hide();
                    $("#more_infoId").hide();
                } else {
                    $("#themeId").show();
                    $("#phoneId").show();
                    $("#addressId").show();
                    $("#stateId").show();
                    $("#cityId").show();
                    $("#zipcodeId").show();
                    $("#countryId").show();
                    $("#more_infoId").show();
                }
            });
        });
        
        $(document).ready(function(){
            $("#themeAdminId").hide();
            $("#phoneAdminId").hide();
            $("#addressAdminId").hide();
            $("#stateAdminId").hide();
            $("#cityAdminId").hide();
            $("#zipcodeAdminId").hide();
            $("#countryAdminId").hide();
            $("#more_infoAdminId").hide();
            
            $(".account_type_admin").change(function(){
                var selectedValue = $(this).children("option:selected").val();
                if(selectedValue == "Admin"){
                    $("#themeAdminId").hide();
                    $("#phoneAdminId").hide();
                    $("#addressAdminId").hide();
                    $("#stateAdminId").hide();
                    $("#cityAdminId").hide();
                    $("#zipcodeAdminId").hide();
                    $("#countryAdminId").hide();
                    $("#more_infoAdminId").hide();

                } else if(selectedValue == "Super Admin"){
                    $("#themeAdminId").hide();
                    $("#phoneAdminId").hide();
                    $("#addressAdminId").hide();
                    $("#stateAdminId").hide();
                    $("#cityAdminId").hide();
                    $("#zipcodeAdminId").hide();
                    $("#countryAdminId").hide();
                    $("#more_infoAdminId").hide();
                } else if(selectedValue == "Author"){
                    $("#themeAdminId").hide();
                    $("#phoneAdminId").hide();
                    $("#addressAdminId").hide();
                    $("#stateAdminId").hide();
                    $("#cityAdminId").hide();
                    $("#zipcodeAdminId").hide();
                    $("#countryAdminId").hide();
                    $("#more_infoAdminId").hide();
                } else {
                    $("#themeAdminId").show();
                    $("#phoneAdminId").show();
                    $("#addressAdminId").show();
                    $("#stateAdminId").show();
                    $("#cityAdminId").show();
                    $("#zipcodeAdminId").show();
                    $("#countryAdminId").show();
                    $("#more_infoAdminId").show();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
</body>

</html>